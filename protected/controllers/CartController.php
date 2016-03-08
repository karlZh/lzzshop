<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:46
 */

class CartController extends Controller{

    /*
     * actionIndex
     * 购物车页面渲染操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionIndex(){
        $amount = 0.00;
        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            foreach($cart as $key => &$pro){
                $pro['id']    = $key;
                $pro['title'] = Product::model()->findbypk($key)->title;
                $pro['cover'] = Product::model()->findbypk($key)->cover;
                $amount += $pro['amount'];
            }
        }else{
            $cart = array();
        }

        $data = array(
            'cart'=>$cart,
            'amount'=>sprintf("%.2f",$amount),
        );

        $this->render('cartlist',$data);
    }

    /*
     * actionAdd
     * 购物车添加操作
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
    public function actionAdd(){
        if(!empty($_POST)) {
            /*if (isset($_SESSION['member']['islogin']) && $_SESSION['member']['islogin']==1) {
                $isLogin = $_SESSION['member']['islogin'];
            } else {
                $isLogin = 0;
            }*/

            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = array();
            }
            $sessionCart = $_SESSION['cart'];

            $price      = Yii::app()->request->getParam( 'price' );
            $num        = Yii::app()->request->getParam( 'num' );
            $productid  = Yii::app()->request->getParam( 'productid' );
            if(array_key_exists($productid,$sessionCart)){
                $currentNum = $sessionCart[$productid]['num'];
                $num += $currentNum;
            }

            //先加入session
            $cart = array(
                'productid' =>  $productid,
                'price'     =>  $price,
                'num'       =>  $num,
                'amount'    =>  $price*$num,
            );
            $_SESSION['cart'][$productid] = $cart;

            //如果已经登录,购物车加入数据库
            /*if($isLogin) {
                $model = new Cart;
                $cart['memberid']   = $_SESSION['member']['memberid'];
                $cart['createtime'] = time();
                $model->attributes  = $cart;
                $model->save(false);
            }*/
        }else{
            //购物车无内容
            $this->error('error_cart_add');
        }

        $this->redirect($this->createUrl('cart/index'));
    }

    public function actionDel(){
        $id = Yii::app()->request->getParam( 'id' );
        if(!empty($id)){
            $cart = $_SESSION['cart'];
            if(!array_key_exists($id,$cart)){
                $json = array(
                    'errno'=>Constants::ERROR_CART_DEL,
                    'errmsg'=>Constants::$errMsg[Constants::ERROR_CART_DEL],
                    'data'=>false,
                );
                echo json_encode($json);
            }

            unset($_SESSION['cart'][$id]);

            /*if(isset($_SESSION['member']['islogin']) && $_SESSION['member']['islogin']==1){
                $memberid = $_SESSION['member']['memberid'];
                $productid = $id;
            }*/

            $json = array(
                'errno'=>0,
                'errmsg'=>'ok',
                'data'=>$_SESSION['cart'],
            );
            echo json_encode($json);

        }else{
            $json = array(
                'errno'=>Constants::ERROR_CART_DEL,
                'errmsg'=>Constants::$errMsg[Constants::ERROR_CART_DEL],
                'data'=>false,
            );
            echo json_encode($json);
        }
    }

    public function actionGetNum(){
        if(isset($_SESSION['cart'])){
            echo count($_SESSION['cart']);
        }else{
            echo 0;
        }

    }

} 