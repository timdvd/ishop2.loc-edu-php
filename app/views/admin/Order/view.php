<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Order №<?=$order['id'];?>
        <?php if(!$order['status']): ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn-success btn-xs">Allow</a>
        <?php else: ?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn-default btn-xs">Return to finish</a>
        <?php endif;?>
        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id']?>" class="btn-danger btn-xs">Delete</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/order">Orders list</a></li>
        <li class="active">Order №<?=$order['id'];?></li>
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
                        <tbody>
                            <tr>
                                <td>Order Number</td>
                                <td><?=$order['id'];?></td>
                            </tr>
                            <tr>
                                <td>Order Date</td>
                                <td><?=$order['date'];?></td>
                            </tr>
                            <tr>
                                <td>Order Update Date</td>
                                <td><?=$order['update_at'];?></td>
                            </tr>
                            <tr>
                                <td>Position Quantity</td>
                                <td><?=count($order_products);?></td>
                            </tr>
                            <tr>
                                <td>Order sum</td>
                                <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td><?=$order['name'];?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?=$order['status'] ? 'Done' : 'New';?></td>
                            </tr>
                            <tr>
                                <td>Comment</td>
                                <td><?=$order['note'];?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <h3>Details</h3>
        <div class="box">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $qty = 0; foreach ($order_products as $product):?>
                                <tr>
                                    <td><?=$product->id;?></td>
                                    <td><?=$product->title;?></td>
                                    <td><?=$product->qty; $qty += $product->qty;?></td>
                                    <td><?=$product->price;?></td>
                                </tr>
                            <?php endforeach;?>
                            <tr class="active">
                                <td colspan="2">
                                    <b>All:</b>
                                </td>
                                <td><b><?=$qty;?></b></td>
                                <td><b><?=$order['sum'];?></b></td>
                            </tr>
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

