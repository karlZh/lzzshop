<?php
/**
 * Created by PhpStorm.
 * User: CHAO
 * Date: 2016/3/8
 * Time: 21:35
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>业务员登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/minimal.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-1">


<!-- Wrap all page content here -->
<div id="wrap">
    <!-- Make page fluid -->
    <div class="row">
        <!-- Page content -->
        <div id="content" class="col-md-12 full-page login">


            <div class="inside-block">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/images/logo-big.png" alt class="logo">
                <h5>业务员登录</h5>

                    <?php
                    $form = $this->beginWidget(
                        'CActiveForm',
                        array(
                            'htmlOptions'=>array(
                                'id'=>"form-signin",
                                'class'=>"form-signin",
                            ),
                        )
                    )
                    ?>
                    <section class="errmessage">
                        <?php
                        echo $form->error($model,"loginmessage");
                        //        echo $form->error($model,"password");
                        ?>
                    </section>

                    <section>
                        <div class="input-group">
                            <?php
                            echo $form->textField(
                                $model,
                                'salemanuser',
                                array(
                                    "placeholder"=>"用户名",
                                    "class" => "form-control",
                                )
                            );
                            ?>

                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        </div>
                        <div class="input-group">
                            <?php
                            echo $form->passwordField(
                                $model,
                                'password',
                                array(
                                    "placeholder"=>"密码",
                                    "class" => "form-control"
                                )
                            );
                            ?>

                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        </div>
                    </section>
                    <section class="log-in">
                        <button class="btn btn-greensea" style="width: 100%">登 录</button>
                    </section>
                <?php
                $this->endWidget();
                ?>

            </div>


        </div>
        <!-- /Page content -->
    </div>
</div>
<!-- Wrap all page content end -->
</body>
</html>
