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

    <title>Khôi Phục Mật Khẩu</title>
</head>

<body class=" p-5">

    <div class="container">

        <div class="row">
        <div class="col-md-6 col-sm-12  mt-5 pr-0">
                <div id="wp-reset" class="bg-white rounded-lg mt-5 ml-5 p-0">
                    <h1 class="text-center mb-4 mt-5">Reset Password</h1>

                    <form action="" class="form-group " method="post" id="login">
                        <div class="form-group">
                            <label for="email" class="text-pink form-label">Email</label>

                            <input type="text" name="email" id="email" placeholder="Email" class="form-control  border-pink" >
                            <?php echo form_error('email'); ?>
                        </div>

                        
                        

                        <button class="btn btn-pink btn-block mt-4 rounded-pill" name="btn-reset">Send Request</button>
                    </form>

                    <p  class="text-center mt-2 mb-0 p-0"><a href="?mod=users&action=login" class="text-pink text-decoration-underline">Login</a> | <a href="?mod=users&action=reg" class="text-pink text-decoration-underline">Sign up</a></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 pl-0 pr-5 mt-5" id="reset-img">
                <img class="img-fluid" src="public/images/reset-pass.png" alt="">
            </div>
            
        </div>
    </div>

</body>

</html> 

