<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/29
 * Time: 14:41
 */

class Constants {
    const ERROR_OK          =   0;
    const ERROR_PARAMS      =   -1;
    const ERROR_INSERT      =   -2;
    const ERROR_SELECT      =   -3;
    const ERROR_UPDATE      =   -4;
    const ERROR_DELETE      =   -5;
    const ERROR_ADMIN_LOGIN =   -6;

    const ERROR_LOGIN       =   -50;
    const ERROR_CART_ADD    =   -51;
    const ERROR_CART_DEL    =   -52;

    const ERROR_ORDER_CREATE = -53;
    const ERROR_ORDER_CLOSED = -53;

    public static $errMsg = array(
        self::ERROR_OK          =>  'success',
        self::ERROR_PARAMS      =>  '参数错误，请核实',
        self::ERROR_INSERT      =>  '数据添加错误',
        self::ERROR_DELETE      =>  '数据删除错误',
        self::ERROR_SELECT      =>  '数据查询错误',
        self::ERROR_UPDATE      =>  '数据更新错误',
        self::ERROR_ADMIN_LOGIN =>  '后台登录错误',
        self::ERROR_LOGIN       =>  '前台登录错误',
        self::ERROR_CART_ADD    =>  '购物车添加失败',
        self::ERROR_CART_DEL    =>  '购物车删除失败',
        self::ERROR_ORDER_CREATE=>  '订单创建失败',
        self::ERROR_ORDER_CLOSED=>  '订单取消失败',
    );

    public static $orderStatus = array(
        'submit'    =>  100,
        'paysuc'    =>  101,
        'payerr'    =>  102,
        'outing'    =>  200,
        'received'  =>  202,
        'evaluate'  =>  210,
        'cancel'    =>  400,
        'nocancel'  =>  401,
        'canceling' =>  402,
        'canceled'  =>  403,
        'refunding' =>  404,
        'refunded'  =>  405,
        'closed'    =>  406,
    );

    public static $step = array(
        100    =>  '待付款',
        101    =>  '等待发货',
        102    =>  '待付款',
        200    =>  '已发货',
        202    =>  '已收货',
        210    =>  '已评价',
        400    =>  '申请退货',
        401    =>  '拒绝退货',
        402    =>  '退货中',
        403    =>  '退货完成',
        404    =>  '退款中',
        405    =>  '已退款',
        406    =>  '交易关闭',
    );

    public static $express = array(
        1    =>  '顺丰快递',
    );

}