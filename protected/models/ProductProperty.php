<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class ProductProperty extends CActiveRecord{

    public $propertyname;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{product_property}}";
    }

    public function rules(){
        return array(
            array('value','required','message'=>'字段值不能为空'),
            array('productid','required','message'=>'商品id值不能为空'),
            array('propertyid','required','message'=>'属性id值不能为空'),
            array('ischoice,isshow','safe'),
        );
    }

    public function attributeLabels(){
        return array(

        );
    }



}