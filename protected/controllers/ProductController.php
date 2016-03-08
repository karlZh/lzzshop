<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:22
 */

class ProductController extends Controller{
    const PAGE_SIZE = 10;
    /*
     * actionList
     * 商品列表页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionList(){
        $cid = $_GET['categoryid'];
        if(empty($cid)){
            $this->error('error_params','categoryid参数为空',false);
        }
        $model = Product::model();
        $products = $model->getProducts($cid);
        $t = $model->count();
        $pageCount = ceil($t/self::PAGE_SIZE);
        $pageNum = empty($_GET['page'])?1:$_GET['page'];

        $offset = ($pageNum-1)*self::PAGE_SIZE;

        $products = array_slice($products,$offset,self::PAGE_SIZE);

        $data = array(
            'products'=>$products,
            'total'=>$pageCount,
            'pagenum'=>$pageNum,
            'cid'=>$cid,
            'prev'=>($pageNum-1<=1)?1:($pageNum-1),
            'next'=>($pageNum+1>$pageCount)?$pageCount:($pageNum+1),
        );

        $this->render('products',$data);
    }

    /*
     * actionDetail
     * 商品详情页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionDetail(){
        $id = Yii::app()->request->getParam('productid');
        $params = array(
            'productid'=>$id,
        );
        $this->validateParams($params);
        $product = Product::model()->findbypk($id);
        $brand = Brand::model()->findbypk($product->brandid);
        if(!empty($brand)){
            $product->brandname = $brand->name;
        }else{
            $product->brandname = '无品牌';
        }

        $properties = ProductProperty::model()->findAll('productid=:pid',array(':pid'=>$id));
        foreach($properties as $property){
            $property->propertyname = Property::model()->findbypk($property->propertyid)->fieldname;
        }

        $data = array(
            'product'=>$product,
            'properties'=>$properties,
        );
        $this->render('detail',$data);
    }

    /*
     * actionPicDetail
     * 商品详情页渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionPicDetail(){
        $id = $_GET['productid'];
        if(empty($id)){
            $this->error('error_params','productid参数为空',false);
        }
        $product = Product::model()->findbypk($id);

        $data = array(
            'product'=>$product,
        );
        $this->render('picdetail',$data);
    }
} 