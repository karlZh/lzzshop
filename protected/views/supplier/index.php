<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:27
 */
?>
<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl ?>/assets/admin/css/font-awesome.css" rel="stylesheet">
<!--content-->
    <!-- content main container -->
    <div class="main">
        <!-- row -->
        <div class="row">
            <!-- col 12 -->
            <div class="col-md-12">
                <!-- tile -->
                <div class="panel panel-primary" data-collapsed="0">
                    <!-- tile body -->
                    <div class="panel-body">


                        <form class="form-horizontal form-groups-bordered" role="form">
<!--                                --><?php //$form = $this->beginWidget(
//                                    'CActiveForm',
//                                    array(
//                                        'htmlOptions'=>array(
//                                            "class"=>"form-horizontal form-groups-bordered",
//                                            "role"=>"form",
//                                            "parsley-validate"=>"parsley-validate",
//                                            "enctype"=>"multipart/form-data",
//                                        )
//                                    )
//                                ); ?>

<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->labelEx($model,'name',array(
//                                        "for"=>"name",
//                                        "class"=>"col-sm-3 control-label"
//                                    )) ?>
<!--                                    <div class="col-sm-5">-->
<!--                                        <div class="input-group  input-group-sm">-->
<!--                                        --><?php //echo $form->textField($model,'name',array(
//                                            "class"=>"form-control",
//                                            "id"=>"name",
//                                            "parsley-trigger"=>"change",
//                                            "parsley-required"=>"true",
//                                            "parsley-minlength"=>"4",
//                                            "parsley-validation-minlength"=>"1"
//                                        )) ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->labelEx($model,'phone',array(
//                                        "for"=>"phone",
//                                        "class"=>"col-sm-3 control-label"
//                                    )) ?>
<!--                                    <div class="col-sm-5">-->
<!--                                        <div class="input-group  input-group-sm">-->
<!--                                        --><?php //echo $form->textField($model,'phone',
//                                            array(
//                                                "class"=>"form-control",
//                                                "id"=>"phone",
//                                                "parsley-trigger"=>"change",
//                                                "parsley-required"=>"true",
//                                            )) ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->labelEx($model,'company_name',array(
//                                        "for"=>"company_name",
//                                        "class"=>"col-sm-3 control-label"
//                                    )) ?>
<!--                                    <div class="col-sm-5">-->
<!--                                        --><?php //echo $form->textArea($model,'company_name',
//                                            array(
//                                                "class"=>"form-control",
//                                                "id"=>"company_name",
//                                                "parsley-trigger"=>"change",
//                                                "parsley-required"=>"true",
//                                            ))
//                                        ?>
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->labelEx($model,'product',array(
//                                        "for"=>"product",
//                                        "class"=>"col-sm-3 control-label"
//                                    )) ?>
<!--                                    <div class="col-sm-5">-->
<!--                                        --><?php //echo $form->textArea($model,'product',
//                                            array(
//                                                "class"=>"form-control",
//                                                "id"=>"product",
//                                                "parsley-trigger"=>"change",
//                                                "parsley-required"=>"true",
//                                            ))
//                                        ?>
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                                <div class="form-group">-->
<!--                                    --><?php //echo $form->labelEx($model,'company_adress',array(
//                                        "for"=>"adress",
//                                        "class"=>"col-sm-3 control-label"
//                                    )) ?>
<!--                                    <div class="col-sm-5">-->
<!--                                        <div class="input-group  input-group-sm">-->
<!--                                        --><?php //echo $form->textField($model,'company_adress',
//                                            array(
//                                                "class"=>"form-control",
//                                                "id"=>"adress",
//                                                "parsley-trigger"=>"change",
//                                                "parsley-required"=>"true",
//                                            ))
//                                        ?>
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
                                <div class="form-group">
                                    <label for="name" class="col-sm-3 control-label">姓名</label>
                                    <div class="col-sm-5">
                                        <div class="input-group  input-group-sm">
                                            <input class="form-control" id="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-3 control-label">电话</label>
                                    <div class="col-sm-5">
                                        <div class="input-group  input-group-sm">
                                            <input class="form-control" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company_name" class="col-sm-3 control-label">公司名称</label>
                                    <div class="col-sm-5">
                                        <div class="input-group  input-group-sm">
                                            <input class="form-control" id="company_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="product" class="col-sm-3 control-label">供应商品</label>
                                    <div class="col-sm-5">
                                        <div class="input-group">
                                            <textarea class="form-control" id="product"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adress" class="col-sm-3 control-label">公司地址</label>
                                    <div class="col-sm-5">
                                        <div class="input-group ">
                                            <textarea class="form-control" id="adress"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-action">
                                    <div class="col-sm-offset-2 col-sm-12">
                                        <button type="submit" class="btn btn-info">提交</button>
                                    </div>
                                </div>
                        </form>

<!--                            --><?php //$this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
