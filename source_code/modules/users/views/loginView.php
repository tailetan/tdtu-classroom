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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">

    <title>Đăng nhập</title>
</head>

<body class="px-3 py-5">

    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-5 col-sm-12  mt-5" id="login-img">
                <img class="img-fluid" src="public/images/login.jpg" alt="">
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 px-0 ">
                <div id="wp-login" class="bg-white rounded-lg mt-5 p-4">
                    <h1 class="text-center display-4">Welcome</h1>

                    <form action="" class="form-group " method="post" id="login">
                        <div class="form-group">
                            <label for="email" class="text-pink form-label">Email</label>

                            <input type="text" name="email" id="email" placeholder="Email" class="form-control  border-pink" value="<?php echo set_value('email') ?>">
                            <?php echo form_error('email'); ?>
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-pink form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control border-pink">
                            <?php echo form_error('password'); ?>
                        </div>
                        <?php echo form_error('login'); ?>
                        <p  class="text-left  mt-2 mb-0 p-0"><a href="?mod=users&action=reset" class="text-pink text-decoration-underline">Forgot password?</a></p>

                        <button class="btn btn-pink btn-block mt-4 rounded-pill" name="btn-login">Login</button>
                    </form>

                    <p  class="text-right  mt-2 mb-0 p-0"><a href="?mod=users&action=reg" class="text-pink text-decoration-underline">Sign up an account?</a></p>
                </div>
            </div>
            <div class="col-lg-1 col-sm-12 col-md-1  mt-5" id="login-img">
            </div>
        </div>
    </div>




</body>

</html>