<?php

get_header('add-student');
?>

<div onclick="barDisappear()" class="container" id="">
    <nav class="navbar navbar-light nav-bar-custom pb-0">
        <div class="nav nav-tabs justify-content-center mx-auto" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-people-tab" data-toggle="tab" href="#nav-people" role="tab" aria-controls="nav-people" aria-selected="true"><i class="fas fa-user-plus fa-lg mr-2"></i> Add students manually</a>
            <a class="nav-item nav-link" id="nav-checkpresent-tab" data-toggle="tab" href="#nav-checkpresent" role="tab" aria-controls="nav-checkpresent" aria-selected="false"><i class="fas fa-file-csv fa-lg mr-2"></i> Add students by csv file</a>

        </div>
    </nav>
    <div class="tab-content mt-5" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-people" role="tabpanel" aria-labelledby="nav-people-tab">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2" id="add-student-thumb">
                    <img src="public/images/add-student.png" class="img-fluid" alt="">
                </div>
                <div class=" col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div id="add-student-manually" class="bg-white ml-5 rounded-lg w-75 p-0 mt-5">

                        <form action="" class="form-group " enctype="multipart/form-data" method="post">
                            <h1 class="text-center text-pink mb-3">Add students manually</h1>

                            <div class="form-row">
                                <div class="form-group col-lg-7 col-md-12 col-sm-12">
                                    <label for="last_name" class="form-label text-pink">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" placeholder="Lastname" class="border-pink form-control" value="<?php echo set_value('last_name') ?>">
                                    <?php echo form_error('last_name'); ?>
                                </div>
                                <div class="form-group col-lg-5 col-md-12 col-sm-12">
                                    <label for="first_name" class="form-label text-pink">First name</label>
                                    <input type="text" name="first_name" id="first_name" placeholder="Firstname" class="border-pink form-control" value="<?php echo set_value('first_name') ?>">

                                    <?php echo form_error('first_name'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="student_id" class="form-label text-pink ">Student ID</label>
                                <input type="text" name="student_id" id="student_id" placeholder="Student ID" class="border-pink form-control" value="<?php echo set_value('student_id') ?>">
                                <?php echo form_error('student_id'); ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label text-pink ">Email</label>
                                <input type="text" name="email" id="email" placeholder="Email" class="border-pink form-control" value="<?php echo set_value('email') ?>">
                                <?php echo form_error('email'); ?>
                            </div>



                            <input type="submit" class="btn btn-block rounded-pill btn-pink mt-0 mb-3" value="Add Student" name="btn-add-student">
                            <?php echo form_error('add_student'); ?>

                        </form>

                        <?php
                        global $is_add_student;
                        if ($is_add_student == 1) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Add student successfully! <a class="text-pink font-weight-bold" href="?mod=class&action=index&classid=<?php echo $_GET['classid'] ?>"> Click here</a> to return your class
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>


                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="nav-checkpresent" role="tabpanel" aria-labelledby="nav-checkpresent-tab">
            <div class="row">

                <div class=" col-lg-6 col-md-12 col-sm-12 col-12 ">
                    <div id="add-student-csv" class="bg-white ml-5 rounded-lg w-75 p-0 mt-5">

                        <form action="" class="form-group  pl-5" enctype="multipart/form-data" method="post">
                            <h2 class="text-center text-pink mb-3 w-75">Add list students </h2>




                            <div class="form-group custom-file mb-4 w-75">
                                <label for="csv_file" class="form-label text-pink custom-file-label ">Import a csv file</label>
                                <input type="file" class="form-control-file border-pink mt-1 rounded-lg custom-file-input " name="csv_file" id="csv_file">
                                <?php echo form_error('csv_file'); ?>
                            </div>





                            <input type="submit" class="btn  rounded-pill btn-pink mt-0 mb-3" value="Add Students" name="btn-add-student-csv">
                            <?php echo form_error('add_student_csv'); ?>

                        </form>

                        <?php
                        global $is_add_student;
                        if ($is_add_student == 1) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Add student successfully! <a class="text-pink font-weight-bold" href="?mod=class&action=index&classid=<?php echo $_GET['classid'] ?>"> Click here</a> to return your class
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php
                        }
                        ?>


                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2" id="add-student-thumb">
                    <img src="public/images/add-student-csv.png" class="img-fluid" alt="">
                </div>

            </div>

        </div>

    </div>

</div>



<?php

get_footer();
?>