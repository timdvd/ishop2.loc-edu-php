<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Category List
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li class="active">Category list</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <?php new \app\widgets\menu\Menu([
                        'tpl' => WWW . '/menu/category_admin.php',
                        'container' => 'div',
                        'cache' => 0,
                        'cacheKey' => 'admin_cat',
                        'class' => 'list-group list group-root well',
                ]) ?>
            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->


