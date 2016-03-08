<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class CategoryController extends Controller{
    const PAGE_SIZE = 10;

    public function actionAdd(){
        $model = new Category;
        if(!empty($_POST['Category'])){
            $model->attributes = $_POST['Category'];
            if($model->validate()){
                $model->createtime = time();
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','添加成功');
                }else{
                    Yii::log('添加分类失败,params:'.json_encode($_POST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }

        $cates = $model->findAll();
        $cate = array('添加顶级分类');
        foreach($cates as $val){
            $cate[$val->id] = $val->name;
        }
        $this->render('cateadd',array('model'=>$model,'cates'=>$cate));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;
        $model = Category::model();
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
        $model = Category::model();
        if(!Property::model()->find('categoryid=:id',array(':id'=>$id))){
            if($model->deletebypk($id)){
                Yii::app()->user->setFlash('info','删除成功');
            }else{
                Yii::log('删除分类失败,params:'.json_encode($_GET),Constants::ERROR_DELETE);
                Yii::app()->user->setFlash('info','删除失败');
            }
        }else{
            Yii::log('删除失败,该分类下包含属性,params:'.json_encode($_GET),Constants::ERROR_DELETE);
            Yii::app()->user->setFlash('info','删除失败,该分类下包含属性,请先删除属性');
        }
        $this->redirect(array('cate/index'));
    }

    public function actionMod(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = Category::model();
        $currCate = $model->findbypk($id);
        if(!empty($_POST['Category'])){
            $currCate->attributes = $_POST['Category'];
            if($currCate->updateAll(array('name'=>$_POST['Category']['name']),'id=:id',array(':id'=>$id))){
                Yii::app()->user->setFlash('info','更新成功');
                $currCate->name = $_POST['Category']['name'];
            }else{
                Yii::log('更新属性分类失败,params:'.json_encode($_REQUEST),Constants::ERROR_UPDATE);
                Yii::app()->user->setFlash('info','更新失败');
            }
        }
        $cates = $model->findAll();
        $cate = array('添加顶级分类');
        foreach($cates as $val){
            $cate[$val->id] = $val->name;
        }
        $this->render('catemod',array('model'=>$currCate,'cates'=>$cate));
    }

}