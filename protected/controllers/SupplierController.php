<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:54
 */

class SupplierController extends Controller{

    /*
     * actionIndex
     * 会员页面渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionIndex(){
       $model = new Supplier;
        if(!empty($_POST['Supplier'])){
            $model->attributes = $_POST['Supplier'];
            if($model->validate()){
                $model->createtime = time();
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','提交成功');
                }else{
                    Yii::log('提交失败,params:'.json_encode($_REQUEST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','提交失败');
                }
            }
        }
        $this->render('index',array('model'=>$model));
    }

}