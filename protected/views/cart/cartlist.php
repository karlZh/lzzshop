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
    <div class="page-title"><a href="javascript:history.back();void(0)" class="return">返 回</a>购物车
        <a id="js-all">全选<i></i></a>
    </div>
    <form id="js-form" action="<?php echo $this->createUrl('receive/index') ?>" method="post">
        <div class="pxui-area goodlist">
            <?php
                if(empty($cart)):
            ?>
            <div class="pxui-area goodlist">
                <div style="text-align:center;padding: 50px 0;font-size: 16px;">您当前购物车空荡荡的，赶快去添加吧！
                    <br/>
                    <a href="<?php echo $this->createUrl('index/index') ?>">返回首页</a>
                </div>
            </div>
            <?php
                else:
            ?>
            <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/tuan/tuan.css"/>
            <div class="page-role">
            <?php
                foreach($cart as $pro):
            ?>
<div class="tuan-list" style="position:relative;height:140px">
    <div class="img120" style="margin-left:30px">
        <a href=""><dfn></dfn><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/products/<?php echo $pro['id'].'/'.$pro['cover'] ?>"/>
        </a>
    </div>
    <a href="" class="title" style="height:auto;padding-top: 18px;">商品名称：&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $pro['title'] ?></a>
    <p style="height:30px;margin-top:5px">
        <span class="pxui-color-grey">商品单价：</span>
        <span class="pxui-color-red">&nbsp;<span><?php echo $pro['price'] ?></span> 元</span>
    </p>
    <p style="height:30px">
        <span class="pxui-color-grey">购买数量：</span>
        <input type="number" name="cart[<?php echo $pro['id'] ?>][num]" class="num" style="width:40px;height:20px;font-size:13px;padding:0;padding-left: 10px" value="<?php echo $pro['num'] ?>" disabled=true>
        <span class="pxui-color-red" id="total"><span class="pt"><?php echo sprintf("%.2f",$pro['amount']) ?></span>元</span>
    </p>
    <div class="close" data-value="<?php echo $pro['id'] ?>" style="font-size:20px;position:absolute;right:5px;top:2px;color:white;border-color:grey;background-color:#fb4e3a;width:22px;height:22px;line-height:19px;text-align:center;-webkit-transform:rotate(45deg);
-moz-transform:rotate(45deg);
transform:rotate(45deg);-moz-border-radius: 15px;-webkit-border-radius: 15px;border-radius:15px;">
        +
    </div>
    <div class="check" data-value="<?php echo $pro['id'] ?>" style="position:absolute;left:5px;top:6px;">
        <input type="checkbox" class="chk" value="<?php echo $pro['id'] ?>" style="width:15px;height:15px">
        <input type="hidden" name="cart[<?php echo $pro['id'] ?>][productid]" value="<?php echo $pro['id'] ?>" disabled=true>
        <input type="hidden" name="cart[<?php echo $pro['id'] ?>][price]" value="<?php echo $pro['price'] ?>" disabled=true>
    </div>
</div>
            <?php
                    endforeach;
            ?>
                <div class="pxui-color-red" style="text-align:right;margin-right:10px">
                    共计 : <span id="ptotal"><?php echo $amount ?></span>元
                    <input type="submit" value="去结算" />
                </div>

                </div>
            <?php
                endif;
            ?>
    </form>
</div>
<!--content-end-->
<script>
    $(".num").change(function(){
        if($(this).val()<1){
            $(this).val("1");
        }
        var price = parseFloat($(this).parent().prev("p").find("span").eq(1).find("span").html());
        var total = parseInt($(this).val())*price;
        $(this).next("span").find("span").html(parseFloat(total).toFixed(2));
        var amount = 0.00;
        $(".pt").each(function(i){
            amount += parseFloat($(".pt").eq(i).html());
        });
        $("#ptotal").html(amount.toFixed(2));
    });

    $(".close").mouseenter(function(){
        $(this).css('backgroundColor','#bbb');
    }).mouseleave(function(){
        $(this).css('backgroundColor','#ddd');
    }).click(function(){
        var id = $(this).attr('data-value');
        $.get('<?php echo $this->createUrl('cart/del') ?>',{'id':id},function(data){
            if(data.errno == 0){
                if(data.data.length==0){
                    var html = '<div class="pxui-area goodlist"><div style="text-align:center;padding: 50px 0;font-size: 16px;">您当前购物车空荡荡的，赶快去添加吧！<br/><a href="<?php echo $this->createUrl('index/index') ?>">返回首页</a></div></div>';
                    $(".pxui-area.goodlist").html(html);
                    return ;
                }
                $(".close[data-value="+id+"]").parent().remove();
                var amount = 0.00;
                $(".pt").each(function(i){
                    amount += parseFloat($(".pt").eq(i).html());
                });
                $("#ptotal").html(amount.toFixed(2));
            }else{
                alert(data.errmsg);
            }
        },'json');
    });

    $("#js-all").click(function(){
        $(".chk").each(function(i){
            $(".chk").eq(i).next('input').attr('disabled',false);
            $(".chk").eq(i).next('input').next('input').attr('disabled',false);
            $(".chk").eq(i).parent().prev().prev().find('input').attr('disabled',false);
        });
    });

    $(".chk").click(function(){
        $(this).next('input').attr('disabled',false);
        $(this).next('input').next('input').attr('disabled',false);
        $(this).parent().prev().prev().find('input').attr('disabled',false);
    });

    $(".chk").each(function(i){
        if($(".chk").eq(i).attr('checked')) {
            $(".chk").eq(i).next('input').attr('disabled', false);
            $(".chk").eq(i).next('input').next('input').attr('disabled', false);
            $(".chk").eq(i).parent().prev().prev().find('input').attr('disabled', false);
        }
    });
</script>