<?php
    class ReceiveController extends Controller{

        public function actionCreate(){
            $receivepeople = Yii::app()->request->getParam("receivepeople");
            $receiveaddr = Yii::app()->request->getParam("receiveaddr");
            $receivetel = Yii::app()->request->getParam("receivetel");
            $email = Yii::app()->request->getParam("email");
            $postcode = Yii::app()->request->getParam("postcode");

            if(empty($receivepeople)||empty($receiveaddr)||empty($receivetel)||empty($postcode)){
                $errorMsg = array(
                    'errno'=>Constants::ERROR_PARAMS,
                    'errmsg'=>Constants::$errMsg[Constants::ERROR_PARAMS],
                    'data'=>false,
                );
                echo json_encode($errorMsg);
            }else{
                $model = new Receive;
                $model->receivepeople = $receivepeople;
                $model->receiveaddr = $receiveaddr;
                $model->receivetel = $receivetel;
                $model->email = $email;
                $model->postcode = $postcode;
                $model->memberid = $_SESSION['member']['id'];
                $model->createtime = time();
                if($model->save(false)){
                    $data = array(
                        'errno'=>0,
                        'errmsg'=>'添加联系人成功',
                        'data'=>array(
                            'id'=>$model->getPrimaryKey(),
                            'receivepeople'=>$receivepeople,
                            'receiveaddr'=>$receiveaddr,
                            'receivetel'=>$receivetel,
                            'email'=>$email,
                            'memberid'=>$_SESSION['member']['id'],
                            'postcode'=>$postcode,
                        ),
                    );
                    echo json_encode($data);
                }else{
                    $errorMsg = array(
                        'errno'=>Constants::ERROR_INSERT,
                        'errmsg'=>Constants::$errMsg[Constants::ERROR_INSERT],
                        'data'=>false,
                    );
                    echo json_encode($errorMsg);
                }
            }

        }

        public function actionIndex(){
            $cart = Yii::app()->request->getParam('cart');
            if(!empty($cart)){
                $_SESSION['topay'] = $cart;
            }

            if( empty($_SESSION['topay']) ){
                $this->redirect($this->createUrl('cart/index'));
                Yii::app()->end();
            }

            if(!isset($_SESSION['member']['islogin'])||$_SESSION['member']['islogin']!=1 || empty($_SESSION['member']['id'])){
                //执行微信登录
                $this->redirect($this->createUrl('wechat/welogin'));
                Yii::app()->end();
            }
            $receives = Receive::model()->findAll('memberid=:id',array(':id'=>$_SESSION['member']['id']));
            $data = array(
                'receives'=>$receives,
            );

            $this->render('receivelist',$data);
        }

    }