<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='/layouts/layout';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function error($errno='error_params',$data=false) {
        $errNo = strtoupper($errno);
        $errorMsg = array(
            'errno' => constant('Constants::'.$errNo),
            'errmsg'=> Constants::$errMsg[$errNo],
            'data'  => $data
        );
        Yii::log($errmsg.":".json_encode($_REQUEST),$errno);
        $this->viewPath = dirname($this->getViewPath());
        $this->render('error',$errorMsg);
        Yii::app()->end();
    }

}