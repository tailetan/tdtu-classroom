<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="public/css/style.css">

    <title>Đăng Ký</title>
</head>

<body class="p-5 " id="reg-form">
    <div class="container ">
        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12  mt-5" id="login-img">
                <img class="img-fluid" src="public/images/signup.png" alt="">
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 px-0 ">
                <div id="wp-reg" class="bg-white rounded-lg  p-4 ">

                    <form action="" class="form-group " method="post">
                        <h1 class="text-center text-primary">Sign Up</h1>
                        <div class="form-group">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Fullname" class="border-pink form-control" value="<?php echo set_value('fullname') ?>">
                            <?php echo form_error('fullname'); ?>

                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" placeholder="Email" class="border-pink form-control" value="<?php echo set_value('email') ?>">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="border-pink form-control">
                            <?php echo form_error('password'); ?>
                        </div>

                        <div class="form-group">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" name="department" id="department" placeholder="Department" class="border-pink form-control" value="<?php echo set_value('department') ?>">
                            <?php echo form_error('department'); ?>
                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number" class="border-pink form-control" value="<?php echo set_value('phone_number') ?>">
                            <?php echo form_error('phone_number'); ?>
                        </div>

                        <?php echo form_error('login'); ?>
                        <button class="btn btn-block rounded-pill btn-pink mt-4" name="btn-reg">Register</button>
                        <?php echo form_error('account'); ?>
                    </form>


                    <p href="" class="text-center mt-2 mb-0 p-0">You already had an account? <a href="?mod=users&action=login" class="text-pink font-weight-bold">Login</a></p>
                    <?php
                    global $is_reg;
                    if ($is_reg) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Sign up successfully! <a href="?mod=users&action=login" class="text-pink font-weight-bold">Click here to login</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="col-lg-1 col-sm-12 col-md-1  mt-5" id="login-img">
            </div>
        </div>
    </div>




</body>

</html>