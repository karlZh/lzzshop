<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:54
 */

class MemberController extends Controller{

    /*
     * actionIndex
     * 会员页面渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionIndex(){
        $this->render('member');
    }

    public function actionLogout(){
        session_unset();
        session_destroy();
        $this->redirect($this->createUrl("index/index"));
    }
}