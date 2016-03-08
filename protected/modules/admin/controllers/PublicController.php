<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/21
 * Time: 22:26
 */

class PublicController extends Controller{
    public $layout = "/layouts/login";
    /*
     * actionLogin
     * 后台登录页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionLogin(){
        $model = Admin::model();
        if(!empty($_POST['Admin'])){
            $model->scenario = 'adminlogin';
            $model->attributes = $_POST['Admin'];
            if($model->validate()){
                $this->redirect($this->createUrl('default/index'));
            }
        }
        $this->render('login',array('model'=>$model));
    }

    /*
     * actionLogout
     * 退出操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionLogout(){
        $_SESSION['admin'] = array();
        $this->redirect(array('public/login'));
    }
} 