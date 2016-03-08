<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/11/3
 * Time: 0:07
 */

class OrderTradeno extends CActiveRecord{
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{order_tradeno}}";
    }
} 