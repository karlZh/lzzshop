<?php
/**
 * Created by PhpStorm.
 * 后台业务员管理类
 * User: chao
 * Date: 2016/3/14
 * Time: 13:31
 */
class SalemanController extends Controller{
    const PAGE_SIZE = 10;

    public function actionAdd(){
        $model = new Saleman;
        if(!empty($_POST['Saleman'])){
            $model->scenario = "salemanadd";
            $model->attributes = $_POST['Saleman'];
            if($model->validate()){
                $model->createtime = time();
                $model->password = md5($model->password);
                $model->headimgurl = Yii::app()->request->baseUrl.'/assets/admin/images/headimg.png';
                if($model->save(false)){
                    $salemanid = $model->getPrimaryKey();
                    $invi_code = str_pad(strval($salemanid),8,"0",STR_PAD_LEFT);
                    $str_length = strlen($invi_code);
                    $newstr = '';
                    for($i=0;$i<$str_length;$i++){
                        $insert_str = chr(mt_rand(97,102));
                        $newstr.=$invi_code[$i].$insert_str;
                    }
                    $model->invitation_code = $newstr;
                    if($model->save(false)){
                        Yii::app()->user->setFlash('info','添加成功');
                    }else{
                        Yii::log("添加业务员失败",json_encode($_POST),Clogger::LEVEL_ERROR);
                        Yii::app()->user->setFlash('info','添加失败');
                    }
                }else{
                    Yii::log("添加业务员失败",json_encode($_POST),Clogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }
        $model->password = '';
        $model->repass = '';
        $this -> render('salemanadd',array('model'=>$model));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;

        $model = Saleman::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages -> pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        $salemanList = $model -> findAll($criteria);

        $this -> render('salemanlist',array('salemanList'=>$salemanList,'pager'=>$pages));

    }
}