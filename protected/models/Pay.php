<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class Pay{

    const APPID     = "wx36e0cccb1ce2dff9"; //appid
    const APPKEY    = "754f0bf956f6cfe3044a384c705e5d18";//appkey
    const MCHID     = "1265138001";         //商户号
    const DEVICE    = "WEB";                //公众号内支付
    const UNIFIEDPAY = "https://api.mch.weixin.qq.com/pay/unifiedorder";    //统一支付接口
    const PAYKEY    = "8ba3bd8bcb3a3dfbb499fbcb59e6db25";

    public static function UNIPay($orderid,$body,$amount,$notify_url,$trade_type='JSAPI',$openid='',$attach=''){
        $params = array(
            'appid'         =>      self::APPID,
            'mch_id'        =>      self::MCHID,
            'device_info'   =>      self::DEVICE,
            'nonce_str'     =>      md5(uniqid()),
            'body'          =>      $body,
            'attach'        =>      $attach,
            'out_trade_no'  =>      $orderid,
            'total_fee'     =>      $amount*100,
            'spbill_create_ip'=>    $_SERVER['REMOTE_ADDR']=="::1"?'127.0.0.1':$_SERVER['REMOTE_ADDR'],
            'notify_url'    =>      $notify_url,
            'trade_type'    =>      $trade_type,
            'openid'        =>      $openid,
        );

        $params = array_filter($params);
        $sign = self::mkSign($params);
        $params['sign'] = $sign;
        $curl = new Curl;
        $xmlData = self::mkXML($params);
        $data = $curl->vpost(self::UNIFIEDPAY,$xmlData);
        return $data;
    }

    public static function mkSign($params){
        ksort($params);
        $queryArr = array();
        foreach($params as $key => $val){
            $queryArr[] = $key."=".$val;
        }
        $queryString = join("&",$queryArr);
        return $sign = strtoupper(md5($queryString."&key=".self::PAYKEY));
    }

    public static function mkXML($params){
        $xml = "<xml>";
        foreach($params as $key => $val){
            $xml .= "<$key>$val</$key>";
        }
        $xml .= "</xml>";
        return $xml;
    }

}