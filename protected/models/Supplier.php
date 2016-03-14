<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Supplier extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

//    public function tableName(){
//        return "{{supplier}}";
//    }

    public function rules(){
        return array(
            array('name','required','message'=>'姓名不能为空'),
            array('phone','required','message'=>'电话不能为空'),
            array('company_name','required','message'=>'公司名称不能为空'),
            array('product','required','message'=>'供应商品不能为空'),
            array('company_adress','required','message'=>'公司地址不能为空'),
        );
    }

    public function attributeLabels(){
        return array(
            'name'=>'姓名',
            'phone'=>'电话',
            'company_name'=>'公司名称',
            'product'=>'供应商品',
            'company_adress'=>'公司地址',
        );
    }
}