<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New Product
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/product">Product list</a></li>
        <li class="active">New Product</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="title">Product Name</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?php isset($_SESSION['form_data']['title']) ? h( $_SESSION['form_data']['title']) : null;?>" placeholder="Product Name" required>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Parent Category</label>
                        <?php new \app\widgets\menu\Menu([
                            'tpl' => WWW . '/menu/select.php',
                            'container' => 'select',
                            'cache' => 0,
                            'cacheKey' => 'admin_select',
                            'class' => 'form-control',
                            'attrs' => [
                                'name' => 'category_id',
                                'id' => 'category_id',
                            ],
                            'prepend' => '<option>Choose Category</option>'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" name="keywords" value="<?php isset($_SESSION['form_data']['keywords']) ? $_SESSION['form_data']['keywords'] : null;?>" class="form-control" id="keywords" placeholder="Keywords">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" value="<?php isset($_SESSION['form_data']['description']) ? h( $_SESSION['form_data']['description']) : null;?>" class="form-control" id="desc" placeholder="Description">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control"
                               id="price" value="<?php isset($_SESSION['form_data']['price']) ? h( $_SESSION['form_data']['price']) : null;?>"
                               placeholder="Price" pattern="^[0-9.]{1,}$" required data-error="Only numbers and dots">
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" id="editor1" cols="80" rows="10"><?php isset($_SESSION['form_data']['price']) ? h( $_SESSION['form_data']['price']) : null;?>
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="status" checked> Status
                        </label>
                    </div>

                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="hit"> Hit
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <label for="related">
                            Wired goods
                        </label>
                        <select name="related[]" class="form-control select2" id="related" multiple>

                        </select>
                    </div>

                    <?php new app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php');?>

                    <div class="form-group">
                        <div class="col-md-4">
                            <div class="box box-danger box-solid file-upload">
                                <div class="box-header">
                                    <h3 class="box-title">Base image</h3>
                                </div>
                                <div class="box-body">
                                    <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Choose file</div>
                                    <p><small>Recommended Size: 125x200</small></p>
                                    <div class="single"></div>
                                </div>
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div >
                        </div>
                        <div class="col-md-8">
                            <div class="box box-primary box-solid file-upload">
                                <div class="box-header">
                                    <h3 class="box-title">Gallery Images</h3>
                                </div>
                                <div class="box-body">
                                    <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">Choose file</div>
                                    <p><small>Recommended Size: 700x1000</small></p>
                                    <div class="multi"></div>
                                </div>
                                <div class="overlay">
                                    <i class="fa fa-refresh fa-spin"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
        </div>
    </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->



