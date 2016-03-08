<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Product extends CActiveRecord{

    public $brandname;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{product}}";
    }

    public function rules(){
        return array(
            array('title','required','message'=>'名称不能为空'),
            array('categoryid','required','message'=>'分类不能为空'),
            array('describe','required','message'=>'描述不能为空'),
            array('cover','required','message'=>'封面图片不能为空'),
            array('price','required','message'=>'价格不能为空'),
            array('originalprice,brandid,ishot,isonsale,onsaleprice,isputaway','safe'),
            array('cover','file','maxFiles'=>1,'maxSize'=>3*1024*1024,'minSize'=>1,'tooLarge'=>'文件不能超过3M','types'=>array('png','gif','jpg','jpeg'),'wrongType'=>'上传文件类型不正确'),
            array('inventory','required','message'=>'库存不能为空'),

        );
    }

    public function attributeLabels(){
        return array(
            'categoryid'=>'商品分类',
            'title'=>'商品名称',
            'describe'=>'商品描述',
            'price'=>'商品价格',
            'originalprice'=>'商品原价',
            'inventory'=>'商品库存',
            'brandid'=>'商品品牌',
            'ishot'=>'是否热卖',
            'isputaway'=>'是否上架',
            'isonsale'=>'是否促销',
            'onsaleprice'=>'促销价',
            'cover'=>'封面图片',
        );
    }

    public function getProducts($cid){
        $products = $this->findAll('categoryid=:cid',array(':cid'=>$cid));
        $data = Category::model()->getSons($cid);

        foreach($data as $son){
            $sonProducts = $this->findAll('categoryid=:cid',array(':cid'=>$son->id));
            $products = array_merge($products,$sonProducts);
        }
        return $products;
    }

}