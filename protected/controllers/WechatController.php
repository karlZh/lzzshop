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

        $echostr = Yii::app()->request->getParam('echostr');
        if(isset($echostr)){
            $signature = Yii::app()->request->getParam('signature');
            $timestamp = Yii::app()->request->getParam('timestamp');
            $nonce = Yii::app()->request->getParam('nonce');

            $arr = array($timestamp,$nonce,self::TOKEN);
            sort($arr);
            if($signature == sha1(join($arr))){
                echo $echostr;
            }
        }else{
            //get post data, May be due to the different environments
            $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

            //extract post data
            if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
                $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
                $fMsgType = $postObj->MsgType;
                $event = strtolower($postObj->Event);
                if($fMsgType=='event'){
                    switch($event){
                        case "click":
                            $keyword = $postObj->EventKey;
                            break;
                        case "subscribe":
                            $msgType = "text";
                            $contentStr = "欢迎关注绿蜘蛛！";
                            if(isset($postObj->EventKey)){
                                $sceneid = str_replace("qrscene_","",$postObj->EventKey);
                                $saleman = Saleman::model()->findByPk($sceneid);
                                $menberModel = new Member();
                                $menber =$menberModel->find("openid=:openid",array(":openid"=>$fromUsername));
                                if(!empty($menber)){
                                    if(!$menber->invitation_code){
                                        $menber->invitation_code = $saleman->invitation_code;
                                        $menber->createtime = time();
                                        $menber->save(false);
                                    }
                                }else{
                                    $menberModel->openid = $fromUsername;
                                    $menberModel->invitation_code = $saleman->invitation_code;
                                    $menberModel->createtime = time();
                                    $menberModel->save(false);
                                }
                            }
                            break;
                        case "scan":
                            $msgType = "text";
                            $contentStr = "欢迎回来！";
                            if(isset($postObj->EventKey)){
                                $saleman = Saleman::model()->findByPk($postObj->EventKey);
                                $menberModel = new Member();
                                $menber =$menberModel->find("openid=:openid",array(":openid"=>$fromUsername));
                                if(!empty($menber)){
                                    if(!$menber->invitation_code){
                                        $menber->invitation_code = $saleman->invitation_code;
                                        $menber->createtime = time();
                                        $menber->save(false);
                                    }
                                }else{
                                    $menberModel->openid = $fromUsername;
                                    $menberModel->invitation_code = $saleman->invitation_code;
                                    $menberModel->createtime = time();
                                    $menberModel->save(false);
                                }
                            }
                            break;
                        default:
                            break;
                    }

                }elseif($fMsgType=='text'){
                    $keyword = trim($postObj->Content);
                }

                $time = time();
                $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
                if(!empty( $keyword ))
                {
                    switch($keyword){
                        case 'denglu':
                            $msgType = "text";
                            $contentStr = "http://101.200.147.132/appserver/index.php/front/Weixinlogin/checkUser/openId/".$fromUsername;
                    }

                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                    echo $resultStr;
                }else{
                    echo "";
                }

            }else {
                echo "";
                exit;
            }

        }

    }

} 