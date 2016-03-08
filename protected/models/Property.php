<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Property extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{property}}";
    }

    public function rules(){
        return array(
            array('fieldname','required','message'=>'名称不能为空'),
            array('fieldname','checkUni'),
            array('fieldtype','required','message'=>'类型不能为空'),
            array('categoryid','required','message'=>'分类不能为空'),
        );
    }

    public function attributeLabels(){
        return array(
            'fieldname'=>'属性名称',
            'fieldtype'=>'属性值类型',
            'categoryid'=>'属性分类'
        );
    }

    public function checkUni(){
        if(!$this->hasErrors()) {
            $data = $this->find(
                'categoryid=:id and fieldname=:name',
                array(':id' => $this->categoryid,
                    ':name' => $this->fieldname
                )
            );
            if($data){
                $this->addError('fieldname','该名称已经添加');
            }
        }
    }


}