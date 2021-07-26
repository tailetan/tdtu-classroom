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

    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">

    <title>Mật khẩu mới</title>
</head>

<body class=" p-5">

    <div class="container">

        <div class="row">
            <div class="col-md-6 col-sm-12 mt-5" id="newpass-img">
                <img class="img-fluid" src="public/images/newpass.png" alt="">
            </div>
            <div class="col-md-6 col-sm-12">
                <div id="wp-newpass" class="bg-white rounded-lg mt-5 mb-3 p-4">
                    <h2 class="text-center display-5">Enter new password</h2>

                    <form action="" class="form-group " method="post" id="new-pass">
                        

                        <div class="form-group">
                            <label for="password" class="text-pink form-label">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control border-pink">
                            <?php echo form_error('password'); ?>
                        </div>
                        <?php echo form_error('login'); ?>


                        <button class="btn btn-pink btn-block mt-4 rounded-pill" name="btn-new-pass">Lưu mật khẩu</button>
                    </form>


                </div>
            </div>

        </div>
    </div>




</body>

</html>