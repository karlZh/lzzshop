<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/21
 * Time: 9:55
 */
?>
<!doctype html>
<html>
<head>
    <title>绿蜘蛛电商平台</title>
    <meta charset="utf-8">
    <meta name="keywords" content="绿蜘蛛电商平台" />
    <meta name="description" content="绿蜘蛛电商平台" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <meta content="width=device-width, minimum-scale=1,initial-scale=1, maximum-scale=1, user-scalable=1;" id="viewport" name="viewport" />
    <!--离线应用的另一个技巧-->
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <!--指定的iphone中safari顶端的状态条的样式-->
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <!--告诉设备忽略将页面中的数字识别为电话号码-->
    <meta content="telephone=no" name="format-detection" />
    <!--设置开始页面图片-->
    <!--<link rel="/touch/apple-touch-startup-image" href="startup.png" />-->
    <!--在设置书签的时候可以显示好看的图标-->
    <!--<link rel="apple-touch-icon" href="/touch/iphon_tetris_icon.png"/>-->
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/com/com.css"/>
    <script>
        var PX_HELP_DATA=['','uo74au74aqpc8801g3htt5l2v7',['touch','home','index'],'2014/04/09 09:12:46',0,false]; var DOMIN = {MAIN:"../m.greenspider.com/",HELP:"../help.greenspider.net/",TUAN:"../tuan.greenspider.net/",WAP:"../wap.greenspider.net/",UNION:"../union.greenspider.net/",VIPSHOP:"../v.greenspider.net/"};
    </script>

    <script>

        var JAVASCRIPT_LIB = (('\v' !== 'v') ? 'zepto' : 'jquery');
        JAVASCRIPT_LIB="jquery";
        document.write('<script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/public/jquery.js"><\/script>');


        DOMIN.MAIN = './';
        // uc浏览器添加书签功能
        window.onmessage = function(event){
            if(event.data.message != '')
            {
                $('#otherPage').remove();
            }else{
                $('#otherPage').show();
            }
        }
    </script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/com/com.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/login/verify.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/com/template.js"></script>
    <!--<script src="/<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/com/jquery.snow.min.js"></script>
    <script>
    $(document).ready( function(){
        $.fn.snow({
            minSize: 5,
            maxSize: 50,
            newOn: 1000
        });
    });
    </script>-->
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/cart/index.js"></script>
</head>
<body>

<div class="com-content">
    <script>

        function open_notice(id){
            setCookie('touch_notice_close',1);
            var url = 'new/info/'+id+'.html';
            window.location.href=url;
        }

        var touch_notice_close = getCookie('touch_notice_close');
        if(touch_notice_close == '1' && typeof(document.getElementById('js-com-notification2')) != 'undefined' && document.getElementById('js-com-notification2') != null){
            document.getElementById('js-com-notification2').style.display = 'none';
        }
        //if( document.cookie.match(new RegExp("(^| )PHPSESSID=([^;]*)(;|$)")) ){
        //  document.getElementById('js-com-notification').style.display = 'none';
        //	}
    </script>
    <div class="com-header-area" id="js-com-header-area">
        <!--<a href="" class="com-header-logo">123123</a>-->
        <a href="" style="line-height:45px;margin-left:15px;color:white;font-weight:bold;font-size:15px;">绿蜘蛛电商平台</a>
        <dfn></dfn>
        <p>
            <a class="com-header-search" id="js-com-header-search"><del></del></a>
            <a href="<?php echo $this->createUrl('member/index') ?>" class="com-header-user "><del></del></a>
            <i></i>
            <a href="<?php echo $this->createUrl('cart/index') ?>" class="com-header-cart "><b id="header-cart-num">0</b><del></del></a>
        </p>
        <div class="clear"></div>
        <form action="" method="post">
            <strong>
                <input type="text" name="keyword" id="js-com-search-text" value=""/>
                <input type="submit" value=" "/>
            </strong>
            <div id="js-com-search-recommend">
                <div></div>
                <a href=""  style="color:#000000">女单鞋</a>
                <a href=""  style="color:#ed1749">运动新品</a>
                <a href=""  style="color:#000000">篮球鞋</a>
            </div>
        </form>
    </div>
    <div class="com-content-area" id="js-com-content-area">
<?php echo $content ?>
    </div>
    <div class="com-footer-area" id="js-com-footer-area">
        <div class="com-footer-nav">
            <a href="">首页</a><a href="">帮助中心</a><a href="">反馈建议</a>
        </div>
        <div class="com-footer">
            <p class="com-policy">
                <strong>
                    <a class="pxui-color-white" href="javascript:void(0)">
                        <i></i>
							<span>自营商品<br/>
							满99包邮</span>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="pxui-color-white" href="javascript:void(0)">
                        <i style="background-position:-40px -108px;"></i>
							<span>15天无理由<br/>
							免邮退换货</span>
                    </a>
                </strong>
            </p>
            <br/>
            <br/>
            <p>
                <strong>
                    <a style="color:#769fbf;" href="">登录</a>&nbsp;&nbsp;
                    <a style="color:#769fbf;" href="">注册</a>
                </strong>
            </p>
            <br/>
            <p>
                <strong>
                    <a href="">极速版</a>&nbsp;&nbsp;
                    <a href="">触屏版</a>&nbsp;&nbsp;
                    <a href="">客户端</a>
                </strong>
            </p>
            <br/>
            © 2015 绿蜘蛛 All Rights Reserved<br/>
            京B2-20110084
            <br />
            <!--<p style="text-align: left;border-bottom:none;display:table-cell; padding-left: 10px; padding-right: 10px;">友情链接：
                <a href=''>网址导航 </a>
                <a href='../m.soufun.com/esf/hz.html@sf_source=wapzu_hz_paixie'>搜房</a>
                <a href='../wapzk.net/@ff=1513897'>掌酷门户</a>
                <a href='../123hw.com/default.htm'>123好网址</a>
            </p>-->
        </div>
    </div>
</div>
<script type="text/tcl" id="js-good-template">
<a href="<%=data.link;%>">
	<div class="img160"><dfn></dfn><img src="http://img-cdn2.paixie.net/images/empty.gif" goodsrc="<%=data.img;%>"/></div>
	<span class="name"><%=data.name;%></span>
	<span class="price">￥<%=data.price;%></span>
	<del class="price">￥<%=data.oldprice;%></del>
	<%if(data.tag){%>
	<img class="tag" src="http://img-cdn2.paixie.net/images/empty.gif" truesrc="<%=data.tag;%>"/>
	<%}%>
</a>
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/public/analytics.js','ga');

    ga('create', 'UA-45921315-2', 'greenspider.cn');
    ga('send', 'pageview');
    getCartNums('<?php echo $this->createUrl('cart/getnum') ?>');
</script>
</body>
</html>