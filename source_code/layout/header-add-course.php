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
    <link rel="icon" href="public/images/logotab.png">

    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <script defer src="https://pro.fontawesome.com/releases/v5.10.0/js/all.js" integrity="sha384-G/ZR3ntz68JZrH4pfPJyRbjW+c0+ojii5f+GYiYwldYU69A+Ejat6yIfLSxljXxD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="shortcut icon" href="#">

    <title>Classroom</title>

</head>


<body>
    <!-- Vertical navbar -->
    <div class=" vertical-nav bg-white" id="sidebar">
        <div class=" py-4 px-3 mb-4 bg-light position-relative" id="sidebar-header">
            <div class="media d-flex align-items-center">
                <div onclick="barDisappear()" class="sidebar-close position-absolute">
                    <i class="fas fa-times fa-2x "></i>
                </div>
                <div class="media-body">
                    <h6 class="font-weight-light text-pink mb-2">Welcome</h6>
                    <h4 class="m-0 text-capitalize"><?php if (is_login()) echo user_infor('fullname'); ?></h4>
                    <h6 class="mt-2"><i class="far fa-envelope mr-2"></i><?php if (is_login()) echo user_infor('email'); ?></h6>
                    <h6 class="mt-2"><i class="fas fa-briefcase mr-2"></i><?php if (is_login()) echo user_infor('department'); ?></h6>

                </div>
            </div>
        </div>




        <form class=" mb-3  search-course-sidebar d-none">
            <input class="form-control border-pink  rounded-pill  " type="search" name="search-value" placeholder="Search Course" name="btn-search-course">
            <button class="btn btn-outline-search rounded-pill my-2  ml-2" name="btn-search" type="submit">Search</button>
        </form>



        <h5 class="text-center ">
            <a class=" text-center text-pink" href="<?php if ($_SESSION['user_role'] == 'teacher') {
                                                        echo '?';
                                                    } else {
                                                        echo '?mod=home&action=admin';
                                                    } ?>">
                <i class="fas fa-home mr-2"></i>Return Home Page
            </a>
        </h5>



        <h5 class="log-out-sidebar text-center font-weight-light mt-3 d-none">
            <a class=" text-center text-pink" href="?mod=users&action=logout">Log out
                <i class="fas fa-sign-out-alt ml-2"></i>
            </a>
        </h5>
    </div>
    <!-- End vertical navbar -->


    <!-- Page content holder -->


    <div class="page-content py-3 pl-5 pr-3 bg-pink position-relative" id="header">
        <!-- Toggle button -->
        <div id="sidebarCollapse" onclick="barAppear()" type="button" class="btn btn-lg btn-light bg-white rounded-circle shadow-sm "><i class="text-pink fas fa-bars"></i> </i></div>
        <a class="d-inline text-pink ml-5 mt-2 mr-3 position-absolute" href="<?php if ($_SESSION['user_role'] == 'teacher') {
                                                                                    echo '?';
                                                                                } else {
                                                                                    echo '?mod=home&action=admin';
                                                                                } ?>" id="main-logo">

            <img src="public/images/logo-classroom.png" class="img-fluid" alt="Logo classroom">
        </a>

        <!-- Search bar -->
        <form class="form-inline position-absolute" id="search-course" method="GET">
            <input class="form-control border-pink rounded-pill mr-sm-2" name="search-value" type="search" placeholder="Search Course">
            <button class="btn btn-outline-search rounded-circle my-2 my-sm-0" name="btn-search" type="submit"><i class="fas fa-search"></i></button>
        </form>
        <!-- User infor -->
        <a class="nav-link dropdown-toggle position-absolute" href="#" id="user-heading" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-user-circle fa-2x"></i>
            <h4 class="d-inline mx-1 text-capitalize"><?php if (is_login()) echo user_infor('fullname'); ?> </h4>
            <i class="fas fa-chevron-down "></i>
        </a>
        <h2 class="dropdown-menu ">

            <!-- <div class="dropdown-divider"></div> -->
            <a class="dropdown-item text-center" href="?mod=users&action=logout">Log out<i class="fas fa-sign-out-alt ml-2"></i></a>
        </h2>


    </div>