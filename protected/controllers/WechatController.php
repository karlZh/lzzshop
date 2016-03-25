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
                if($data->nickname&&$data->sex&&$data->language&&$data->headimgurl){
                    $_SESSION['member'] = $data->attributes;
                    $_SESSION['member']['islogin'] = 1;
                }else{
                    $data->attributes = $userinfo;
                    $data->save(false);
                    $_SESSION['member'] = $userinfo;
                    $_SESSION['member']['id'] = $data->getPrimaryKey();
                    $_SESSION['member']['islogin'] = 1;
                }
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

        $weixin = new Weixin($_GET);
        $weixin -> token = self::TOKEN;
        $weixin ->debug = false;
        $echostr = Yii::app()->request->getParam('echostr');
        if(isset($echostr)){
            $weixin -> valid();
        }
        $weixin -> init();
            if (!empty($weixin->msg)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                $fromUsername = $weixin->msg->FromUserName;
                $toUsername = $weixin->msg->ToUserName;
                $fMsgType = empty($weixin->msg->MsgType) ? '': strtolower($weixin->msg->MsgType);
                $event = strtolower($weixin->msg->Event);
                switch($fMsgType){
                    case 'event':
                        switch($event){
                            case "subscribe":
                                $contentStr = "欢迎关注绿蜘蛛！";
                                if(isset($weixin->msg->EventKey)){
                                    $sceneid = intval(str_replace("qrscene_","",$weixin->msg->EventKey));
                                    $this->_bangdingInviCode($fromUsername,$sceneid);
                                }
                                echo $weixin -> makeText($contentStr);
                                break;
                            case "scan":
                                $contentStr = "欢迎回来！";
                                if(isset($weixin->msg->EventKey)){
                                    $sceneid = intval($weixin->msg->EventKey);
                                    $this->_bangdingInviCode($fromUsername,$sceneid);
                                }
                                echo $weixin -> makeText($contentStr);
                                break;
                            default:
                                break;
                        }
                        break;
                }

            }else {
                echo "";
                exit;
            }
    }

    /**
     * 用户微信绑定邀请码
     * @param string $openid
     * @param string $sceneid
     */
    private function _bangDingInviCode($openid,$sceneid)
    {
        $saleman = Saleman::model()->findByPk($sceneid);
        $menberModel = new Member();
        $menber =$menberModel->find("openid=:openid",array(":openid"=>$openid));
        if(!empty($menber)){
            if(!$menber->invitation_code){
                $menber->invitation_code = $saleman->invitation_code;
                $menber->createtime = time();
                $menber->save(false);
            }
        }else{
            $menberModel->openid = $openid;
            $menberModel->invitation_code = $saleman->invitation_code;
            $menberModel->createtime = time();
            $menberModel->save(false);
        }

    }
}