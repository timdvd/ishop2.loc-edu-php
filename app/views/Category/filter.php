<?php require_once APP . '/controllers/CategoryController.php';?>
<?php require_once LIBS . '/Pagination.php';?>
<?php if(!empty($products)): ?>
                        <?php $curr = \ishop\App::$app->getProperty('currency'); ?>
                        <?php foreach($products as $product): ?>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="product/<?=$product->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/<?=$product->img;?>" alt="" /></a>
                                    <div class="product-bottom">
                                        <h3><?=$product->alias;?></h3>
                                        <p>Explore Now</p>
                                        <h4><a data-id="<?=$product->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$product->id;?>"><i></i></a>
                                            <span class=" item_price"><?=$curr['symbol_left'];?> <?=$product->price * $curr['value'];?><?=$curr['symbol_right'];?></span>
                                            <?php if($product->old_price):?>
                                                <small><del><?=$curr['symbol_left'];?><?=$product->old_price * $curr['value'];?></del></small>
                                            <?php endif;?>
                                        </h4>                            </div>
                                    <div class="srch srch1">
                                        <span>-50%</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>
                        <div class="clearfix"></div>
    <div class="text-center">
        <p>(<?=count($products)?> goods from <?=$total;?>)</p>
        <?php if($pagination->countPages > 1): ?>
            <?=$pagination;?>
        <?php endif; ?>
    </div>
                <?php else: ?>
                    <h3>No goods</h3>
                <?php endif;?>
