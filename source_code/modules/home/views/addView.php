<?php

get_header('add-course');
?>


<div onclick="barDisappear()" class="container ">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12 mt-2" id="add-course-thumb">
            <img src="public/images/add-course.png" class="img-fluid" alt="">
        </div>
        <div class=" col-md-6 col-sm-12 col-12 ">
            <div id="add-course" class="bg-white rounded-lg w-75 p-0 mt-5">

                <form action="" class="form-group " enctype="multipart/form-data" method="post">
                    <h1 class="text-center text-pink mb-3">Add a new course</h1>

                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="subject" class="form-label text-pink">Subject</label>
                            <input type="text" name="subject" id="subject" placeholder="Subject" class="border-pink form-control" value="<?php echo set_value('subject')  ?>">

                            <?php echo form_error('subject'); ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="class_name" class="form-label text-pink">Class name</label>
                            <input type="text" name="class_name" id="class_name" placeholder="Class name" class="border-pink form-control" value="<?php echo set_value('class_name') ?>">

                            <?php echo form_error('class_name'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="room" class="form-label text-pink ">Room</label>
                        <input type="text" name="room" id="room" placeholder="Room" class="border-pink form-control" value="<?php echo set_value('room') ?>">

                        <?php echo form_error('room'); ?>

                    </div>
                    

                    <div class="form-row mb-0">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="total_period" class="form-label text-pink">Total period</label>
                                <input type="text" name="total_period" id="total_period" placeholder="Total period" class="border-pink form-control" value="<?php echo set_value('total_period') ?>">
                                <?php echo form_error('total_period'); ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="class-img ">Class image</label>
                                <input type="file" class="form-control-file border-pink mt-1 rounded-lg" name="class_img" id="class-img">
                                <?php echo form_error('class_img'); ?>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-block rounded-pill btn-pink mt-0 mb-3" value="Add Course" name="btn-add-course">
                    <?php echo form_error('add_course'); ?>

                </form>
                <?php
                global $subject,$room;
                if (course_exists($subject,$room)) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Add course successfully! <a class="text-pink font-weight-bold" href="?"> Click here</a> to return home page
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



<?php

get_footer();
?>