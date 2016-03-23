<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/23
 * Time: 11:42
 */

class WeChat{

    const APPID = "wx36e0cccb1ce2dff9";
    const APPKEY = "754f0bf956f6cfe3044a384c705e5d18";

    const OAUTH_URL = "https://open.weixin.qq.com/connect/oauth2/authorize";
    const GET_ACCESS_TOKEN_URL = "https://api.weixin.qq.com/sns/oauth2/access_token";
    const GET_USER_INFO = "https://api.weixin.qq.com/sns/userinfo";
    const GET_ACCESS_TOKEN = "https://api.weixin.qq.com/cgi-bin/token";
    const CREATE_TICKET ="https://api.weixin.qq.com/cgi-bin/qrcode/create";
    const QRCODE_URL = "https://mp.weixin.qq.com/cgi-bin/showqrcode";

    public static function getAccessToken($code){
        $url = self::GET_ACCESS_TOKEN_URL
            ."?appid=".WeChat::APPID
            ."&secret=".WeChat::APPKEY
            ."&code=".$code
            ."&grant_type=authorization_code";
        $output = Yii::app()->curl->get($url);

        return $output;
    }

    public static function getUserInfo($token,$openid){
        $url = self::GET_USER_INFO
            ."?access_token=".$token
            ."&openid=".$openid
            ."&lang=zh_CN";
        $output = Yii::app()->curl->get($url);

        return $output;
    }

    /*
     * getPlatformToken
     * 获取access_token
     * @author chao
     * @date 2016-3-10
     * @time 10:30
     * @since v1.0
     */
    public static function getPlatformToken(){
        $url = self::GET_ACCESS_TOKEN
            ."?grant_type=client_credential"
            ."&appid=".WeChat::APPID
            ."&secret=".WeChat::APPKEY;
        $output = Yii::app()->curl->get($url);

        return $output;
    }
    /*
     * createTicket
     * 创建二维码ticket
     * @author chao
     * @date 2016-3-10
     * @time 10:30
     * @since v1.0
     */
    public static function createTicket($token,$data){
        $url = self::CREATE_TICKET
            ."?access_token=".$token;
        Yii::app()->curl->setOption(CURLOPT_SSL_VERIFYPEER,false);
        Yii::app()->curl->setOption(CURLOPT_SSL_VERIFYHOST,false);
        if(!empty($data)){
            Yii::app()->curl->setOption(CURLOPT_POST,1);
            Yii::app()->curl->setOption(CURLOPT_POSTFIELDS,$data);
        }
        Yii::app()->curl->setOption(CURLOPT_RETURNTRANSFER,1);

        $output = Yii::app()->curl->get($url);

        return $output;
    }
    /*
     * downloadWeixinFile
     * 创建二维码ticket
     * 参数（二维码ticket，文件路径及文件名）
     * @author chao
     * @date 2016-3-10
     * @time 10:30
     * @since v1.0
     */
    public static function downloadWeixinFile($ticket,$filename){
        $url = self::QRCODE_URL
            ."?ticket=".urlencode($ticket);
//        $curlset = array(
//            CURLOPT_HEADER => 0,
//            CURLOPT_NOBODY => 0,
//            CURLOPT_SSL_VERIFYPEER => false,
//            CURLOPT_SSL_VERIFYHOST => false,
//            CURLOPT_RETURNTRANSFER => 1
//        );
        Yii::app()->curl->resetOptions();
        Yii::app()->curl->setOption(CURLOPT_NOBODY,0);
        Yii::app()->curl->setOption(CURLOPT_SSL_VERIFYHOST,false);
//        $arr =  Yii::app()->curl->getOptions();
//        $ch = curl_init($url);
//        curl_setopt($ch,CURLOPT_HEADER,0);
//        curl_setopt($ch,CURLOPT_NOBODY,0);
//        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
//        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
//        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
//        $package = curl_exec($ch);
//        $httpinfo = curl_getinfo($ch);
//        curl_close($ch);
//        $output = array_merge(array('body'=>$package),array('header'=>$httpinfo));
//        Yii::app()->curl->setOptions($curlset);
        $output = Yii::app()->curl->get($url);
        $local_file = fopen($filename,'w');
        if(false !== $local_file){
            if(false !== fwrite($local_file,$output)){
                fclose($local_file);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
            }
    }
}