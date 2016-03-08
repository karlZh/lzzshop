<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class BrandController extends Controller{
    const PAGE_SIZE = 10;
    const BRAND_LOGO_PATH = "./assets/uploads/brands/";

    public function actionAdd(){
        $model = new Brand;
        if(!empty($_POST['Brand'])){
            $model->attributes = $_POST['Brand'];
            $model->picurl = CUploadedFile::getInstance($model, "picurl");
            if($model->validate()){
                $brandpic = uniqid().".".$model->picurl->getExtensionName();
                $model->picurl->saveAs(self::BRAND_LOGO_PATH.$brandpic);
                $model->picurl = $brandpic;
                $model->createtime = time();
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','添加成功');
                }else{
                    Yii::log('添加品牌失败,params:'.json_encode($_REQUEST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }
        $bcates = BrandCate::model()->findAll();
        $brandcates = array();
        foreach($bcates as $cate){
            $brandcates[$cate->id] = $cate->name;
        }
        $this->render('brandadd',array('model'=>$model,'brandcates'=>$brandcates));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;
        $model = Brand::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        $brands = $model->findAll($criteria);

        $this->render(
            'brandlist',
            array(
                'pager'=>$pages,
                'brands'=>$brands
            )
        );
    }

    public function actionDel(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = Brand::model();
        $picurl = $model->findbypk($id)->picurl;
        if($model->deletebypk($id)){
            Yii::app()->user->setFlash('info','删除成功');
            unlink(self::BRAND_LOGO_PATH.$picurl);
        }else{
            Yii::log('删除品牌失败,params:'.json_encode($_GET),Constants::ERROR_DELETE);
            Yii::app()->user->setFlash('info','删除失败');
        }
        $this->redirect(array('brand/index'));
    }

}