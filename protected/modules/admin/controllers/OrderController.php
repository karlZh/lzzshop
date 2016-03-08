<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:24
 */

class OrderController extends Controller{
    const PAGE_SIZE = 10;

    public function actionIndex(){
        $status = Yii::app()->request->getParam('status');
        $criteria = new CDbCriteria;
        $model = Order::model();
        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);
        if(!empty($status)) {
            $criteria->condition = 'status=:s';
            $criteria->params = array(":s"=>Constants::$orderStatus[$status]);
            $orders = Order::model()->findAll($criteria);
        }else{
            $orders = Order::model()->findAll($criteria);
        }
        foreach($orders as $order){
            $order->member = Member::model()->findbypk($order->place_order_uid)->nickname;
            $receive = Receive::model()->findByPk($order->receiveid);
            $order->receive = $receive->receivepeople.' '.$receive->receiveaddr.' '.$receive->receivetel.' '.$receive->email.' '.$receive->postcode;
        }
        $data = array(
            'orders'=>$orders,
            'pager'=>$pages,
        );
        $this->render('orderlist',$data);
    }

    public function actionDetail(){
        $orderid = Yii::app()->request->getParam('id');
        $details = OrderDetail::model()->findAll('orderid=:oid',array(':oid'=>$orderid));
        foreach($details as $detail){
            $detail->title = Product::model()->findByPk($detail->productid)->title;
        }
        $data = array(
            'details'=>$details,
        );
        $this->render('productlist',$data);
    }

    public function actionSend(){
        $model = Order::model();
        if(!empty($_POST['Order'])){
            $res = $model->updateByPk($_GET['id'],array('expressno'=>$_POST['Order']['expressno'],'expresstypeid'=>$_POST['Order']['expresstypeid'],'status'=>Constants::$orderStatus['outing']));
            if($res){
                Yii::app()->user->setFlash('info','添加成功');
            }else{
                Yii::app()->user->setFlash('info','添加失败');
            }
        }
        $data = array(
            'model'=>$model
        );
        $this->render('send',$data);
    }

}