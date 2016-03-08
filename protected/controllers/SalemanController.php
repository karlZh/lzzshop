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
        $model = new Saleman;
        if(!empty($_POST['Saleman'])){

        }
        $this->renderPartial('login');
    }
}