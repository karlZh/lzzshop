<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Member extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{member}}";
    }

    public function rules(){
        return array(
            array('openid','required','message'=>'openid不能为空'),
            array('openid','unique','message'=>'openid不能重复'),
            array('nickname','unique','message'=>'昵称已经添加'),
            array('sex','required','message'=>'性别不能为空'),
            array('language','required','message'=>'语言不能为空'),
            array('city','required','message'=>'城市不能为空'),
            array('province','required','message'=>'省份不能为空'),
            array('country','required','message'=>'国家不能为空'),
            array('headimgurl','required','message'=>'头像不能为空'),
            array('subscribe_time','required','message'=>'订阅时间不能为空'),
            array('unionid','required','message'=>'uid不能为空'),
            array('remark','required','message'=>'备注不能为空'),
        );
    }

    public function attributeLabels(){
        return array(

        );
    }


}