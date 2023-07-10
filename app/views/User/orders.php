<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li><a href="<?=PATH;?>/user/cabinet">Личный кабинет</a></li>
                <li>История заказов</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12 prdt-left">
                <?php if($orders): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                            <tr>
                                <th style="width: 10%">ID</th>
                                <th style="width: 30%">Status</th>
                                <th style="width: 20%">Sum</th>
                                <th style="width: 20%">Date of creating</th>
                                <th style="width: 20%">Changing date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($orders as $order): ?>
                                <?php
                                if($order['status'] == '1'){
                                    $class = 'success';
                                    $text = 'Finished';
                                }elseif($order['status'] == '2'){
                                    $class = 'info';
                                    $text = 'Payed';
                                }else{
                                    $class = '';
                                    $text = 'New';
                                }
                                ?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order->id;?></td>
                                    <td><?=$text;?></td>
                                    <td><?=$order->sum;?> <?=$order->currency;?></td>
                                    <td><?=$order->date;?></td>
                                    <td><?=$order->update_at;?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-danger">You did not order anything</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--product-end-->