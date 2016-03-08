<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class BrandCate extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{brand_cate}}";
    }

    public function rules(){
        return array(
            array('name','required','message'=>'名称不能为空'),
            array('name','unique','message'=>'名称已经添加'),
        );
    }

    public function attributeLabels(){
        return array(
            'name'=>'品牌分类名称',
        );
    }


}