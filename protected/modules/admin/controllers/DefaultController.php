<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:15
 */

class DefaultController extends Controller
{
    /*
     * actionIndex
     * 后台首页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
	public function actionIndex(){
		$this->render('index');
	}
}