<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Brand extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{brand}}";
    }

    public function rules(){
        return array(
            array('name','required','message'=>'名称不能为空'),
            array('name','unique','message'=>'名称已经添加'),
            array('picurl','required','message'=>'LOGO不能为空'),
            array('brandcateid','required','message'=>'分类不能为空'),
            array('picurl','file','maxFiles'=>1,'maxSize'=>3*1024*1024,'minSize'=>1,'tooLarge'=>'文件不能超过3M','types'=>array('png','gif','jpg','jpeg'),'wrongType'=>'上传文件类型不正确'),
        );
    }

    public function attributeLabels(){
        return array(
            'name'=>'品牌名称',
            'picurl'=>'品牌LOGO',
            'brandcateid'=>'品牌分类'
        );
    }


}