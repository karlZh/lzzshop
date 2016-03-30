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
                                    $contentStr = "精彩下次见！";
                                    break;
                                case 'lzzwh':
                                    $contentStr['items'][] = array(
                                        'title' => '',
                                        'description' => '',
                                        'picurl' => '',
                                        'url' => ''
                                    );
                                    break;
                                case 'lzzzp':
                                    $contentStr['items'][] = array(
                                        'title' => '',
                                        'description' => '',
                                        'picurl' => '',
                                        'url' => ''
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
                    echo $weixin -> $this->makeNews($contentStr);
                }
            }else{
                echo $weixin -> $this->makeText($contentStr);
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
            'name' => '唱吧',
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
                    'name' => '代理商登录',
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
        $access_token = WeChat::getPlatformToken();
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$access_token;

//        $curl = new CURL;
//        $output = $curl ->vpost($url,$jsonmenu);
        $output = $this->post($url,$jsonmenu);
        var_dump($output);

    }

    /**
     * 获取素材列表
     *
     * @access public
     */
    public function actionGetmaterial(){
        $access_token = WeChat::getPlatformToken();
        $url = "https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=".$access_token;

        $data = array();
        $data['type'] = 'news';
        $data['offset'] = 0;
        $data['count'] = 10;

        $json = json_encode($data);
        echo $access_token;
//        $curl = new CURL;
//        $output = $curl -> vpost($url,$json);
        $output = $this->post($url,$json);
        echo "ok";
        var_dump($output);
    }
    public function post($url, $data) {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //声明使用POST方式来进行发送
        curl_setopt($ch, CURLOPT_POST, 1);

        //发送什么数据呢
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        //忽略证书
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $output = curl_exec($ch);

        curl_close($ch);

        return $output;
    }

}