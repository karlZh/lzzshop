<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/20
 * Time: 22:55
 */
?>

<!--content-->
<div class="page-role">
    <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/home/css/member/index.css"/>
    <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/home/js/member/index.js"></script>
    <div class="page-title"><a class="return" href="javascript:history.back();void(0)">返 回</a>我的拍鞋网<a href="<?php echo $this->createUrl("member/logout") ?>">退出登录<i></i></a></div>
    <div class="member">
        <h2><span class="pxui-color-red">
                                                        13688180214
                                        </span>会员您好！</h2>
        <div class="level"><p>拍鞋币：<span class="pxui-color-yellow">0</span></p>
            等级：<b style="background:#bebebe ">VIP0</b></div>
        <p>当前成长值</p>
        <div class="area-process">
            <span><i class="vip0"></i>0</span>
            <div class="process">
                <div class="bar" title="0">
                    <p>
                        <em style="width:0%;"></em>
                        <i>0</i>
                    </p>
                </div>
            </div>
            <span class="right"><i class="vip1"></i>500</span>
        </div>
    </div>
    <div data-model="radio" class="pxui-list">
        <a href="/member/order?pay=2">我的订单<i class="arrow-right"></i><b>您当前有<span class="pxui-color-yellow">0</span>个订单尚未完成</b></a>
        <a href="/member/comments">我的评论<i class="arrow-right"></i><b>您当前可对<span class="pxui-color-yellow">0</span>个订单进行评论</b></a>
        <a href="/member/coupon">我的优惠券<i class="arrow-right"></i></a>
        <a href="/member/favorites">我的收藏<i class="arrow-right"></i></a>
        <a href="/member/history">我的浏览记录<i class="arrow-right"></i></a>
        <a href="/member/address?act=index">收货地址管理<i class="arrow-right"></i></a>
        <a href="/member/password">修改密码<i class="arrow-right"></i></a>
        <a href="/about/">关于拍鞋网<i class="arrow-right"></i></a>
    </div>
</div>
<!--content-end-->
