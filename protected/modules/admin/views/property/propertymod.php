<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:27
 */
?>
<style>
    .errorMessage{
        color:yellow;
        padding-left:12px;
    }
</style>
<!-- Page content -->
<div id="content" class="col-md-12">

    <!-- page header -->
    <div class="pageheader">


        <h2><i class="fa fa-user" style="line-height: 48px;padding-left: 1px;"></i> 属性分类管理 <span> 修改属性分类</span></h2>


        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>您在这里</li>
                <li><a href="<?php echo $this->createUrl('default/index') ?>">后台首页</a></li>
                <li><a href="<?php echo $this->createUrl('propertycate/index') ?>">属性分类管理</a></li>
                <li class="active">修改属性分类</li>
            </ol>
        </div>


    </div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">

        <!-- row -->
        <div class="row">

            <!-- col 12 -->
            <div class="col-md-12">
                <!-- tile -->
                <section class="tile color transparent-black">
                    <!-- tile header -->
                    <div class="tile-header">
                        <h1>修改属性分类</h1>
                        <div class="controls">
                            <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
                            <a href="#" class="remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- /tile header -->

<!-- tile body -->
<div class="tile-body">
    <?php $form = $this->beginWidget(
        'CActiveForm',
        array(
            'htmlOptions'=>array(
                "class"=>"form-horizontal",
                "role"=>"form"
            ),
        )
    ) ?>

<div class="form-group">
    <?php echo $form->labelEx(
        $model,
        'fieldname',
        array(
            "for"=>"input01",
            "class"=>"col-sm-2 control-label"
        )
    ); ?>
    <div class="col-sm-10">
        <?php echo $form->textField(
            $model,
            'fieldname',
            array(
                "id"=>"input01",
                "class"=>"form-control",
                "placeholder"=>"请输入属性名称"
            )
        ); ?>
        <span class="help-block">
            <?php echo $form->error($model,'fieldname') ?>
        </span>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx(
        $model,
        'categoryid',
        array(
            "for"=>"input03",
            "class"=>"col-sm-2 control-label"
        )
    ); ?>
    <div class="col-sm-10">
        <?php echo $form->dropDownList(
            $model,
            'categoryid',
            $propertycates,
            array(
                "id"=>"input03",
                "class"=>"form-control",
            )
        ); ?>
        <span class="help-block">
        <?php echo $form->error($model,'categoryid') ?>
    </span>
    </div>
</div>

<div class="form-group">
    <?php echo $form->labelEx(
        $model,
        'fieldtype',
        array(
            "for"=>"input03",
            "class"=>"col-sm-2 control-label"
        )
    ); ?>
    <div class="col-sm-10">
        <?php echo $form->dropDownList(
            $model,
            'fieldtype',
            array('text'=>'文本(text)','radio'=>'单选(radio)','checkbox'=>'多选(checkbox)','select'=>'下拉菜单(select)'),
            array(
                "id"=>"input03",
                "class"=>"form-control",
            )
        ); ?>
        <span class="help-block">
            <?php echo $form->error($model,'fieldtype') ?>
        </span>
    </div>
</div>

    <?php
        if(Yii::app()->user->hasFlash('info')):
    ?>
        <p class="text-right"><?php echo Yii::app()->user->getFlash('info') ?></p>
    <?php
        endif;
    ?>
<div class="form-group form-footer">
    <div class="col-sm-offset-2 col-sm-12">
        <button type="submit" class="btn btn-primary">修改</button>
    </div>
</div>
<?php
    $this->endWidget();
?>
</div>
<!-- /tile body -->

                </section>
                <!-- /tile -->


            </div>
            <!-- /col 6 -->

        </div>
        <!-- /row -->

    </div>
    <!-- /content container -->




</div>
<!-- Page content end -->