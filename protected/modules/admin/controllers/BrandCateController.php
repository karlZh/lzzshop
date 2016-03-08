<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class BrandCateController extends Controller{
    const PAGE_SIZE = 10;

    public function actionAdd(){
        $model = new BrandCate;
        if(!empty($_POST['BrandCate'])){
            $model->attributes = $_POST['BrandCate'];
            if($model->validate()){
                $model->createtime = time();
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','添加成功');
                }else{
                    Yii::log('添加品牌分类失败,params:'.json_encode($_POST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }
        $this->render('cateadd',array('model'=>$model));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;
        $model = BrandCate::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        $cates = $model->findAll($criteria);

        $this->render(
            'catelist',
            array(
                'pager'=>$pages,
                'cates'=>$cates
            )
        );
    }

    public function actionDel(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = BrandCate::model();
        if(!Brand::model()->find('brandcateid=:id',array(':id'=>$id))){
            if($model->deletebypk($id)){
                Yii::app()->user->setFlash('info','删除成功');
            }else{
                Yii::log('删除品牌分类失败,params:'.json_encode($_GET),Constants::ERROR_DELETE);
                Yii::app()->user->setFlash('info','删除失败');
            }
        }else{
            Yii::log('删除失败,该分类下包含品牌,params:'.json_encode($_GET),Constants::ERROR_DELETE);
            Yii::app()->user->setFlash('info','删除失败,该分类下包含品牌,请先删除品牌');
        }
        $this->redirect(array('brandcate/index'));
    }

    public function actionMod(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = BrandCate::model();
        $currCate = $model->findbypk($id);
        if(!empty($_POST['BrandCate'])){
            $currCate->attributes = $_POST['BrandCate'];
            if($currCate->updateAll(array('name'=>$_POST['BrandCate']['name']),'id=:id',array(':id'=>$id))){
                Yii::app()->user->setFlash('info','更新成功');
                $currCate->name = $_POST['BrandCate']['name'];
            }else{
                Yii::log('更新品牌分类失败,params:'.json_encode($_REQUEST),Constants::ERROR_UPDATE);
                Yii::app()->user->setFlash('info','更新失败');
            }
        }
        $this->render('catemod',array('model'=>$currCate));
    }

}