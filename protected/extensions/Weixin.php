<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2016/3/25
 * Time: 14:41
 */
class Weixin
{
    //    $_GET参数
    public $signature;
    public $timestamp;
    public $nonce;
    public $echostr;
    //
    public $token;
    public $debug = false;
    public $msg = array();
    public $setFlag = false;

    /**
     * __construct
     *
     * @param mixed $params
     * @access public
     * @return void
     */
    public function init($params = array())
    {
        foreach($params as $k1 =>$v1)
        {
            if(property_exists($this,$k1))
            {
                $this->$k1 = $v1;
            }
        }
    }

    /**
     * valid
     * 微信接口验证
     * @access public
     * @return void
     */
    public function valid()
    {
        if($this->checkSignature()){
            echo $this->echostr;
            Yii::app()->end();
        }
    }

    /**
     * 获得用户发过来的消息(消息内容和消息类型)
     *
     * @access public
     * @return void
     */
    public function getMsg()
    {
        $postStr = empty($GLOBALS["HTTP_RAW_POST_DATA"])?'':$GLOBALS["HTTP_RAW_POST_DATA"];
        if($this->debug)
        {
            $this->log($postStr);
        }
        if(!empty($postStr))
        {
            $this->msg = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
        }
    }

    /**
     * makeEvent
     *
     * @access public
     * @return void
     */
    public function makeEvent()
    {
        if((!empty($this->msg->Event)&&($this->msg->Event=='subscribe')))
        {
            return $this->makeText('欢迎关注绿蜘蛛！');
        }
    }

    /**
     * 回复文本信息
     *
     * @param string $text
     * @access public
     * @retrun void
     */
    public function makeText($text='')
    {
        $createTime = time();
//        $funcFlag = $this->setFlag ? 1 : 0;
        $textTpl = "<xml>
            <ToUserName><![CDATA[{$this->msg->FromUserName}]]></ToUserName>
            <FromUserName><![CDATA[{$this->msg->ToUserName}]]></FromUserName>
            <CreateTime>{$createTime}</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            </xml>";
//        return sprintf($textTpl,$text,$funcFlag);
        return sprintf($textTpl,$text);
    }

    /**
     * 根据数组参数回复图文消息
     *
     * @param array $newData
     * @access public
     * @return void
     */
    public function makeNews($newsData=array())
    {
        $createTime = time();
        //$funcFlag = $this->setFlag ? 1 : 0; //这个接口xml信息已经废弃

        //组建返回数组的xml，其中newTplItem是会循环增加多条，但不多于10条
        $newTplHeader = "<xml>
            <ToUserName><![CDATA[{$this->msg->FromUserName}]]></ToUserName>
            <FromUserName><![CDATA[{$this->msg->ToUserName}]]></FromUserName>
            <CreateTime>{$createTime}</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <ArticleCount>%s</ArticleCount><Articles>";
        $newTplItem = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>";
        $newTplFoot = "</Articles>
            </xml>";

        $content = '';
        $itemsCout = count($newsData['items']);
        // 微信公众平台图文回复的信息一次最多十条
        $itemsCout = $itemsCout<10 ? $itemsCout : 10 ;
        //组建content内容
        if($itemsCout) {
            foreach ($newsData['items'] as $key => $item){
                if($key<=9){
                    $content.= sprintf($newTplItem,$item['title'],$item['description'],$item['picurl'],$item['url']);
                }
            }
        }
        $header = sprintf($newTplHeader,$itemsCout);
//        $footer = sprintf($newTplFoot,$funcFlag);
        $footer = sprintf($newTplFoot);

        //拼接
        return $header.$content.$footer;
    }

    /**
     * reply
     *
     * @param mixed $data
     * @access public
     * @return void
     */
    public function reply($data)
    {
        if($this->debug){
            $this->log($data);
        }
//        echo $data;
    }

    /**
     * checkSignature
     *
     * @access private
     * @return void
     */
    private function checkSignature()
    {
        $tmpArr = array($this->token,$this->timestamp,$this->nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if($tmpStr==$this->signature){
            return true;
        }else{
            return false;
        }
    }

    /**
     * log
     *
     * @access private
     * @return void
     */
    private function log($log)
    {
        if($this->debug){
            fopen(Yii::app()->basePath.'/runtime/weixin_log.txt','a+');
            file_put_contents(Yii::app()->basePath.'/runtime/weixin_log.txt',var_export($log,true)."\n\r", FILE_APPEND);
        }
    }
}