<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?= PATH ?>">Home</a></li>
                <li>Register</li>
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
                <div class="product-one signup">
                    <div class="register-top heading">
                        <h2>REGISTER</h2>
                    </div>

                    <div class="register-main">
                        <div class="col-md-6 account-left">
                            <form method="post" data-toggle="validator" action="user/signup" id="signup" role="form">
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?=isset($_SESSION['form_data']['login']) ? h($_SESSION['form_data']['login']): '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" data-error="Min 6 characters" data-minlength="6" value="<?=isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']): '';?>"required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="help-block with-errors"></div>
                                <div class="form-group has-feedback">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?=isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']): '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="<?=isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']): '';?>"required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-default">Register</button>
                            </form>
                            <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-end-->