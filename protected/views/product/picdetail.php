<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:29
 */
?>
<!--content-->
<div class="page-role good-page">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/good/index.css" />
    <div class="page-title"><a class="return" href="javascript:history.back();void(0)">返 回</a>图文详情</div>
    <div class="pxui-area pxui-imgshow" id="js-imgshow">
        <?php echo $product->describe; ?>
    </div>
</div>
<!--content-end-->