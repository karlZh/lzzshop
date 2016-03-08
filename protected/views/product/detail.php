<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:27
 */
?>
<!--content-->
<div class="page-role good-page">
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/good/index.css" />
<script>
    /*是否下线*/
    var isDown = false;
</script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/com/jquery.touchslider.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/good/index.js"></script>
<script>
    jQuery(function($) {
        $(".touchslider").touchSlider({mouseTouch: true, autoplay: true});
    });
</script>

<div class="page-title"><a class="return" href="javascript:history.back();void(0)">返 回</a>商品详情</div>
<div class="pxui-area">
<h1>
    <?php echo $product->title ?>
</h1>


<div class="touchslider">
    <div class="touchslider-viewport" style="height:280px;overflow:hidden"><div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="<?php echo Yii::app()->request->baseUrl .'/assets/uploads/products/'.$product->id .'/'.  $product->cover ?>"/></span></a></div>
            <!--<div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-r_thumb_320320.jpg"/></span></a></div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-f_thumb_320320.jpg"/></span></a></div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-b_thumb_320320.jpg"/></span></a></div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-t_thumb_320320.jpg"/></span></a></div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-l_thumb_320320.jpg"/></span></a></div>
            <div class="touchslider-item"><a><span class="img320"><dfn></dfn><img src="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-d_thumb_320320.jpg"/></span></a></div>-->
        </div></div>

    <div class="touchslider-navtag">
        <a class="touchslider-prev"></a>
        <span class="touchslider-nav-item touchslider-nav-item-current"></span>

        <!--<span class="touchslider-nav-item "></span>

        <span class="touchslider-nav-item "></span>

        <span class="touchslider-nav-item "></span>

        <span class="touchslider-nav-item "></span>

        <span class="touchslider-nav-item "></span>

        <span class="touchslider-nav-item "></span>-->

        <a class="touchslider-next"></a>
    </div>
</div>
<!--<div class="pxui-list" data-model="radio">
    <a>【踏青一站购】361°满99减10、199减20、299减30<i class="arrow-right"></i></a>
    <div class="pxui-list-con" style="display:none;">-->
        <!--  <strong>【踏青一站购】361°满99减10、199减20、299减30</strong><br/>-->
    <!--2014-04-08 09:40  到 2014-04-20 23:59<br/> -->
    <!--<strong>·</strong> 满<b>99元</b>,减<b>10元</b><br><strong>·</strong> 满<b>199元</b>,减<b>20元</b><br><strong>·</strong> 满<b>299元</b>,减<b>30元</b><br>-->
        <!--  -->
    <!--</div>
    <div style="clear:both;height:4px;margin: 0;padding: 0px; width:100%;"></div>
</div>-->
<form action="<?php echo $this->createUrl('cart/add') ?>" method="post">
    <input type="hidden" name="productid" value="<?php echo $product->id ?>">
    <input type="hidden" name="price" value="<?php echo $product->price ?>">
<a class="pxui-gray-button" href="<?php echo $this->createUrl('product/picdetail',array('productid'=>$product->id)) ?>">点击查看图文详情&nbsp;&nbsp;<i class="arrow-right"></i></a>

<ul class="goodinfo" id="js-goodinfo">
    <li>
        <b name="detail_mao" id="detail_mao">蜘 蛛 价:</b><div><p><strong class="pxui-color-red">￥<?php echo $product->price ?></strong> <del class="pxui-color-gray"><?php echo $product->originalprice ?></del></p></div>
    </li>
    <!--<li>
        <b>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费:</b>
        <div>
            <p>
                <span>免运费 ,支持货到付款</span>
            </p>
        </div>
    </li>-->
    <li>
        <b>服&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务:</b>
        <div>
            <p>
                由绿蜘蛛销售并提供售后服务。                    </p>
        </div>
    </li>
    <!--<li>
        <b>颜&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色:</b>
        <div><p>


                <a href="#detail_mao" title="白/浅粉" class="img40 selected"><img src="http://img-cdn2.paixie.net/images/empty.gif" truesrc="http://img12.paixie.net/361sport/201204/06/paixienet-445113-20120406-090933-p_thumb_8080.jpg"  title="白/浅粉" /></a>

                <a href="shoe-361sport-8216614-459538.html#detail_mao" title="浅蓝/浅红" class="img40"><img src="http://img-cdn2.paixie.net/images/empty.gif" truesrc="http://img12.paixie.net/361sport/201204/06/paixienet-445112-20120406-090933-p_thumb_8080.jpg" title="浅蓝/浅红" /></a>

                <a href="shoe-361sport-8216614-459539.html#detail_mao" title="深粉/蓝" class="img40"><img src="http://img-cdn2.paixie.net/images/empty.gif" truesrc="http://img12.paixie.net/361sport/201204/06/paixienet-445111-20120406-090933-p_thumb_8080.jpg" title="深粉/蓝" /></a>

            </p></div>
    </li>-->
    <!--size-message-->
    <!--<li>
        <b>尺&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</b>
        <div>
            <p class="sizes">

                <a stock="28" value="36_550" >
                    36

                </a>

                <a stock="27" value="38_554" >
                    38

                </a>

            </p>
        </div>
    </li>-->
    <li >
        <b style="line-height:39px;">数&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;量:</b>
        <div><p>
                        <span class="pxui-select num">
                            <span>1</span>
                            <i></i>
                            <select name="num">
                                <?php if($product->inventory>10){$max=10;}else{$max=$product->inventory;} ?>
                                <?php for($i=1;$i<=$max;$i++ ): ?>
                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </span>
                <span class="pxui-color-red">（库存<span class="js-stock"><?php echo $product->inventory ?></span>件）</span>
            </p></div>
    </li>
    <!--size-message-end-->
