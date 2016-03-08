<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:47
 */
?>
<!--content-->
<div class="page-role cart-page cart-index-page">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/cart/index.css"/>
    <div class="page-title"><a href="javascript:history.back();void(0)" class="return">返 回</a>添加联系人</div>

    <ul id="receives" style="margin-left:10px;color:#40597d">
        <p>选择支付方式:</p>
        <hr>
        <li>
            <input type="radio" name="paytypeid" id="p-1" value="1" checked>
            <label for="r-1">微信支付</label>
        </li>
        <div style="height:30px"></div>

        <p>选择快递方式:</p>
        <hr>
        <li>
            <input type="radio" name="expresstypeid" id="e-1" value="1" checked>
            <label for="r-1">顺丰快递</label>
        </li>
        <div style="height:30px"></div>

        <?php
            if(!empty($receives)):
        ?>
        <p>选择已有联系人:</p>
        <hr>
        <form class="choice-form" autocomplete="off" action="<?php echo $this->createUrl('order/create') ?>" method="post">
        <?php
                foreach($receives as $receive):
        ?>
        <li>
            <input type="radio" name="receiveid" id="r-<?php echo $receive->id ?>" value="<?php echo $receive->id ?>" >
            <label for="r-<?php echo $receive->id ?>"><?php echo $receive->receivepeople.' '.$receive->receiveaddr.' '.$receive->postcode.' '.$receive->receivetel ;?></label>
        </li>


        <?php
                endforeach;
        ?>
            </ul>

            </form>
        <?php
            endif;
        ?>

    <p><a href="javascript:void(0);" id="add-new" style="margin-left:35px;font-size:12px;color:#40597d;text-decoration: underline">添加新联系人</a></p>

    <form class="pxui-form-info" id="js-add-re" style="display:none"  autocomplete="off">
        <input type="hidden" name="rtnurl" value="index"/>
        <p class="error-msg" id="js-error-msg"></p>
        <div>
            <span>收货人</span>
            <p>
                <span>
                    <input name="receivepeople" id="js-username" placeholder="例如 : 张三" type="text" value=""/>
                </span>
            </p>
        </div>
        <div>
            <span>收货地址</span>
            <p>
                <span>
                    <input name="receiveaddr" id="js-password" type="text" placeholder="例如 : 北京市海淀区上地七街110号" />
                </span>
            </p>
        </div>
        <div>
            <span>邮政编码</span>
            <p>
                <span>
                    <input name="postcode" id="js-password" type="text" placeholder="例如 : 100000" />
                </span>
            </p>
        </div>
        <div>
            <span>联系电话</span>
            <p>
                <span>
                    <input name="receivetel" id="js-password" type="text" placeholder="例如 : 13812345678" />
                </span>
            </p>
        </div>
        <div>
            <span>联系邮箱</span>
            <p>
                <span>
                    <input name="email" id="js-password" type="text" placeholder="例如 : test@greenspider.cn" />
                </span>
            </p>
        </div>
        <div>
            <span>&nbsp;</span>
            <p>
                <span>
		            <input type="button" id="js-re-add" value="   添  加   " class="pxui-light-button"/>
		        </span>
            </p>
        </div>
    </form>
    <input type="button" id="js-choice" value="   去 支 付   " class="pxui-light-button" style="width:100%;-webkit-appearance: none;"/>
</div>

<!--content-end-->
<script>
    $("#add-new").toggle(function() {
        $("#js-add-re").slideDown();
    },function(){
        $("#js-add-re").slideUp();
    });


    $("#js-re-add").click(function(){
        var receivepeople = $(this).parent().parent().parent().parent().find(":input[name=receivepeople]").val();
        var receiveaddr = $(this).parent().parent().parent().parent().find(":input[name=receiveaddr]").val();
        var receivetel = $(this).parent().parent().parent().parent().find(":input[name=receivetel]").val();
        var email = $(this).parent().parent().parent().parent().find(":input[name=email]").val();
        var postcode = $(this).parent().parent().parent().parent().find(":input[name=postcode]").val();

        var data = {
            "receivepeople":receivepeople,
            "receiveaddr":receiveaddr,
            "receivetel":receivetel,
            "email":email,
            "postcode":postcode
        };

        $.post("<?php echo $this->createUrl('receive/create') ?>",data,function(data){
            if(data.errno == 0){
                $(":radio").attr('checked',false);
                $("#js-add-re").slideUp();
                alert(data.errmsg);
                //var receive = '<li><input type="checkbox" name="receiveid" id="r-'+data.data.id+'" value="'+data.data.id+'" checked="checked"><label for="r-'+data.data.id+'">'+data.data.receivepeople+' '+data.data.receiveaddr+' '+data.data.postcode+' '+data.data.receivetel+'</label></li>';
                //$("#receives").prepend(receive);
                window.location.reload();
            }else{
                alert(data.errmsg);
            }
        },'json');

    });


    $("#js-choice").click(function(e){

        var re = $(":input[name=receiveid][checked=true]").length;
        var pt = $(":input[name=paytypeid][checked=true]").length;
        var ex = $(":input[name=expresstypeid][checked=true]").length;
        try{
            if(re == 0){
                throw '请选择联系人';
            }
            if(pt == 0){
                throw '请选择支付方式';
            }
            if(ex == 0){
                throw '请选择快递方式';
            }
        }catch(e){
            alert(e);
            return false;
        }
        $(this).val('支付中...').attr('disabled',true);
        var receiveid       =   $(":input[name=receiveid][checked=true]").val();
        var paytypeid       =   $(":input[name=paytypeid][checked=true]").val();
        var expresstypeid   =   $(":input[name=expresstypeid][checked=true]").val();

        postData = {
            "receiveid"         :   receiveid,
            "paytypeid"         :   paytypeid,
            "expresstypeid"     :   expresstypeid
        };
        
        $.post("<?php echo $this->createUrl('order/create') ?>",postData,function(d){
            if(d.errno == 0){
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
        },'json');
    });

</script>
