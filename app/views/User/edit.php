<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Home</a></li>
                <li><a href="<?= PATH ?>/user/cabinet">Personal Cabinet</a></li>
                <li>Edit your profile</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one login">
                        <form action="user/edit" method="post" data-toggle="validator">
                            <div class="box-body">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input type="text" class="form-control" name="login" id="login" value="<?=h($_SESSION['user']['login']);?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="login" id="password" placeholder="enter pass">
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Name</label>
                                    <input type="name" class="form-control" name="name" id="name" value="<?=h($_SESSION['user']['name']);?>" required>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?=h($_SESSION['user']['email']);?>" required>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Address</label>
                                    <input type="address" class="form-control" name="address" id="address" value="<?=h($_SESSION['user']['address']);?>" required>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->

