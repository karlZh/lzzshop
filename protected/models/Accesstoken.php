<?php
/**
 * Created by PhpStorm.
 * User: peng
 * Date: 2016/3/21
 * Time: 15:16
 */
class Accesstoken extends CActiveRecord{
    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{accesstoken}}";
    }
}