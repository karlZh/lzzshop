<?php
    class OrderController extends Controller{

        public function actionCreate(){
            $receiveid = Yii::app()->request->getParam('receiveid');
            $paytypeid = Yii::app()->request->getParam('paytypeid');
            $expresstypeid = Yii::app()->request->getParam('expresstypeid');

            $place_order_uid = $_SESSION['member']['id'];
            $topay = $_SESSION['topay'];
            $expressno = "000001";//test
            $status = Constants::$orderStatus['submit'];

            $amount = 0;
            $productnum = 0;
            $transaction_id = '000001';
            foreach($topay as $pro){
                $amount += $pro['num']*$pro['price'];
                $productnum += $pro['num'];
            }

            $params = array(
                'receiveid'         =>  $receiveid,
                'transaction_id'    =>  $transaction_id,
                'topay'             =>  $topay,
                'paytypeid'         =>  $paytypeid,
                'expresstypeid'     =>  $expresstypeid,
                'place_order_uid'   =>  $place_order_uid,
                'amount'            =>  $amount,
                'productnum'        =>  $productnum,
                'expressno'         =>  $expressno,
                'status'            =>  $status,
            );
            $this->validateParams($params);

            //创建订单
            $model = new Order();
            $model->transaction_id = $transaction_id;
            $model->paytypeid = $paytypeid;//微信支付
            $model->place_order_uid = $_SESSION['member']['id'];
            $model->receiveid = $receiveid;
            $model->amount = $amount;
            $model->status = $status;
            $model->productnum = $productnum;
            $model->expressno = $expressno;
            $model->expresstypeid = $expresstypeid;//顺丰快递
            $model->createtime = time();

            if($model->save(false)){
                $orderid = $model->getPrimaryKey();
                foreach($topay as $key => $pro){
                    $params = array(
                        'orderid'   =>  $orderid,
                        'productid' =>  $key,
                        'num'       =>  $pro['num'],
                        'price'     =>  $pro['price'],
                    );
                    $this->validateParams($params);
                    $orderDetailModel = new OrderDetail();
                    $orderDetailModel->orderid = $orderid;
                    $orderDetailModel->productid = $key;
                    $orderDetailModel->num = $pro['num'];
                    $orderDetailModel->price = $pro['price'];
                    $orderDetailModel->createtime = time();
                    $orderDetailModel->save(false);
                }
                $notify_url = "http://www.greenspider.cn/weshop/notify.php";
                $ot = new OrderTradeno();
                $ot->orderid = $orderid;
                $ot->status = Constants::$orderStatus['submit'];
                $ot->createtime = time();
                $tradeno = md5($orderid.uniqid());
                $ot->tradeno = $tradeno;
                if(!$ot->save(false)){
                    $this->error('error_order_create','创建订单失败',false);
                    Yii::app()->end();
                }
                $xmlData = Pay::UNIPay($tradeno,'绿蜘蛛电子商品',$amount,$notify_url,'JSAPI',$_SESSION['member']['openid']);
                $xmlObj = simplexml_load_string($xmlData,'SimpleXMLElement',LIBXML_NOCDATA);
                $prepay_id = "prepay_id=".$xmlObj->prepay_id;
                $data = array(
                    'appId'     =>  Pay::APPID,
                    'timeStamp' =>  strval(time()),
                    'nonceStr'  =>  md5(uniqid()),
                    'package'   =>  $prepay_id,
                    'signType'  =>  'MD5',
                );
                $paySign = Pay::mkSign($data);
                $data['paySign'] = $paySign;
                $data['orderid'] = $orderid;
                foreach($topay as $key=>$val){
                    unset($_SESSION['cart'][$key]);
                }
                $_SESSION['topay'] = array();
                $this->error('error_ok','下单成功',$data);
            }else{
                $this->error('error_order_create','创建订单失败',false);
            }

        }

        public function actionNotify(){
            $xmlData = $GLOBALS['HTTP_RAW_POST_DATA'];
            $xmlObj = simplexml_load_string($xmlData,'SimpleXMLElement',LIBXML_NOCDATA);
            $sign = $xmlObj->sign;
            $params = json_decode(json_encode($xmlObj),true);
            unset($params['sign']);
            $localSign = Pay::mkSign($params);
            if( $sign != $localSign ){
                $params = array(
                    "return_code"=>"FAIL",
                    "return_msg"=>"签名失败"
                );
            }else{
                $params = array(
                    "return_code"=>"SUCCESS"
                );
                if ($xmlObj->return_code == "FAIL") {
                    //此处应该更新一下订单状态，商户自行增删操作
                    $orderid = OrderTradeno::model()->find('tradeno=:t',array(':t'=>$xmlObj->out_trade_no))->orderid;
                    OrderTradeno::model()->updateAll(array('status'=>Constants::$orderStatus['payerr']),'tradeno=:t',array(':t'=>$xmlObj->out_trade_no));
                    Order::model()->updateByPk($orderid,array('status'=>Constants::$orderStatus['payerr']));
                    Yii::log("【业务出错】:\n".$xmlObj."\n");
                }
                elseif($xmlObj->result_code == "FAIL"){
                    //此处应该更新一下订单状态，商户自行增删操作
                    $orderid = OrderTradeno::model()->find('tradeno=:t',array(':t'=>$xmlObj->out_trade_no))->orderid;
                    OrderTradeno::model()->updateAll(array('status'=>Constants::$orderStatus['payerr']),'tradeno=:t',array(':t'=>$xmlObj->out_trade_no));
                    Order::model()->updateByPk($orderid,array('status'=>Constants::$orderStatus['payerr']));
                    Yii::log("【业务出错】:\n".$xmlObj."\n");
                }
                else{
                    //此处应该更新一下订单状态，商户自行增删操作
                    $orderid = OrderTradeno::model()->find('tradeno=:t',array(':t'=>$xmlObj->out_trade_no))->orderid;
                    OrderTradeno::model()->updateAll(array('status'=>Constants::$orderStatus['paysuc']),'tradeno=:t',array(':t'=>$xmlObj->out_trade_no));
                    Order::model()->updateByPk($orderid,array('transaction_id'=>$xmlObj->transaction_id,'status'=>Constants::$orderStatus['paysuc']));
                    $invitation_code = Member::model()->find('openid=:opid',array(':opid'=>$xmlData->openid))->invitation_code;
                    //支付成功，将订单总额存入redis队列
                    $amount = ($xmlData -> total_fee)/100;
                    Yii::app()->cache->lpush($invitation_code,$amount);

                    Yii::log("【支付成功】:\n".$xmlObj."\n");
                }
            }
            echo Pay::mkXML($params);
        }

        public function actionList(){
            if(isset($_SESSION['member']['id'])) {
                $memberid = $_SESSION['member']['id'];
                $orders = Order::model()->findAll('place_order_uid=:mid', array(':mid' => $memberid));
                foreach($orders as $order){
                    $order->step = Constants::$step[$order->status];
                    $orderDetail = OrderDetail::model();
                    $details = $orderDetail->findAll('orderid=:oid',array(':oid'=>$order->id));
                    foreach($details as $detail){
                        $productModel = Product::model();
                        $product = $productModel->findbypk($detail->productid);
                        $order->products[] = array(
                            'productId' =>  $product->id,
                            'productName'=> $product->title,
                            'productPrice'=>$detail->price,
                            'productNum'=>$detail->num,
                            'productPic'=>$product->cover,
                        );
                    }
                }
            }else{
                $this->redirect($this->createUrl('wechat/welogin'));
                Yii::app()->end();
            }
            $data = array(
                'orderlist'=>empty($orders)?array():$orders,
            );
            $this->render('orderlist',$data);
        }

        public function actonCancel(){
            $orderid = Yii::app() -> request -> getParam('orderid');
            $orderinfo = Order::model() -> findByPk($orderid);
            if(!empty($orderinfo)){
                OrderDetail::model() -> deleteAll('orderid=:oid',array(':oid'=>$orderid));
                OrderTradeno::model() -> delete('orderid=:oid',array(':oid'=>$orderid));
                $orderinfo -> delete();
                $data = array(
                    'error'=> true,
                    'errormsg' => '订单取消成功!'
                );
            }else{
                $data = array(
                    'error'=> true,
                    'errormsg' => '未找到订单!'
                );
            }
        }

    }