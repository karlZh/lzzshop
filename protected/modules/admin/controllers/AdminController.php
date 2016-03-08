<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class AdminController extends Controller{
    const PAGE_SIZE = 10;

    public function actionAdd(){
        $model = new Admin;
        if(!empty($_POST['Admin'])){
            $model->scenario = "adminadd";
            $model->attributes = $_POST['Admin'];
            if($model->validate()){
                $model->createtime = time();
                $model->adminpass = md5($model->adminpass);
                if($model->save(false)){
                    Yii::app()->user->setFlash('info','添加成功');
                }else{
                    Yii::log('添加管理员失败,params:'.json_encode($_POST),CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('info','添加失败');
                }
            }
        }
        $model->adminpass = '';
        $model->repass = '';
        $this->render('adminadd',array('model'=>$model));
    }

    public function actionIndex(){
        $criteria = new CDbCriteria;
        $model = Admin::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        $adminusers = $model->findAll($criteria);

        $this->render(
            'adminlist',
            array(
                'pager'=>$pages,
                'adminusers'=>$adminusers
            )
        );
    }

    public function actionModifyIsForbidden(){
        $id = $_POST['id'];
        $isforbidden = $_POST['isforbidden'];
        if(empty($id)||!isset($isforbidden)){
            echo json_encode(
                array(
                    'errno'=>Constants::ERROR_PARAMS,
                    'errmsg'=>'参数错误',
                    'data'=>false
                )
            );
            Yii::log(
                '修改管理员状态参数错误,params:{id=>'.$id.',isforbidden=>'.$isforbidden.'}',CLogger::LEVEL_ERROR);
            return ;
        }
        $model = Admin::model();
        $data = $model->updateByPk($id,array('isforbidden'=>$isforbidden));
        if($data){
            echo json_encode(
                array(
                    'errno'=>Constants::ERROR_OK,
                    'errmsg'=>'修改成功',
                    'data'=>$data
                )
            );
        }else{
            echo json_encode(
                array(
                    'errno'=>Constants::ERROR_UPDATE,
                    'errmsg'=>'修改失败',
                    'data'=>$data
                )
            );
            Yii::log('修改管理员状态失败,params:{id=>'.$id.',isforbidden=>'.$isforbidden.'}',CLogger::LEVEL_ERROR);
        }
    }

    public function actionDel(){
        $id = $_GET['id'];
        if(empty($id)){
            $this->error('error_params','id参数为空',false);
        }
        $model = Admin::model();
        if($model->deletebypk($id)){
            Yii::app()->user->setFlash('info','删除成功');
        }else{
            Yii::log('删除管理员失败,params:'.json_encode($_GET),Constants::ERROR_DELETE);
            Yii::app()->user->setFlash('info','删除失败');
        }
        $this->redirect(array('admin/index'));
    }

}