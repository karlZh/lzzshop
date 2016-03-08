<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class PropertyController extends Controller{
    const PAGE_SIZE = 10;

    public function actionAdd(){
        $model = new Property;
        if(!empty($_POST['Property'])){
            $model->attributes = $_POST['Property'];
            if($model->validate()){
                $model->createtime = time();
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','添加成功');
                }else{
                    Yii::log('添加属性失败,params:'.json_encode($_REQUEST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }
        $pcates = Category::model()->findAll();
        $Propertycates = array();
        foreach($pcates as $cate){
            $Propertycates[$cate->id] = $cate->name;
        }
        $this->render('propertyadd',array('model'=>$model,'propertycates'=>$Propertycates));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;
        $model = Property::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        $properties = $model->findAll($criteria);

        $this->render(
            'propertylist',
            array(
                'pager'=>$pages,
                'properties'=>$properties
            )
        );
    }

    public function actionDel(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = Property::model();
        if($model->deletebypk($id)){
            Yii::app()->user->setFlash('info','删除成功');
        }else{
            Yii::log('删除属性失败,params:'.json_encode($_GET),Constants::ERROR_DELETE);
            Yii::app()->user->setFlash('info','删除失败');
        }
        $this->redirect(array('property/index'));
    }

    public function actionMod(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = Property::model();
        $currCate = $model->findbypk($id);
        if(!empty($_POST['Property'])){
            $currCate->attributes = $_POST['Property'];
            if($currCate->updateAll(
                array(
                    'fieldname'=>$_POST['Property']['fieldname'],
                    'fieldtype'=>$_POST['Property']['fieldtype'],
                    'categoryid'=>$_POST['Property']['categoryid'],
                ),
                'id=:id',
                array(':id'=>$id)
            )){
                Yii::app()->user->setFlash('info','更新成功');
            }else{
                Yii::log('更新品牌分类失败,params:'.json_encode($_REQUEST),Constants::ERROR_UPDATE);
                Yii::app()->user->setFlash('info','更新失败');
            }
        }
        $pcates = Category::model()->findAll();
        $Propertycates = array();
        foreach($pcates as $cate){
            $Propertycates[$cate->id] = $cate->name;
        }
        $this->render('propertymod',array('model'=>$currCate,'propertycates'=>$Propertycates));
    }

    public function actionGetProperty(){
        $cateid = $_GET['cid'];
        if(empty($cateid)){
            $this->error('error_params','categoryid参数为空',false);
        }
        $data = Property::model()->findAll(
            'categoryid=:cid',
            array(':cid'=>$cateid)
        );
        if(!empty($data)) {
            foreach ($data as $p) {
                $ps[] = array(
                    'id' => $p->id,
                    'fieldname' => $p->fieldname,
                    'fieldtype' => $p->fieldtype,
                    'categoryid' => $p->categoryid,
                    'createtime' => $p->createtime,
                );
            }
        }else{
            $ps = array();
        }
        echo json_encode($ps);
    }

}