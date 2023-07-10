<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New Currency
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/currency">Currency list</a></li>
        <li class="active">New currency</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <form action="<?=ADMIN;?>/currency/add" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Currency Name</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Currency Name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="code">Currency Code</label>
                        <input type="text" name="code" class="form-control" id="title" placeholder="Currency Code" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="symbol_left">Symbol Left</label>
                        <input type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="symbol left">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="symbol_right">Symbol Right</label>
                        <input type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="symbol right">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="value">Value</label>
                        <input type="text" name="value" class="form-control" id="value" placeholder="value" required
                        data-error="Only numbers" pattern="^[0-9].{1,}$">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="value">
                            <input type="checkbox" name="base">
                            Base currency
                        </label>
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