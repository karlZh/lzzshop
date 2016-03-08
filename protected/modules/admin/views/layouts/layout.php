<?php
/**
 * Created by PhpStorm.
 * User: 捷
 * Date: 2015/9/21
 * Time: 21:53
 */
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>绿蜘蛛微信电商平台 - 控制台</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />

        <link rel="icon" type="image/ico" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/favicon.ico" />
        <!-- Bootstrap -->
        <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/vendor/animate/animate.min.css">
        <link type="text/css" rel="stylesheet" media="all" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/mmenu/css/jquery.mmenu.all.css" />
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/videobackground/css/jquery.videobackground.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/vendor/bootstrap-checkbox.css">

        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/rickshaw/css/rickshaw.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/morris/css/morris.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/tabdrop/css/tabdrop.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/summernote/css/summernote.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/summernote/css/summernote-bs3.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/chosen/css/chosen.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/chosen/css/chosen-bootstrap.css">

        <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/minimal.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/html5shiv.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/animate-numbers/jquery.animateNumbers.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/videobackground/jquery.videobackground.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/blockui/jquery.blockUI.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/flot/jquery.flot.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/flot/jquery.flot.time.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/flot/jquery.flot.selection.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/flot/jquery.flot.animator.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/flot/jquery.flot.orderBars.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/easypiechart/jquery.easypiechart.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/rickshaw/raphael-min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/rickshaw/d3.v2.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/rickshaw/rickshaw.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/morris/morris.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/tabdrop/bootstrap-tabdrop.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/summernote/summernote.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/chosen/chosen.jquery.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/minimal.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/parsley/parsley.min.js"></script>

        <script src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/js/vendor/parsley/zh_cn.js"></script>

    </head>
<body class="bg-3">

    <!-- Preloader -->
    <div class="mask"><div id="loader"></div></div>
    <!--/Preloader -->

    <!-- Wrap all page content here -->
