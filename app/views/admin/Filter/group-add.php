<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add group filter
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/filter/attribute-group">Filters group list</a></li>
        <li class="active">New filter</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <form action="<?=ADMIN;?>/filter/group-add" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Filter Group Name</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Filter Name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->



