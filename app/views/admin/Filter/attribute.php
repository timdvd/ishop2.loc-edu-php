<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Filters
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group">Filter</a></li>
        <li class="active">Filters</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <a href="<?=ADMIN;?>/filter/attribute-add" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>Add attr</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($attrs as $id => $item): ?>
                            <tr>
                                <td><?=$item['value'];?></td>
                                <td><?=$item['title'];?></td>
                                <td>
                                    <a href="<?=ADMIN;?>/filter/attribute-edit?id=<?=$id;?>"><i class="fa fa-fw fa-pencil"></i></a>
                                    <a href="<?=ADMIN;?>/filter/attribute-delete?id=<?=$id;?>" class="text-danger"><i class="fa fa-fw fa-remove"></i></a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->





