<?php

get_header('add-student');
?>


<div onclick="barDisappear()" class="container ">
    <div class="row">
        <div class="col-md-6 col-sm-12 col-12 mt-2" id="add-lesson-thumb">
            <img src="public/images/add-lesson.png" class="img-fluid" alt="">
        </div>
        <div class=" col-md-6 col-sm-12 col-12 mt-4">
            <div id="add-lesson" class="bg-white rounded-lg  w-75 p-0 ml-5 mt-5">

                <form action="" class="form-group " enctype="multipart/form-data" method="post">
                    <h1 class="text-center text-pink mb-3">Add a lesson</h1>

                    <div class="form-row">
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="room" class="form-label text-pink ">Room</label>
                            <input type="text" name="room" id="room" placeholder="Room" class="border-pink form-control" value="<?php echo set_value('room') ?>">

                            <?php echo form_error('room'); ?>
                        </div>
                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                            <label for="num_of_period" class="form-label text-pink">Number of period</label>
                            <input type="text" name="num_of_period" id="num_of_period" placeholder="Number of period" class="border-pink form-control" value="<?php echo set_value('num_of_period') ?>">

                            <?php echo form_error('num_of_period'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date_study" class="form-label text-pink ">Date Study</label>
                        <input type="date" name="date_study" id="date_study" class="border-pink form-control" value="<?php echo set_value('date_study') ?>">

                        <?php echo form_error('date_study'); ?>

                    </div>



                    <input type="submit" class="btn btn-block rounded-pill btn-pink mt-0 mb-3" value="Add Lesson" name="btn-add-lesson">
                    <?php echo form_error('add_lesson'); ?>

                </form>
                <?php
                global $is_add_lesson;
                if ($is_add_lesson == 1) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Add lesson successfully! <a class="text-pink font-weight-bold" href="?mod=class&action=index&classid=<?php echo $_GET['classid'] ?>"> Click here</a> to return your class
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