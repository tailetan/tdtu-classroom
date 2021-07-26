<?php

get_header();
?>


<div onclick="barDisappear()" class="container">
    <!-- CREATE A COUSE -->

    <div class="row mt-3">

        <div class="col-md-12  ">
            <div class="row">
                <a href="?mod=home&action=add" class="text-center col-md-3 mx-3 mt-2" id="create-course">
                    <h4 class="my-0 ">
                        <i class="fas fa-plus"></i> Create a course
                    </h4>
                </a>
            </div>
        </div>

        <!-- END CREATE A COUSE -->
        <?php
        foreach ($list_class as $class) {
        ?>
        
            <div class="col-lg-4 col-md-6 col-12 mt-4 class-item">
                <div class="card-deck">
                    <div class="card">
                        <div class="card-header p-0">
                            <img class="card-img img-thumbnail p-0" src="<?php echo $class['class_img'] ?>" alt="">
                            <div class="card-img-overlay">
                                <a href="?mod=class&action=index&classid=<?php echo $class['class_id'] ?>"  rel="noopener noreferrer">
                                    <h2 class="card-title text-white m-0" id="class-name"><?php echo $class['subject'] ?></h2>
                                    <p class="card-text text-white">Lecturer: <?php echo user_infor('fullname'); ?></p>
                                </a>
                                <p class="card-text text-white"> Room: <?php echo $class['room'] ?> - Total periods: <?php echo $class['total_period'] ?></p>
                            </div>
                        </div>
                        <div class="card-body " id="card-course">
                            <div id="card-content"></div>
                        </div>
                        <div class="card-footer ">
                            <div class="action float-right">
                                <a href="?mod=home&action=edit&id=<?php echo $class['class_id'] ?>" class="btn btn-edit mr-3">Edit</a>
                                <!-- Delete -->
                                <a href="?mod=home&action=delete&id=<?php echo $class['class_id'] ?>" class="btn btn-delete ">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php

        }
        ?>
  
    </div>
    <?php #show_array($_SESSION)?>

</div>



<?php

get_footer();
?>