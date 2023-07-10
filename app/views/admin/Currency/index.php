<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Currencies list
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li class="active">Currencies list</li>
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
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($currencies as $currency):?>
                            <tr>
                                <td><?=$currency->id;?></td>
                                <td><?=$currency->title;?></td>
                                <td><?=$currency->code;?></td>
                                <td><?=$currency->value;?></td>
                                <td>
                                    <a href="<?=ADMIN;?>/currency/edit?id=<?=$currency->id;?>"><i class="fa fa-fw fa-pencil"></i></a>
                                    <a href="<?=ADMIN;?>/currency/delete?id=<?=$currency->id;?>"><i class="fa fa-fw fa-close"></i></a>
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


