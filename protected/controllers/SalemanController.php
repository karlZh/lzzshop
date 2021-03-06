<?php
/**
 * Created by PhpStorm.
 * User: CHAO
 * Date: 2016/3/8
 * Time: 21:28
 */
class SalemanController extends Controller{
    public $layout = "/layouts/saleman";
    const WECHAT_CODE_PATH = "./assets/uploads/wechat/";
    /**
     * 业务员登陆页面
     */
    public function actionLogin(){
        $model = Saleman::model();
        if(!empty($_POST['Saleman'])){
            $model->scenario = "salemanlogin";
            $model->attributes = $_POST['Saleman'];
            if($model->validate()){
                $this->redirect($this->createUrl('saleman/index'));
            }
        }
        $this->renderPartial('login',array('model'=>$model));
    }

    public function actionIndex(){
        $inv_code = $_SESSION['saleman']['invitation_code'];

        $criteria = new CDbCriteria;
        $criteria -> condition = 'invitation_code=:inv_code';
        $criteria -> params = array(':inv_code'=>$inv_code);
        $memberCount = Member::model()->count($criteria);

        $salemanInfo = Saleman::model()->findByPk($_SESSION['saleman']['id']);

        $this->render('salemanindex',array('memberCount'=>$memberCount,'salemanInfo'=>$salemanInfo));
    }

    public function actionCreateqrcode(){
        $salemanid = $_SESSION['saleman']['id'];
        $token = WeChat::getPlatformToken();
        $token = json_decode($token,true);
        $access_token = $token['access_token'];
        $qrcode = "{\"action_name\":\"QR_LIMIT_SCENE\",\"action_info\":{\"scene\":{\"scene_id\":".$salemanid."}}}";
        $result = WeChat::createTicket($access_token,$qrcode);
        $jsoninfo = json_decode($result,true);
        $ticket = $jsoninfo['ticket'];

        $filepath = self::WECHAT_CODE_PATH.$salemanid;
        if(!file_exists($filepath)){
            mkdir($filepath,0775);
        }
        $imgname = "qrcode".$salemanid.".jpg";
        $filename = $filepath."/".$imgname;
        $out = WeChat::downloadWeixinFile($ticket,$filename);

        $data = Saleman::model()->findByPk($salemanid);
        $data -> qrcode = $imgname;
        if($out){
            if($data->save(false)){
                $this->redirect($this->createUrl('saleman/index'));
            }
        }
    }

}