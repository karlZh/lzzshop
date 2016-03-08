<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class OrderDetail extends CActiveRecord{
    public $title;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{order_detail}}";
    }

    public function rules(){
        return array(
            /*array('productid','required','message'=>'商品id不能为空'),
            array('num','required','message'=>'商品数量不能为空'),
            array('price','required','message'=>'商品价格不能为空'),
            array('amount','required','message'=>'商品总额不能为空'),
            array('memberid','required','message'=>'下单用户不能为空'),*/
        );
    }

    public function attributeLabels(){
        return array(
            
        );
    }


}