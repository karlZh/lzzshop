<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 17:07
 */
?>

<!--content-->
<div class="page-role style-page">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/list/style.css"/>
    <div class="pxui-area">
        <div class="pxui-tab pxui-tab-nav pxui-tab-no-top">
            <a href="<?php echo $this->createUrl('index/index') ?>" ><i></i>首页<span></span></a>
            <a href="<?php echo $this->createUrl('category/index') ?>" class="selected"><i></i>分类<span></span></a>
            <a href="<?php echo $this->createUrl('brand/index') ?>"><i></i>品牌<span></span></a>
            <!--<a href="../tuan/default.htm"><i></i>团购<span></span></a>-->
        </div>
        <div class="pxui-list">
            <?php foreach($cates as $cate): ?>
            <a href="<?php echo $this->createUrl('product/list',array('categoryid'=>$cate->id)) ?>">
                <span></span>
                <b><?php echo $cate->name ?></b>
                <i class="arrow-right"></i>
            </a>
            <p>
                <?php foreach($cate->sons as $son): ?>
                <a href="<?php echo $this->createUrl('product/list',array('categoryid'=>$son->id)) ?>"><?php echo $son->name ?></a>&nbsp;
                <?php endforeach; ?>
            </p>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!--content-end-->