</ul>
<input type="submit" class="pxui-light-button" value="加入购物车" style="-webkit-appearance: none;" />
</form>
<h3 id="js-attrs-title">商品属性</h3>
<ul class="attrs">
    <li>货号：<?php echo $product->id ?></li>
    <li>品牌：<?php echo $product->brandname ?></li>
    <?php foreach($properties as $property): ?>
        <li><?php echo $property->propertyname ?>：<?php echo str_replace(",","/",unserialize($property->value)) ?></li>
    <?php endforeach; ?>

    <li>&nbsp;</li>
    <li><a class="a" id="js-show-all-attrs">查看完整属性</a></li>
</ul>
<!--<h3>尺码对照表</h3>
<div></div>
<a class="pxui-gray-button" id="js-show-size">点击查看&nbsp;&nbsp;<i class="arrow-right"></i></a>-->
<h3>服务承诺<a href="#">返回顶部<i class="arrow2-top"></i></a></h3>
<ul class="services">
    <li><i></i> 正品保证 假一赔十</li>
    <li><i></i> 15天无理由免邮退换货</li>
    <li><i></i> 10天保值 差价返还</li>

    <li><i></i> 自营商品满 99 包邮</li>
    <li><i></i> 货到付款 全国范围</li>
</ul>
<!--<h3>用户评论<a href="#">返回顶部<i class="arrow2-top"></i></a></h3>
<div id="js-comment-list" style="display:none;">
    <div class="comment-info">
        <div><p>综合满意指数：<br>&nbsp;&nbsp;&nbsp;&nbsp;<b class="pxui-color-red">4.6</b> 分</p><span>评论人数：<br>&nbsp;&nbsp;&nbsp;&nbsp;206人</span></div>
        &nbsp;大家认为：
        <ul>
            <li>
                <b>尺&nbsp;&nbsp;&nbsp;&nbsp;码</b>
                <p>合适：<i><del style="width:100%"></del></i><span>100%</span></p>
                <p>偏大：<i><del style="width:0%"></del></i><span>0%</span></p>
                <p>偏小：<i><del style="width:0%;"></del></i><span>0%</span></p>
            </li>
        </ul>
    </div>
    <ul class="comment-list" id="js-commentlist"></ul>
    <div class="pxui-show-more" lastid="1" template="#js-good-comment" srcProperty="commentsrc" container="#js-commentlist" url="/comment/ajax?good_id=445111&item_id=459537">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24">
        <a>查看更多 <i class="arrow2-bottom"></i></a>
    </div>
</div>

<a id="js-show-comment" class="pxui-blue-button">点击查看&nbsp;&nbsp;<i class="arrow-right"></i></a>
<input value="加入收藏" class="pxui-gray-button" id="js-go-favorites" type="button"/>-->
    <!--<div class="fixed-add-to-cart" id="js-fixed-add-to-cart">
        <div>
            &nbsp;
                <!--<span class="pxui-select" id="js-sizes-select">
                        <span>请选择</span>
                        <i></i>
                        <select>
                            <option value="">请选择</option>

                            <option stock="28" value="36_550" >
                                36

                            </option>

                            <option stock="27" value="38_554" >
                                38

                            </option>

                        </select>
                    </span>-->
                <!--<span >
                    <span class="pxui-select num">
                        <span>0</span>
                        <i></i>
                        <select>
                            <option value="0">0</option>
                        </select>
                    </span>
                </span>
        <input type="button" class="pxui-light-button addtocart" value="立即结算"/>
    </div>
</div>-->
</div>
</div>

<!--content-end-->