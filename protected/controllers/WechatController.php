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

        $weixin = Yii::app() -> weixin;
        $weixin -> init($_GET);
        $weixin -> token = self::TOKEN;
        $weixin ->debug = true;
        $echostr = Yii::app()->request->getParam('echostr');
        if(isset($echostr)){
            $weixin -> valid();
        }
        $weixin -> getMsg();

        if (!empty($weixin->msg)){
            $fromUsername = $weixin->msg->FromUserName;
            $fMsgType = empty($weixin->msg->MsgType) ? '': strtolower($weixin->msg->MsgType);
            $event = strtolower($weixin->msg->Event);
            switch($fMsgType){
                case 'event':
                    switch($event){
                        case "subscribe":
                            $contentStr = "欢迎关注绿蜘蛛！";
                            if(isset($weixin->msg->EventKey)){
                                $sceneid = intval(str_replace("qrscene_","",$weixin->msg->EventKey));
                                $this->_bangDingInviCode($fromUsername,$sceneid);
                            }
                            break;
                        case "scan":
                            $contentStr = "欢迎回来！";
                            if(isset($weixin->msg->EventKey)){
                                $sceneid = intval($weixin->msg->EventKey);
                                $this->_bangDingInviCode($fromUsername,$sceneid);
                            }
                            break;
                        case "click":
                            switch($weixin->msg->EventKey)
                            {
                                case 'changba':
//                                    $contentStr = "精彩下次见！";
                                    $contentStr['items'][] = array(
                                        'title' => '绿蜘蛛--面向全国诚招小伙伴,应聘须知',
                                        'description' => '有你有我也有她！有人的地方就有绿蜘蛛！',
                                        'picurl' => 'http://mmbiz.qpic.cn/mmbiz/SKWfrXaf1zfzCSfz4ibfXfuKvun4CYlu9pEf4ZIagOGDf2OicfGtztTtZXaV6vuLt5wUQDlVQeboToooSzQqPV9A/0?wx_fmt=jpeg',
                                        'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1MjAzNzMzOA==&mid=409304642&idx=1&sn=564ceccd87e64c6c62f701a4f685bd45#rd'
                                    );
                                    break;
                                case 'lzzwh':
                                    $contentStr['items'][] = array(
                                        'title' => '绿蜘蛛文化',
                                        'description' => '绿蜘蛛:有人的地方就有绿蜘蛛！',
                                        'picurl' => 'http://mmbiz.qpic.cn/mmbiz/SKWfrXaf1zfkiaBWkg673icuIxsu93ibrOe3B1GknHF52HLj2ic8uJP4iaPIuYHSG4vuz6yzNtw8MDiaHGDGntZEicQsg/0?wx_fmt=jpeg',
                                        'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1MjAzNzMzOA==&mid=407673751&idx=1&sn=76987b4b5e97e17315f512f42a7e9f0c#rd'
                                    );
                                    break;
                                case 'lzzzp':
                                    $contentStr['items'][] = array(
                                        'title' => '绿蜘蛛招聘',
                                        'description' => '绿蜘蛛:有人的地方就有绿蜘蛛！',
                                        'picurl' => 'http://mmbiz.qpic.cn/mmbiz/SKWfrXaf1zfkiaBWkg673icuIxsu93ibrOe3B1GknHF52HLj2ic8uJP4iaPIuYHSG4vuz6yzNtw8MDiaHGDGntZEicQsg/0?wx_fmt=jpeg',
                                        'url' => 'http://mp.weixin.qq.com/s?__biz=MzI1MjAzNzMzOA==&mid=407673777&idx=1&sn=eed63850ab10515b7bcb2d3c20c9cb9f#rd'
                                    );
                                    break;
                            }
                            break;
                        default:
                            break;
                    }
                    break;
            }

            if(is_array($contentStr)){
                if(isset($contentStr['items'])){
                    echo $weixin -> makeNews($contentStr);
                }
            }else{
                echo $weixin -> makeText($contentStr);
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

    /**
     * 创建菜单
     *
     * @access public
     */
    public function actionCreatemenu(){
        //三个一级菜单
        $menu = array();
        $menu['button'][0] = array(
            'name' => '蜘蛛商城',
            'type' => 'view',
            'url' => 'http://www.greenspider.cn/weshop'
        );
        $menu['button'][1] = array(
            'name' => '畅吧',
            'type' => 'click',
            'key' => 'changba'
        );
        $menu['button'][2] = array(
            'name' => '关于我们',
            'sub_button' => array(
                0 => array(
                    'name' => '绿蜘蛛文化',
                    'type' => 'click',
                    'key' => 'lzzwh'
                ),
                1 => array(
                    'name' => '绿蜘蛛招聘',
                    'type' => 'click',
                    'key' => 'lzzzp'
                ),
                2 => array(
                    'name' => '业务员登录',
                    'type' => 'view',
                    'url' => 'http://www.greenspider.cn/weshop/?r=saleman/login'
                ),
                3 => array(
                    'name' => '供货商登录',
                    'type' => 'view',
                    'url' => 'http://www.greenspider.cn/weshop/?r=supplier/index'
                )
            )
        );

        $jsonmenu = json_encode($menu,JSON_UNESCAPED_UNICODE);
        $acc_token = WeChat::getPlatformToken();
        $acc_token = json_decode($acc_token,true);
        $access_token = $acc_token['access_token'];
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;

        $output = Yii::app() -> curl -> post($url,$jsonmenu);
        var_dump($output);

    }

    /**
     * 自定义菜单查询
     *
     * @access public
     */
    public function actionGetMenu(){
        $acc_token = WeChat::getPlatformToken();
        $acc_token = json_decode($acc_token,true);
        $access_token = $acc_token['access_token'];
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$access_token;

        $output = Yii::app() -> curl -> get($url);
        echo $output;
    }

    /**
     * 获取素材总数
     *
     * @access public
     */
    public function actionMaterialcount(){
        $acc_token = WeChat::getPlatformToken();
        $acc_token = json_decode($acc_token,true);
        $access_token = $acc_token['access_token'];
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$access_token;

        $output = Yii::app() -> curl -> get($url);
        echo $output;
    }

    /**
     * 获取素材列表
     *
     * @access public
     */
    public function actionGetmaterial(){
        $acc_token = WeChat::getPlatformToken();
        $acc_token = json_decode($acc_token,true);
        $access_token = $acc_token['access_token'];
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$access_token;

        $data = array();
        $data['type'] = 'news';
        $data['offset'] = 0;
        $data['count'] = 10;

        $json = json_encode($data);
        $output = Yii::app() -> curl -> post($url,$json);
        $output = json_decode($output,true);
        var_dump($output);
    }
    public function actionTest(){
        $wexin = Yii::app()-> weixin;
        $wexin -> debug = true;
        $wexin -> reply(Yii::app()->basePath);
    }
}