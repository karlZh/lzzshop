<?php
    /*
     * 前台首页模板
     * @author lamplijie<www.lamplijie.com>
     * @date 2015-9-10
     * @time 10:30
     * @since v1.0
     */
?>
<!--content-->
<script type="text/javascript">
    $(function(){
        $('.pxui-show-more').first().find('a').click();
        $('.pxui-show-more').last().find('a').click();
    });
</script>
<div class="page-role home-page">
<link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/home/index.css"/>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/com/jquery.touchslider.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/home/index.js"></script>
    <!--
<script>
    jQuery(function($) {
        $(window).resize(function(){
            var width=$('#js-com-header-area').width();
            $('.touchslider-item a').css('width',width);
            $('.touchslider-viewport').css('height',300*(width/640));
        }).resize();
        $(".touchslider").touchSlider({mouseTouch: true, autoplay: true});
    });
</script>

<div class="touchslider">
    <div class="touchslider-viewport">
        <div class="touchslider-item"><a href="topic/739.html"><img src="http://img-cdn2.paixie.net/newspic/20140408/1396940354243f5b.jpg" style="vertical-align:top;"/></a></div>
        <div class="touchslider-item"><a href="topic/730.html"><img src="http://img-cdn2.paixie.net/newspic/20140328/1395970986accb4f.jpg" style="vertical-align:top;"/></a></div>
        <div class="touchslider-item"><a href="topic/725.html"><img src="http://img-cdn2.paixie.net/newspic/20140331/1396235117d367d2.jpg" style="vertical-align:top;"/></a></div>
        <div class="touchslider-item"><a href="topic/733.html"><img src="http://img-cdn2.paixie.net/newspic/20140401/13963430797a3567.jpg" style="vertical-align:top;"/></a></div>
        <div class="touchslider-item"><a href="topic/731.html"><img src="http://img-cdn2.paixie.net/newspic/20140404/139657373135668e.jpg" style="vertical-align:top;"/></a></div>
        <div class="touchslider-item"><a href="topic/732.html"><img src="http://img-cdn2.paixie.net/newspic/20140331/13962355233033ac.jpg" style="vertical-align:top;"/></a></div>
    </div>
    <div class="touchslider-navtag">
        <span class="touchslider-nav-item touchslider-nav-item-current"></span>
        <span class="touchslider-nav-item "></span>
        <span class="touchslider-nav-item "></span>
        <span class="touchslider-nav-item "></span>
        <span class="touchslider-nav-item "></span>
        <span class="touchslider-nav-item "></span>
    </div>
</div>
-->
<div class="pxui-tab pxui-tab-nav pxui-tab-no-top" style="margin-top:15px">
    <a href="<?php echo $this->createUrl('index/index') ?>" class="selected"><i></i>首页<span></span></a>
    <a href="<?php echo $this->createUrl('category/index') ?>"><i></i>分类<span></span></a>
    <a href="<?php echo $this->createUrl('brand/index') ?>"><i></i>品牌<span></span></a>
    <!--<a href="tuan/default.htm"><i></i>团购<span></span></a>
    <a href="login/@url=_2Fmember_2Forder@pay=2"><i></i>查看物流<span></span></a>-->

</div>
<div class="tags">
    <table border="0" cellspacing="5" cellpadding="0">
        <tr>
            <td colspan="2"><a href=""><i></i>绿蜘蛛微信公众平台<br/>总能找到你的至爱</a></td>
            <td><a href=""><i></i>热销商品</a></td>
            <td rowspan="2"><a href=""><i></i>限<br/>时<br/>促<br/>销</a></td>
        </tr>
        <tr>
            <td><a href=""><b>最新</b><br/>上架</a></td>
            <td colspan="2"><a href="">绿蜘蛛微信平台<br/>你的随身好帮手<i></i></a></td>
        </tr>
    </table>
</div>
<?php
    $h2bg = array(
        '#ffaf51',
        '#ff8080',
        '#688fd0',
        '#c49741',
        '#875e78',
        '#94d15e',
    );
?>
<?php foreach($cates as $key=>$cate): ?>
<div class="pxui-area styles">
    <?php if($key%2==0): ?>
    <h2  style="background-color: <?php echo $h2bg[$key] ?> ; " ><a href=""  style="color:#FFFFFF;"  ><?php echo $cate->name ?></a></h2>
        <a class="max" href=""><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/good/1396917342e17426.jpg" width="120" height="140"/></a>
        <div>
            <p>
                <?php foreach($cate->sons as $k=>$son): ?>
                    <?php
                    $style = '';
                    if($k%2==1){
                        $style = 'color:#FFFFFF;background-color:'.$h2bg[$key].';border: 1px solid '.$h2bg[$key].';';
                    }
                    ?>
                    <a href="" style="margin-left:3px;<?php echo $style ?>" ><?php echo $son->name ?></a>
                <?php endforeach; ?>
                <a href="" class="more" >更多<del><i class="arrow-right"></i></del></a>
            </p>
        </div>
    <?php else: ?>
        <div>
            <p>
                <?php foreach($cate->sons as $k=>$son): ?>
                    <?php
                    $style = '';
                    if($k%2==1){
                        $style = 'color:#FFFFFF;background-color:'.$h2bg[$key].';border: 1px solid '.$h2bg[$key].';';
                    }
                    ?>
                    <a href="" style="margin-left:3px;<?php echo $style ?>" ><?php echo $son->name ?></a>
                <?php endforeach; ?>
                <a href="" class="more" >更多<del><i class="arrow-right"></i></del></a>
            </p>
        </div>
        <a class="max" href=""><img src="http://img-cdn2.paixie.net/newspic/20140408/1396917342e17426.jpg" width="120" height="140"/></a>
        <h2  style="background-color: <?php echo $h2bg[$key] ?> ; " ><a href=""  style="color:#FFFFFF;"  ><?php echo $cate->name ?></a></h2>
    <?php endif; ?>