<div id="wrap">




    <!-- Make page fluid -->
    <div class="row">





    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">



        <!-- Branding -->
        <div class="navbar-header col-md-2">
            <a class="navbar-brand" href="<?php echo $this->createUrl('default/index') ?>">
                <strong>绿蜘蛛</strong>微信电商平台
            </a>
            <div class="sidebar-collapse">
                <a href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <!-- Branding end -->


        <!-- .nav-collapse -->
        <div class="navbar-collapse">

            <!-- Page refresh -->
            <ul class="nav navbar-nav refresh">
                <li class="divided">
                    <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
                </li>
            </ul>
            <!-- /Page refresh -->

            <!-- Search -->
            <div class="search" id="main-search">
                <i class="fa fa-search"></i> <input type="text" placeholder="Search...">
            </div>
            <!-- Search end -->

            <!-- Quick Actions -->
            <ul class="nav navbar-nav quick-actions">

                <li class="dropdown divided">

                    <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="label label-transparent-black">2</span>
                    </a>

                    <ul class="dropdown-menu wide arrow nopadding bordered">
                        <li><h1>You have <strong>2</strong> new tasks</h1></li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Layout</div>
                                    <div class="percent">80%</div>
                                </div>
                                <div class="progress progress-striped progress-thin">
                                    <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">40% Complete (success)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Schemes</div>
                                    <div class="percent">15%</div>
                                </div>
                                <div class="progress progress-striped active progress-thin">
                                    <div class="progress-bar progress-bar-cyan" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                                        <span class="sr-only">45% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Forms</div>
                                    <div class="percent">5%</div>
                                </div>
                                <div class="progress progress-striped progress-thin">
                                    <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                                        <span class="sr-only">5% Complete (warning)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">JavaScript</div>
                                    <div class="percent">30%</div>
                                </div>
                                <div class="progress progress-striped progress-thin">
                                    <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                                        <span class="sr-only">30% Complete (danger)</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Dropdowns</div>
                                    <div class="percent">60%</div>
                                </div>
                                <div class="progress progress-striped progress-thin">
                                    <div class="progress-bar progress-bar-amethyst" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">Check all tasks <i class="fa fa-angle-right"></i></a></li>
                    </ul>

                </li>

                <li class="dropdown divided">

                    <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>
                        <span class="label label-transparent-black">1</span>
                    </a>

                    <ul class="dropdown-menu wider arrow nopadding messages">
                        <li><h1>You have <strong>1</strong> new message</h1></li>
                        <li>
                            <a class="cyan" href="#">
                                <div class="profile-photo">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/ici-avatar.jpg" alt />
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ing. Imrich Kamarel</span>
                                    <span class="time">12 mins</span>
                                    <div class="message-content">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a class="green" href="#">
                                <div class="profile-photo">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/arnold-avatar.jpg" alt />
                                </div>
                                <div class="message-info">
                                    <span class="sender">Arnold Karlsberg</span>
                                    <span class="time">1 hour</span>
                                    <div class="message-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/profile-photo.jpg" alt />
                                </div>
                                <div class="message-info">
                                    <span class="sender">John Douey</span>
                                    <span class="time">3 hours</span>
                                    <div class="message-content">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a class="red" href="#">
                                <div class="profile-photo">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/peter-avatar.jpg" alt />
                                </div>
                                <div class="message-info">
                                    <span class="sender">Peter Kay</span>
                                    <span class="time">5 hours</span>
                                    <div class="message-content">Ut enim ad minim veniam, quis nostrud exercitation</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a class="orange" href="#">
                                <div class="profile-photo">
                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/george-avatar.jpg" alt />
                                </div>
                                <div class="message-info">
                                    <span class="sender">George McCain</span>
                                    <span class="time">6 hours</span>
                                    <div class="message-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit</div>
                                </div>
                            </a>
                        </li>


                        <li class="topborder"><a href="#">Check all messages <i class="fa fa-angle-right"></i></a></li>
                    </ul>

                </li>

                <li class="dropdown divided">

                    <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>
                        <span class="label label-transparent-black">3</span>
                    </a>

                    <ul class="dropdown-menu wide arrow nopadding bordered">
                        <li><h1>You have <strong>3</strong> new notifications</h1></li>

                        <li>
                            <a href="#">
                                <span class="label label-green"><i class="fa fa-user"></i></span>
                                New user registered.
                                <span class="small">18 mins</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="label label-red"><i class="fa fa-power-off"></i></span>
                                Server down.
                                <span class="small">27 mins</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="label label-orange"><i class="fa fa-plus"></i></span>
                                New order.
                                <span class="small">36 mins</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="label label-cyan"><i class="fa fa-power-off"></i></span>
                                Server restared.
                                <span class="small">45 mins</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <span class="label label-amethyst"><i class="fa fa-power-off"></i></span>
                                Server started.
                                <span class="small">50 mins</span>
                            </a>
                        </li>

                        <li><a href="#">Check all notifications <i class="fa fa-angle-right"></i></a></li>
                    </ul>

                </li>

                <li class="dropdown divided user" id="current-user">
                    <div class="profile-photo">
                        <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/profile-photo.jpg" alt />
                    </div>
                    <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                        <?php echo Yii::app()->session['admin']['adminuser'] ?> <i class="fa fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu arrow settings">

                        <li>

                            <h3>Backgrounds:</h3>
                            <ul id="color-schemes">
                                <li><a href="#" class="bg-1"></a></li>
                                <li><a href="#" class="bg-2"></a></li>
                                <li><a href="#" class="bg-3"></a></li>
                                <li><a href="#" class="bg-4"></a></li>
                                <li><a href="#" class="bg-5"></a></li>
                                <li><a href="#" class="bg-6"></a></li>
                            </ul>

                            <div class="form-group videobg-check">
                                <label class="col-xs-8 control-label">Video BG</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea small">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="videobg-check">
                                        <label class="onoffswitch-label" for="videobg-check">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#"><i class="fa fa-user"></i> Profile</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-red" id="user-inbox">3</span></a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="<?php echo $this->createUrl('public/logout') ?>"><i class="fa fa-power-off"></i> 退出</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#mmenu"><i class="fa fa-comments"></i></a>
                </li>
            </ul>
            <!-- /Quick Actions -->



            <!-- Sidebar -->
            <ul class="nav navbar-nav side-nav" id="sidebar">

                <li class="collapsed-content">
                    <ul>
                        <li class="search"><!-- Collapsed search pasting here at 768px --></li>
                    </ul>
                </li>

                <li class="navigation" id="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="#navigation">导航菜单 <i class="fa fa-angle-up"></i></a>

                    <ul class="menu">

                        <li class="active">
                            <a href="<?php echo $this->createUrl('default/index') ?>">
                                <i class="fa fa-tachometer"></i> <?php echo Nodes::$nodelist['default/index'] ?>
                                <span class="badge badge-red">1</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i> <?php echo Nodes::$nodelist['admin'] ?> <b class="fa fa-plus dropdown-plus"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->createUrl('admin/add') ?>">
                                        <i class="fa fa-caret-right"></i> <?php echo Nodes::$nodelist['admin/add'] ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('admin/index') ?>">
                                        <i class="fa fa-caret-right"></i> <?php echo Nodes::$nodelist['admin/index'] ?>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-pencil"></i> 品牌管理 <b class="fa fa-plus dropdown-plus"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->createUrl('brandcate/add') ?>">
                                        <i class="fa fa-caret-right"></i> 添加品牌分类
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('brandcate/index') ?>">
                                        <i class="fa fa-caret-right"></i> 品牌分类列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('brand/add') ?>">
                                        <i class="fa fa-caret-right"></i> 添加品牌
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('brand/index') ?>">
                                        <i class="fa fa-caret-right"></i> 品牌列表
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tint"></i> 商品管理 <b class="fa fa-plus dropdown-plus"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->createUrl('category/add') ?>">
                                        <i class="fa fa-caret-right"></i> 添加商品分类
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('category/index') ?>">
                                        <i class="fa fa-caret-right"></i> 商品分类列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('property/add') ?>">
                                        <i class="fa fa-caret-right"></i> 添加商品属性
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('property/index') ?>">
                                        <i class="fa fa-caret-right"></i> 商品属性列表
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('product/add') ?>">
                                        <i class="fa fa-caret-right"></i> 添加商品
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('product/index') ?>">
                                        <i class="fa fa-caret-right"></i> 商品列表
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tint"></i> 订单管理 <b class="fa fa-plus dropdown-plus"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo $this->createUrl('order/index') ?>">
                                        <i class="fa fa-caret-right"></i> 全部订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('order/index',array('status'=>'paysuc')) ?>">
                                        <i class="fa fa-caret-right"></i> 准备发货订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('order/index',array('status'=>'outing')) ?>">
                                        <i class="fa fa-caret-right"></i> 已发货订单
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('order/index',array('status'=>'received')) ?>">
                                        <i class="fa fa-caret-right"></i> 已完成订单
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->createUrl('order/index',array('status'=>'cancel')) ?>">
                                        <i class="fa fa-caret-right"></i> 处理退货订单
                                    </a>
                                </li>

                                <li>
                                    <a href="<?php echo $this->createUrl('order/index',array('status'=>'canceled')) ?>">
                                        <i class="fa fa-caret-right"></i> 处理退款
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <!--<li>
                            <a href="buttons.html">
                                <i class="fa fa-tint"></i> Buttons & Icons
                            </a>
                        </li>
                        <li>
                            <a href="grid.html">
                                <i class="fa fa-th"></i> Grid Layout
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-th-large"></i> Tables <b class="fa fa-plus dropdown-plus"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="tables.html">
                                        <i class="fa fa-caret-right"></i> Bootstrap Tables
                                    </a>
                                </li>
                                <li>
                                    <a href="datatables.html">
                                        <i class="fa fa-caret-right"></i> DataTables
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-desktop"></i> Example Pages <b class="fa fa-plus dropdown-plus"></b>
                                <span class="label label-greensea">mails</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-caret-right"></i> Login Page
                                    </a>
                                </li>
                                <li>
                                    <a href="calendar.html">
                                        <i class="fa fa-caret-right"></i> Calendar
                                    </a>
                                </li>
                                <li>
                                    <a href="page404.html">
                                        <i class="fa fa-caret-right"></i> Page 404
                                    </a>
                                </li>
                                <li>
                                    <a href="page500.html">
                                        <i class="fa fa-caret-right"></i> Page 500
                                    </a>
                                </li>
                                <li>
                                    <a href="page-offline.html">
                                        <i class="fa fa-caret-right"></i> Page Offline
                                    </a>
                                </li>
                                <li>
                                    <a href="gallery.html">
                                        <i class="fa fa-caret-right"></i> Gallery
                                    </a>
                                </li>
                                <li>
                                    <a href="timeline.html">
                                        <i class="fa fa-caret-right"></i> Timeline
                                    </a>
                                </li>
                                <li>
                                    <a href="mail.html">
                                        <i class="fa fa-caret-right"></i> Vertical Mail
                                        <span class="badge badge-red">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mail-horizontal.html">
                                        <i class="fa fa-caret-right"></i> Horizontal Mail
                                        <span class="label label-greensea">mails</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="vector-maps.html">
                                        <i class="fa fa-caret-right"></i> Vector Maps
                                    </a>
                                </li>
                                <li>
                                    <a href="google-maps.html">
                                        <i class="fa fa-caret-right"></i> Google Maps
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="widgets.html">
                                <i class="fa fa-play-circle"></i> Widgets
                            </a>
                        </li>

                        <li>
                            <a href="charts.html">
                                <i class="fa fa-bar-chart-o"></i> Charts & Graphs
                            </a>
                        </li>-->


                    </ul>

                </li>

                <!--<li class="summary" id="order-summary">
                    <a href="#" class="sidebar-toggle underline" data-toggle="#order-summary">Orders Summary <i class="fa fa-angle-up"></i></a>

                    <div class="media">
                        <a class="pull-right" href="#">
                            <span id="sales-chart"></span>
                        </a>
                        <div class="media-body">
                            This week sales
                            <h3 class="media-heading">26, 149</h3>
                        </div>
                    </div>

                    <div class="media">
                        <a class="pull-right" href="#">
                            <span id="balance-chart"></span>
                        </a>
                        <div class="media-body">
                            This week balance
                            <h3 class="media-heading">318, 651</h3>
                        </div>
                    </div>

                </li>

                <li class="settings" id="general-settings">
                    <a href="#" class="sidebar-toggle underline" data-toggle="#general-settings">General Settings <i class="fa fa-angle-up"></i></a>

                    <div class="form-group">
                        <label class="col-xs-8 control-label">Switch ON</label>
                        <div class="col-xs-4 control-label">
                            <div class="onoffswitch greensea">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-on" checked="">
                                <label class="onoffswitch-label" for="switch-on">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-xs-8 control-label">Switch OFF</label>
                        <div class="col-xs-4 control-label">
                            <div class="onoffswitch greensea">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="switch-off">
                                <label class="onoffswitch-label" for="switch-off">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                </li>


            </ul>-->
            <!-- Sidebar end -->





        </div>
        <!--/.nav-collapse -->





    </div>
    <!-- Fixed navbar end -->
