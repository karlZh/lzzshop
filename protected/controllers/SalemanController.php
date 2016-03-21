<?php
/**
 * Created by PhpStorm.
 * User: CHAO
 * Date: 2016/3/8
 * Time: 21:28
 */
class SalemanController extends Controller{
    public $layout = "/layouts/saleman";
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

    public function createewm(){
        $WechartModel = new WeChat;
        $access_token = $WechartModel->getAccessToken()
    }
}