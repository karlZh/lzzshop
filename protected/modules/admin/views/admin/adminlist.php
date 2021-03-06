<?php
/**
 * Created by PhpStorm.
 * User: lijie-pd
 * Date: 2015/9/28
 * Time: 15:27
 */
?>
<!-- Page content -->
<div id="content" class="col-md-12">

<!-- page header -->
<div class="pageheader">
    <h2><i class="fa fa-user" style="line-height: 48px;padding-left: 1px;"></i> 管理员管理 <span> 管理员列表</span></h2>


    <div class="breadcrumbs">
        <ol class="breadcrumb">
            <li>您在这里</li>
            <li><a href="<?php echo $this->createUrl('default/index') ?>">后台首页</a></li>
            <li><a href="<?php echo $this->createUrl('admin/index') ?>">管理员管理</a></li>
            <li class="active">管理员列表</li>
        </ol>
    </div>


</div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">

<section class="tile color transparent-black">



    <!-- tile header -->
    <div class="tile-header">
        <h1>管理员列表</h1>
        <!--<div class="search">
            <input type="text" placeholder="Search...">
        </div>-->
        <div class="controls">
            <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
            <a href="#" class="remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <!-- /tile header -->

    <!-- tile widget -->
    <!--<div class="tile-widget bg-transparent-black-2">
        <div class="row">

            <div class="col-sm-4 col-xs-6">
                <div class="input-group table-options">
                    <select class="chosen-select form-control" style="display: none;">
                        <option>Bulk Action</option>
                        <option>Delete Selected</option>
                        <option>Copy Selected</option>
                        <option>Archive Selected</option>
                    </select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 185px;" title=""><a class="chosen-single" tabindex="-1"><span>Bulk Action</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Apply</button>
                          </span>
                </div>
            </div>

            <div class="col-sm-8 col-xs-6 text-right">

                <div class="btn-group btn-group-xs table-options">
                    <button type="button" class="btn btn-default">Day</button>
                    <button type="button" class="btn btn-default">Week</button>
                    <button type="button" class="btn btn-default">Month</button>
                </div>

            </div>


        </div>
    </div>-->
    <!-- /tile widget -->



    <!-- tile body -->
    <div class="tile-body nopadding">

        <table class="table table-bordered table-sortable">
            <thead>
            <tr>
                <th>
                    <div class="checkbox check-transparent">
                        <input type="checkbox" value="1" id="allchck">
                        <label for="allchck"></label>
                    </div>
                </th>
                <th class="sortable sort-alpha">用户名</th>
                <th class="sortable sort-alpha">真实姓名</th>
                <th class="sortable sort-alpha">联系电话</th>
                <th class="sortable sort-alpha">联系邮箱</th>
                <th class="sortable sort-alpha">最后登录时间</th>
                <th class="sortable sort-alpha">最后登录IP</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($adminusers as $user): ?>
                <tr>
                    <td>
                        <div class="checkbox check-transparent">
                            <input type="checkbox" value="1" id="chck01">
                            <label for="chck01"></label>
                        </div>
                    </td>
                    <td><?php echo $user->adminuser ?></td>
                    <td><?php echo $user->admintname ?></td>
                    <td><?php echo $user->admintel ?></td>
                    <td><?php echo $user->adminemail ?></td>
                    <td><?php echo date("Y-m-d H:i:s",$user->logintime) ?></td>
                    <td><?php echo long2ip($user->loginip) ?></td>
                    <td><a href="#" class="check-toggler <?php if(!$user->isforbidden){echo "checked";} ?>" id="id-<?php echo $user->id ?>"></a></td>
                    <td><a href="#">编辑</a> / <a href="<?php echo $this->createUrl('admin/del',array('id'=>$user->id)) ?>">删除</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <!-- /tile body -->
    <?php
        if(Yii::app()->user->hasFlash('info')):
            ?>
            <script>alert('<?php echo Yii::app()->user->getFlash('info') ?>');</script>
    <?php
        endif;
    ?>

    <!-- tile footer -->
    <div class="tile-footer bg-transparent-black-2 rounded-bottom-corners">
        <div class="row">

            <div class="col-sm-4">
                <!--<div class="input-group table-options">
                    <select class="chosen-select form-control" style="display: none;">
                        <option>Bulk Action</option>
                        <option>Delete Selected</option>
                        <option>Copy Selected</option>
                        <option>Archive Selected</option>
                    </select><div class="chosen-container chosen-container-single chosen-container-single-nosearch" style="width: 185px;" title=""><a class="chosen-single" tabindex="-1"><span>Bulk Action</span><div><b></b></div></a><div class="chosen-drop"><div class="chosen-search"><input type="text" autocomplete="off" readonly=""></div><ul class="chosen-results"></ul></div></div>
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Apply</button>
                          </span>
                </div>-->
            </div>

            <div class="col-sm-4 text-center">
                <small class="inline table-options paging-info">showing <?php echo $pager->getCurrentPage()+1 ?>-<?php echo $pager->getPageCount() ?> of <?php echo $pager->getItemCount() ?> items</small>
            </div>

            <div class="col-sm-4 text-right sm-center">
                <?php
                $this->widget(
                    'CLinkPager',
                    array(
                        'pages'=>$pager,
                        'header'=>'',
                        'footer'=>'',
                        'firstPageLabel'=>'<i class="fa fa-angle-double-left"></i>',
                        'lastPageLabel'=>'<i class="fa fa-angle-double-right"></i>',
                        'hiddenPageCssClass'=>'',
                        'previousPageCssClass'=>'hidden',
                        'nextPageCssClass'=>'hidden',
                        'selectedPageCssClass'=>'active',
                        'htmlOptions'=>array(
                            "class"=>"pagination pagination-xs nomargin pagination-custom"
                        ),
                    )
                );
                ?>

            </div>

        </div>
    </div>
    <!-- /tile footer -->




</section>
</div>
<!-- /content container -->




</div>
<!-- Page content end -->

<script>
    $(function(){

        //check all checkboxes
        $('table thead input[type="checkbox"]').change(function () {
            $(this).parents('table').find('tbody input[type="checkbox"]').prop('checked', $(this).prop('checked'));
        });

        // sortable table
        $('.table.table-sortable th.sortable').click(function() {
            var o = $(this).hasClass('sort-asc') ? 'sort-desc' : 'sort-asc';
            $(this).parents('table').find('th.sortable').removeClass('sort-asc').removeClass('sort-desc');
            $(this).addClass(o);
        });

        //chosen select input
        $(".chosen-select").chosen({disable_search_threshold: 10});

        //check toggling
        $('.check-toggler').on('click', function(){
            var id = $(this).attr("id").substring(3);
            if($(this).hasClass("checked")){
                var isforbidden = '1';
            }else{
                var isforbidden = '0';
            }
            $.post(
                "<?php echo $this->createUrl('admin/modifyisforbidden') ?>",
                {'id':id,'isforbidden':isforbidden},
                function(data){
                    if(data.errno==0){
                        $("#id-"+id).toggleClass('checked');
                    }else{
                        alert('修改失败');
                    }
                },
                'json'
            );

        })

    })

</script>