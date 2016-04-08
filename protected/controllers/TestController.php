<?php
/**
 * Created by PhpStorm.
 * User: peng
 * Date: 2016/4/7
 * Time: 10:18
 */
class TestController extends Controller{
    public function actionInit(){
        $count = Yii::app()->cache->llen('s0001');
        $total = 0;
        for($i=0;$i<$count;$i++){
            $data = Yii::app()->cache -> rpoplpush('s0001','rs0001');
            $total += intval($data);
        }

        $this -> render('result',array('data' => $total));
    }

    public function actionPay(){
        $money = $_GET['money'];
        Yii::app()->cache->lpush('s0001',$money);
        echo '增加：'.$money;
    }
}