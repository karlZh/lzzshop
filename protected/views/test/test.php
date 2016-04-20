<?php
/**
 * Created by PhpStorm.
 * User: peng
 * Date: 2016/4/20
 * Time: 11:43
 */
?>

<input type="button" value="去支付" data-value="1" class="topay" style="height:30px;line-height:10px;"/>
<script>

$(".topay").click(function(){
//        alert('开发中，请重新下单');
    var orderid = $(this).attr('data-value');
    var postData = {
        "orderid":orderid
        }

        $.post("<?php echo $this -> createUrl('order/orderpay');?>",postData,function(d){
            if(d.errnot){
                WeixinJSBridge.invoke('getBrandWCPayRequest',{
                    "appId" : d.data.appId, //公众号名称，由商户传入
                    "timeStamp":d.data.timeStamp, //时间戳，自 1970 年以来的秒数
                    "nonceStr" : d.data.nonceStr, //随机串
                    "package" : d.data.package,
                    "signType" : d.data.signType, //微信签名方式:
                    "paySign" : d.data.paySign //微信签名
                },function(res) {
                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                        alert('支付成功');window.location.href='<?php echo $this->createUrl("order/list") ?>';
                    } else if(res.err_msg == 'get_brand_wcpay_request:cancel') {
                        alert('您取消了支付');
                        $("#js-choice").val('去 支 付').attr('disabled',false);
                    }else{
                        alert('支付失败');
                        $("#js-choice").val('去 支 付').attr('disabled',false);
                    }
                    window.location.href='<?php echo $this->createUrl("order/list") ?>';
                })

            }else{
                alert(d.errmsg);
                window.location.reload();
            }
        },"json")
    });
</script>