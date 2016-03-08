<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:54
 */

class WechatController extends Controller{

    const TOKEN = "lvzhizhushop";

    /*
     * actionWeLogin
     * 微信登录操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionWeLogin(){
        $url = WeChat::OAUTH_URL
            ."?appid=".WeChat::APPID
            ."&redirect_uri=".urlencode("http://www.greenspider.cn".$this->createUrl('wechat/auth'))
            ."&response_type=code"
            ."&scope=snsapi_userinfo"
            ."&state="
            ."#wechat_redirect";
        $this->redirect($url);
    }

    public function actionAuth(){
        $code = Yii::app()->request->getParam('code');
        $state = Yii::app()->request->getParam('state');
        try {
            if (empty($code)) {
                throw new Exception('授权失败,code错误');
            }
            $json = WeChat::getAccessToken($code);
            $data = json_decode($json,true);
            if(!isset($data['access_token'])){
                throw new Exception('授权失败,access_token错误');
            }

            $openid = $data['openid'];
            if(empty($openid)){
                throw new Exception('授权失败,openid错误');
            }
            $json = WeChat::getUserInfo($data['access_token'],$openid);
            $userinfo = json_decode($json,true);

            if(isset($userinfo['errcode'])){
                throw new Exception('获取用户信息失败：'.$userinfo['errcode'].":".$userinfo['errmsg']);
            }

            $model = new Member();
            $data = $model->find('openid=:id',array(':id'=>$openid));

            if($data){
                $_SESSION['member'] = $data->attributes;
                $_SESSION['member']['islogin'] = 1;
            }else {
                $model->attributes = $userinfo;
                $model->createtime = time();
                $model->save(false);
                $_SESSION['member'] = $userinfo;
                $_SESSION['member']['id'] = $model->getPrimaryKey();
                $_SESSION['member']['islogin'] = 1;
            }

            $this->redirect($this->createUrl('receive/index'));

        }catch(Exception $e){
            $this->error('error_params',$e->getMessage(),false);
            echo "<script>";
            echo "alert('授权失败，请重新登录');";
            echo "window.location.href='".$this->createUrl('index/index')."'";
            echo "</script>";
            return ;
        }


    }

    public function actionInterface(){

        $signature = Yii::app()->request->getParam('signature');
        $timestamp = Yii::app()->request->getParam('timestamp');
        $nonce = Yii::app()->request->getParam('nonce');
        $echostr = Yii::app()->request->getParam('echostr');
        $arr = array($timestamp,$nonce,self::TOKEN);
        sort($arr);
        if($signature == sha1(join($arr))){
            echo $echostr;
        }

    }

} 