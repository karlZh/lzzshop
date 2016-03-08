<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Category extends CActiveRecord{

    const SHOW_SELECT='————请选择————';
    const SHOW_TOPCATGORY='————顶级分类————';

    public $sons = array();

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{category}}";
    }

    public function rules(){
        return array(
            array('name','required','message'=>'名称不能为空'),
            array('pid','required','message'=>'所属分类不能为空'),
            array('name','unique','message'=>'名称已经添加'),
        );
    }

    public function attributeLabels(){
        return array(
            'name'=>'分类名称',
            'pid'=>'所属分类',
        );
    }

    public function getSons($id,&$sons=array()){
        $data = $this->findAll('pid=:pid',array(':pid'=>$id));
        if(!empty($data)){
            foreach($data as $cate) {
                $sons[] = $cate;
                $this->getSons($cate->id,$sons);
            }
        }
        return $sons;
    }


}