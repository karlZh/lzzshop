<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:25
 */
?>
<!--content-->
<div class="page-role">
<div class="page-title">
    <a href="javascript:history.back();void(0)" class="return">返 回</a>
    运动鞋
    <a href="">高级筛选<i></i></a>	</div>
<div class="pxui-tab" style="margin-bottom:10px;">
    <a href=""  class="selected"   >推  荐</a>
    <a href=""  >
        价 格
        <i class="arrow2-top gray"></i>
        <i class="arrow2-bottom gray"></i>
    </a>
    <a href=""  >销 量</a>
    <a href=""  >最 新</a>
</div>
<div class="pxui-area">
<div class="pxui-shoes">
    <div id="js-goodlist">
        <?php foreach($products as $product): ?>
        <a href="<?php echo $this->createUrl('product/detail',array('productid'=>$product->id)) ?>">
            <div class="img160"><dfn></dfn><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/products/<?php echo $product->id ?>/<?php echo $product->cover ?>"/></div>
            <span class="name"><?php echo $product->title ?></span>
            <span class="price">￥<?php echo $product->price ?></span>
            <del class="price">￥<?php echo $product->originalprice ?></del>
            <img class="tag" style=""src="" goodsrc=""/>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="pxui-pages">
    <span style="<?php if($pagenum>1) echo 'display:none'; ?>"><i class="arrow-left"></i>&nbsp;&nbsp;上一页</span>
    <a style="<?php if($pagenum<=1) echo 'display:none'; ?>" href="<?php echo $this->createUrl('product/list',array('categoryid'=>$cid,'page'=>$prev)); ?>"><i class="arrow-left"></i>&nbsp;&nbsp;上一页</a>
<div class="pxui-select"><span><?php echo $pagenum ?>/<?php echo $total ?></span><del class="arrow-bottom"></del>
<select id="page">
<?php for($i=1;$i<=$total;$i++): ?>
    <option value="<?php echo $i ?>"><?php echo $i ?>/<?php echo $total ?></option>
<?php endfor; ?>
</select>
</div>
<a style="<?php if($pagenum>=$total) echo 'display:none'; ?>" href="<?php echo $this->createUrl('product/list',array('categoryid'=>$cid,'page'=>$next)); ?>">下一页&nbsp;&nbsp;<i class="arrow-right"></i></a>
<span style="<?php if($pagenum<$total) echo 'display:none'; ?>">下一页&nbsp;&nbsp;<i class="arrow-right"></i></span>
</div>
</div>
</div>
<!--content-end-->
<script>
    $("#page").change(function(){
        window.location.href='<?php echo $this->createUrl('product/list',array('categoryid'=>$cid)); ?>&page='+$(this).val();
    });
</script>