<?php echo $content ?>
        <div id="mmenu" class="right-panel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#mmenu-users" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                <li class=""><a href="#mmenu-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
                <li class=""><a href="#mmenu-friends" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
                <li class=""><a href="#mmenu-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="mmenu-users">
                    <h5><strong>Online</strong> Users</h5>

                    <ul class="users-list">

                        <li class="online">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/ici-avatar.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="online">
                            <div class="media">

                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/arnold-avatar.jpg" alt>
                                </a>
                                <span class="badge badge-red unread">3</span>

                                <div class="media-body">
                                    <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>

                            </div>
                        </li>

                        <li class="online">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/peter-avatar.jpg" alt>

                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Peter <strong>Kay</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Kosice, Slovakia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="online">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/george-avatar.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">George <strong>McCain</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Prague, Czech Republic</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="busy">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar1.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Lucius <strong>Cashmere</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="busy">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar2.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Jesse <strong>Phoenix</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Berlin, Germany</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <h5><strong>Offline</strong> Users</h5>

                    <ul class="users-list">

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar4.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Dell <strong>MacApple</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Paris, France</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">

                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar5.jpg" alt>
                                </a>

                                <div class="media-body">
                                    <h6 class="media-heading">Roger <strong>Flopple</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Rome, Italia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>

                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar6.jpg" alt>

                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Nico <strong>Vulture</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Kyjev, Ukraine</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar7.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Bobby <strong>Socks</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Moscow, Russia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar8.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Anna <strong>Opichia</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>

                <div class="tab-pane" id="mmenu-history">
                    <h5><strong>Chat</strong> History</h5>

                    <ul class="history-list">

                        <li class="online">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/ici-avatar.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="busy">
                            <div class="media">

                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/arnold-avatar.jpg" alt>
                                </a>
                                <span class="badge badge-red unread">3</span>

                                <div class="media-body">
                                    <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                                    <small>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</small>
                                    <span class="badge badge-outline status"></span>
                                </div>

                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/peter-avatar.jpg" alt>

                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Peter <strong>Kay</strong></h6>
                                    <small>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit </small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div>

                <div class="tab-pane" id="mmenu-friends">
                    <h5><strong>Friends</strong> List</h5>
                    <ul class="favourite-list">

                        <li class="online">
                            <div class="media">

                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/arnold-avatar.jpg" alt>
                                </a>
                                <span class="badge badge-red unread">3</span>

                                <div class="media-body">
                                    <h6 class="media-heading">Arnold <strong>Karlsberg</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Bratislava, Slovakia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>

                            </div>
                        </li>

                        <li class="offline">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar8.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Anna <strong>Opichia</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Budapest, Hungary</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="busy">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/random-avatar1.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Lucius <strong>Cashmere</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Wien, Austria</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                        <li class="online">
                            <div class="media">
                                <a class="pull-left profile-photo" href="#">
                                    <img class="media-object" src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/ici-avatar.jpg" alt>
                                </a>
                                <div class="media-body">
                                    <h6 class="media-heading">Ing. Imrich <strong>Kamarel</strong></h6>
                                    <small><i class="fa fa-map-marker"></i> Ulaanbaatar, Mongolia</small>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="tab-pane pane-settings" id="mmenu-settings">
                    <h5><strong>Chat</strong> Settings</h5>

                    <ul class="settings">

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Show Offline Users</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-offline" checked="">
                                        <label class="onoffswitch-label" for="show-offline">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Show Fullname</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-fullname">
                                        <label class="onoffswitch-label" for="show-fullname">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">History Enable</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-history" checked="">
                                        <label class="onoffswitch-label" for="show-history">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Show Locations</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-location" checked="">
                                        <label class="onoffswitch-label" for="show-location">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Notifications</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-notifications">
                                        <label class="onoffswitch-label" for="show-notifications">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Show Undread Count</label>
                                <div class="col-xs-4 control-label">
                                    <div class="onoffswitch greensea">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="show-unread" checked="">
                                        <label class="onoffswitch-label" for="show-unread">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                </div><!-- tab-pane -->

            </div><!-- tab-content -->
        </div>


    </div>
    <!-- Make page fluid-->

</div>
    <!-- Wrap all page content end -->



    <section class="videocontent" id="video"></section>


</body>
</html>

