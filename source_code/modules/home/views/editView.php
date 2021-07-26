<?php

get_header('add-course');
?>


<div onclick="barDisappear()" class="container ">
    <div class="row">
        <?php $class = get_class_by_id() ?>
        <div class=" col-lg-6 col-md-12 col-sm-12 col-12 pr-0">
            <div id="add-course" class="bg-white rounded-lg w-75 p-0 mt-5 pr-3">

                <form action="" class="form-group " enctype="multipart/form-data" method="post">
                    <h1 class="text-center text-pink mb-3">Edit course</h1>

                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="subject" class="form-label text-pink">Subject</label>
                            <input type="text" name="subject" id="subject" placeholder="Subject" class="border-pink form-control" value="<?php echo $class['subject']; ?>">

                            <?php echo form_error('subject'); ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="class_name" class="form-label text-pink">Class name</label>
                            <input type="text" name="class_name" id="class_name" placeholder="Class name" class="border-pink form-control" value="<?php echo $class['class_name']; ?>">

                            <?php echo form_error('class_name'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room" class="form-label text-pink ">Room</label>
                        <input type="text" name="room" id="room" placeholder="Room" class="border-pink form-control" value="<?php echo $class['room']; ?>">

                        <?php echo form_error('room'); ?>

                    </div>


                    <div class="form-row mb-0">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="total_period" class="form-label text-pink">Total period</label>
                                <input type="text" name="total_period" id="total_period" placeholder="Total period" class="border-pink form-control" value="<?php echo $class['total_period']; ?>">
                                <?php echo form_error('total_period'); ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="class-img">Class image</label>
                                <input type="file" class="form-control-file border-pink mt-1 rounded-lg" name="class_img" id="class-img" value="<?php echo "c:/hihi.jpg" ?>">
                                <?php echo form_error('class_img'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block rounded-pill btn-pink mt-0 mb-3" value="Update Course" name="btn-update-course">


                </form>
                <?php
                global $is_update;
                if ($is_update == 1 ) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Edit course successfully! <a class="text-pink font-weight-bold" href="<?php if($_SESSION['user_role'] =='teacher'){echo '?';}else{echo '?mod=home&action=admin';} ?>"> Click here</a> to return home page
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php
                }
                ?>
                

            </div>
        </div>

        <div class="col-lg-6 col-md-12 col-12 mt-3" id="add-course-thumb">
            <img src="public/images/edit-course.png" class="img-fluid" alt="">
        </div>


    </div>
</div>



<?php

get_footer();
?>