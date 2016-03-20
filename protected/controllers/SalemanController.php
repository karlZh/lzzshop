<?php
/**
 * Created by PhpStorm.
 * User: CHAO
 * Date: 2016/3/8
 * Time: 21:28
 */
class SalemanController extends Controller{
    /**
     * 业务员登陆页面
     */
    public function actionLogin(){
        $model = Saleman::model();
        if(!empty($_POST['Saleman'])){
            $model->scenario = "salemanlogin";
            $model->attributes = $_POST['Saleman'];
            if($model->validate()){
                echo "您登陆了";
//                $this->redirect($this->createUrl('default/index'));
            }
        }
        $this->renderPartial('login',array('model'=>$model));
    }
}