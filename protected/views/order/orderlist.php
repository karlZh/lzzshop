<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/10/29
 * Time: 0:02
 */
?>
<!--content-->
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/tuan/tuan.css"/>
<div class="page-role">
<div class="page-title"><a class="return" href="javascript:history.back();void(0)">返 回</a>我的订单</div>
    <?php foreach($orderlist as $order): ?>
    <div class="pxui-tab" style="padding:0 15px;margin-bottom: 2px;border:none;border-radius:0">
        <div style="float:left" class="orderno"><span>▼</span> 订单号：<?php echo $order->id ?></div>
        <div style="float:right"><?php echo $order->step; ?></div>
    </div>
    <div class="js-goodlist">
        <?php foreach($order->products as $product): ?>
        <div class="tuan-list" style="margin-bottom: 0px">
            <div class="img120">
                <a href=""><dfn></dfn><img src="<?php echo Yii::app()->request->baseUrl .'/assets/uploads/products/'.$product['productId'].'/'.$product['productPic'] ?>"/>
                </a>
            </div>
            <a href=""  class="title"><?php echo $product['productName'] ?></a>
            <p>
                <span class="pxui-color-red">￥<?php echo $product['productPrice'] ?> 元</span>
                <span class="pxui-color-yellow"><span class="red"><?php echo $product['productNum'] ?></span>件</span>
            </p>
        </div>
        <?php endforeach; ?>

        <div style="height:45px;background:white;text-align:right">
            <?php if($order->status == 100 || $order->status == 102): ?>
                <input type="button" value="去支付" data-value="<?php echo $order->id ?>" class="topay" style="height:30px;line-height:10px;"/>
            <?php endif; ?>
            <?php if($order->status >= 100 && $order->status < 200): ?>
                <input type="button" value="取消订单" data-value="<?php echo $order->id ?>" class="closed" style="height:30px;line-height:10px;"/>
            <?php endif; ?>
            <?php if(($order->status >= 100 && $order->status < 102)||($order->status >= 405 && $order->status <= 406)): ?>
                <input type="button" value="删除订单" data-value="<?php echo $order->id ?>" class="delete" style="height:30px;line-height:10px;"/>
            <?php endif; ?>
            <?php if($order->status == 200): ?>
                <input type="button" value="确认收货" data-value="<?php echo $order->id ?>" class="receive" style="height:30px;line-height:10px;"/>
            <?php endif; ?>
        </div>

    </div>

    <div style="height:10px"></div>
    <?php endforeach; ?>


</div>

<div class="pxui-pages" pageurl="?order=&page2=@page" pagesize="10" count="14" template="#js-goodlist-template" url="/tuan/?mode=ajax&order=" container="#js-goodlist">
    <span><i class="arrow-left"></i>&nbsp;&nbsp;上一页</span>
    <a><i class="arrow-left"></i>&nbsp;&nbsp;上一页</a>
    <div class="pxui-select">
        <span>1/1</span><del class="arrow-bottom"></del>
        <select>
            <option value="1">1/1</option>
        </select>
    </div>
    <a>下一页&nbsp;&nbsp;<i class="arrow-right"></i></a>
    <span>下一页&nbsp;&nbsp;<i class="arrow-right"></i></span>
</div>
</div>
<script>
    $(".pxui-tab").toggle(function(){
        $(this).find(".orderno").find("span").html("▲");
        $(this).next(".js-goodlist").slideUp();
    },function(){
        $(this).find(".orderno").find("span").html("▼");
        $(this).next(".js-goodlist").slideDown();
    })

    $(".topay").click(function(){
        alert('开发中，请重新下单');
    });
    $(".closed").click(function(){
//        alert('开发中，敬请期待');
        var orderid = $(this).attr('data-value');
        var data = {
            "orderid":orderid
        };

        $.post("<?php echo $this->createUrl('order/closed') ?>",data,function(data){
            if(data.errorno){
                alert(data.errmsg);
                //var receive = '<li><input type="checkbox" name="receiveid" id="r-'+data.data.id+'" value="'+data.data.id+'" checked="checked"><label for="r-'+data.data.id+'">'+data.data.receivepeople+' '+data.data.receiveaddr+' '+data.data.postcode+' '+data.data.receivetel+'</label></li>';
                //$("#receives").prepend(receive);
                window.location.reload();
            }else{
                alert(data.errmsg);
            }
        },'json');
//        var orderid = $(this).attr('data-value');
//        $.ajax({
//            type; 'post',
//            url: '<?php //echo $this -> createUrl("order/closed");?>//',
//            dataType; 'json',
//            data: {'orderid': orderid },
//            function(data){
//                alert(data.errormsg);
//            }
//        });
    });
    $(".delete").click(function(){
        alert('开发中,敬请期待');
    });
    $(".receive").click(function(){alert('您确认收到货物了吗？');});

</script>
<!--content-end-->