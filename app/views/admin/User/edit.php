<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Users Editing
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Main</a></li>
        <li><a href="<?=ADMIN;?>/user"> Users List</a></li>
        <li class="active">Users Editing</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row"
    <div class="col-md-12">
        <div class="box">
            <form action="<?=ADMIN;?>/user/edit" method="post" data-toggle="validator">
                <div class="box-body">
                    <div class="form-group has-feedback">
                        <label for="login">Login</label>
                        <input type="text" class="form-control" name="login" id="login" value="<?=h($user->login);?>" required>
                    </div>
                    <div class="form-group">
                            <label for="password">Password</label>
                        <input type="password" class="form-control" name="login" id="password" placeholder="enter pass">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="name">Name</label>
                        <input type="name" class="form-control" name="name" id="name" value="<?=h($user->name);?>" required>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?=h($user->email);?>" required>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="address" id="address" value="<?=h($user->address);?>" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="user" <?php if($user->role == 'user') echo ' selected';?>>User</option>
                            <option value="admin" <?php if($user->role == 'admin') echo ' selected';?>>Admin</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="id" value="<?=$user->id;?>">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        <h3>User's Orders</h3>
        <div class="box">
            <div class="box-body">
                <?php if ($orders): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Sum</th>
                                <th>Date of creating</th>
                                <th>Date of changes</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($orders as $order):?>
                                <?php $class = $order['status'] ? 'success' : '';?>
                                <tr class="<?=$class;?>">
                                    <td><?=$order['id'];?></td>
                                    <td><?=$order['status']? 'New': 'Old' ;?></td>
                                    <td><?=$order['sum'];?></td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['update_at'];?></td>
                                    <td>
                                        <a href="<?=ADMIN;?>/order/view?id=<?=$order['id']?>"><i class="fa fa-fw fa-eye"></i></a>
                                        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id']?>"><i class="fa fa-fw fa-close"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-danger">No goods...</p>
                <?php endif;?>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->