</div>
<?php endforeach; ?>
<!--<div class="pxui-area">
    <h3><b>Hot</b> 爆款推荐</h3>
    <div class="pxui-tab pxui-tab-style pxui-tab-no-top" id="js-tab-style">
        <a class="selected">运动鞋</a>
        <a>女鞋</a>
        <a>户外鞋</a>
        <a>童鞋</a>
        <a>服装</a>
    </div>
    <div class="pxui-shoes" id="js-home-tab-0">
        <div>

        </div>
    </div>
    <div class="pxui-show-more" lastid="1" template="#js-bk-template" srcProperty="goodsrc" container="#js-home-tab-0 > div" url="/home/ajax?act=bk_more">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a>显示更多 <i class="arrow2-bottom"></i></a>
    </div>
    <div class="pxui-shoes" id="js-home-tab-1" style="display:none;">
        <div>
        </div>
    </div>
    <div class="pxui-show-more" style="display:none;" lastid="1" template="#js-bk-template" srcProperty="goodsrc" container="#js-home-tab-1 > div" url="/home/ajax?act=bk_more&sid=94">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a>显示更多 <i class="arrow2-bottom"></i></a>
    </div>
    <div class="pxui-shoes" id="js-home-tab-2" style="display:none;">
        <div>
        </div>
    </div>
    <div class="pxui-show-more" style="display:none;" lastid="1" template="#js-bk-template" srcProperty="goodsrc" container="#js-home-tab-2 > div"  url="/home/ajax?act=bk_more&sid=95">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a>显示更多 <i class="arrow2-bottom"></i></a>
    </div>
    <div class="pxui-shoes" id="js-home-tab-3" style="display:none;">
        <div>
        </div>
    </div>
    <div class="pxui-show-more" style="display:none;" lastid="1" template="#js-bk-template" srcProperty="goodsrc" container="#js-home-tab-3 > div"  url="/home/ajax?act=bk_more&sid=96">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a>显示更多 <i class="arrow2-bottom"></i></a>
    </div>
    <div class="pxui-shoes" id="js-home-tab-4" style="display:none;">
        <div>
        </div>
    </div>
    <div class="pxui-show-more" style="display:none;" lastid="1" template="#js-bk-template" srcProperty="goodsrc" container="#js-home-tab-4 > div"  url="/home/ajax?act=bk_more&sid=97">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a>显示更多 <i class="arrow2-bottom"></i></a>
    </div>
</div>-->

<div class="pxui-area">
    <h3><b>Top5</b> 热销推荐<a class="pxui-button" href=""><span>+</span> 更多 &gt;&gt;</a></h3>
    <div class="pxui-shoes">
        <div>
            <?php foreach($hotpics as $key=>$hotpic): ?>
            <a href="<?php echo $this->createUrl('product/detail',array('productid'=>$hotpic->id)) ?>">
                <div class="img160">
                    <dfn></dfn>
                    <img truesrc="<?php echo Yii::app()->request->baseUrl ?>/assets/uploads/products/<?php echo $hotpic->id."/".$hotpic->cover ?>" /></div>
                <span class="name"><?php echo $hotpic->title ?></span>
                <span class="price">￥<?php echo $hotpic->price ?></span>
                <del class="price">￥<?php echo $hotpic->originalprice ?></del>
                <span class="tag"><?php echo $key+1 ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="pxui-list">
        <?php foreach($hots as $key=>$hot): ?>
        <a href=""><span class="pxui-bg-blue pxui-color-white"><?php echo $key+3 ?></span><p><?php echo $hot->title ?></p><b>￥<?php echo $hot->price ?></b></a>
        <?php endforeach; ?>
    </div>
</div>


<!--<div class="pxui-area">
    <h3><b>Brand</b> 品牌推荐</h3>
    <div class="brands">
        <div id="js-brand-list">

        </div>
    </div>
    <div class="pxui-show-more" id="js-show-more-btand" lastid="1" template="#js-brand-template" srcProperty="truesrc" container="#js-brand-list" url="/home/ajax?act=brand_more">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/loading.gif" width="24" height="24"/>
        <a tourl="/brand/">显示更多<i class="arrow2-bottom"></i></a>
    </div>
</div>
</div>-->
<script type="text/tcl" id="js-bk-template">
				<a href="<%=data.link%>">
					<div class="img160"><dfn></dfn><img src="http://img-cdn2.paixie.net/images/empty.gif" goodsrc="<%=data.img%>"/></div>
					<span class="name"><%=data.title%></span>
					<span class="price">￥<%=data.price%></span>
					<del class="price">￥<%=data.market_price%></del>
                                        <%if(data.tag == ''){%>
					<img class="tag" src="http://img-cdn2.paixie.net/images/empty.gif" goodsrc="<%=data.tag%>"/>
                                        <%}%>
				</a>
</script>
<script type="text/tcl" id="js-brand-template">
    <a href="<%=data.mlink%>"><i><img src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/images/public/empty-2X1.gif" truesrc="<%=data.logo%>" alt="<%=data.alt%>" width="100" height="50"/></i></a>
</script>
<!--content-end-->