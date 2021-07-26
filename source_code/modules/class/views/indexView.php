<?php

get_header('in-class');
?>

<div onclick="barDisappear()" class="container" id="in-class">
    <nav class="navbar navbar-light nav-bar-custom pb-0">
        <div class="nav nav-tabs justify-content-center mx-auto" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-people-tab" data-toggle="tab" href="#nav-people" role="tab" aria-controls="nav-people" aria-selected="true"><i class="fas fa-users"></i> People</a>
            <a class="nav-item nav-link" id="nav-checkpresent-tab" data-toggle="tab" href="#nav-checkpresent" role="tab" aria-controls="nav-checkpresent" aria-selected="false"><i class="fas fa-chalkboard-teacher"></i> Lessons</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-percentage"></i> Statistics</a>
        </div>
    </nav>

    <div class="tab-content mt-4" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-people" role="tabpanel" aria-labelledby="nav-people-tab">
            <div class="card img-fluid class-cover-photo mt-4">
                <img class="card-img-top" src="<?= $current_class['class_img'] ?>" alt="Card image" style="width:100%">
                <div class="card-img-overlay m-3">
                    <h1 class="text-FAD6E6"><?= $current_class['subject'] ?> - <?= $current_class['class_name'] ?></h1>
                    <h3 class="text-FAD6E6 mt-3">Lecturer: <?= $current_class['fullname'] ?> </h3>
                    <h3 class="text-FAD6E6 ">Room: <?= $current_class['room'] ?> - Total period: <?= $current_class['total_period'] ?> </h3>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12 col-md-12 " id="list-students">
                    <div class="row my-4 py-0" id="">
                        <div class="col-lg-9 col-md-7 col-sm-6 col-6">
                            <h3 class="text-901D57 font-weight-bold">List Students</h3>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-4 col-3 pt-2">
                            Total students: <?php echo get_num_row_students() ?>
                        </div>
                        <div class="col-lg-1 col-md-2 col-sm-2 col-3 pl-5">
                            <a href="?mod=class&action=addStudent&classid=<?php echo $_GET['classid'] ?>" data-toggle="tooltip" data-placement="bottom" title="Add students">
                                <i class="fas fa-user-plus fa-lg"></i>
                            </a>
                        </div>

                    </div>
                    <?php if (!empty($list_students)) {
                    ?>
                        <form action="" method="post" class="">
                            <table class="table table-pink mb-1">
                                <thead class="">
                                    <tr>
                                        <th scope="col" class="th1">No</th>
                                        <th scope="col" class="th2">Full Name</th>
                                        <th scope="col" class="th3">Student ID</th>
                                        <th scope="col" class="th4">Email</th>
                                        <th scope="col " class="th5 text-center">
                                            Delete
                                        </th>

                                    </tr>
                                </thead>
                            </table>
                            <div class="scroll-table-wp my-custom-scrollbar table-wrapper-scroll-y ">
                                <table class="table table-pink table-hover">

                                    <tbody class="">

                                        <?php
                                        $temp = 0;
                                        foreach ($list_students as $student) {
                                            $temp++; ?>
                                            <tr>
                                                <th scope="row"><?php echo $temp ?></th>
                                                <td><?php echo $student['last_name'] . " " . $student['first_name'] ?></td>
                                                <td><?php echo  $student['student_id'] ?></td>
                                                <td><?php echo $student['email'] ?></td>
                                                <td>

                                                    <label class="checkbox-container mb-0 text-center" for="<?php echo  $student['student_id'] ?>">
                                                        <input type="checkbox" id="<?php echo  $student['student_id'] ?>" name="delete[]" value="<?php echo  $student['student_id'] ?>">
                                                        <span class="checkmark"></span>
                                                    </label>


                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                            <div class="text-right mt-3">
                                <!-- <input type="submit" class="btn-pink px-5 py-2 rounded-lg mb-5 btn-delete-student" name="btn-delete-student" value="Delete" data-toggle="modal" data-target="#deleteStudent"> -->
                                <button type="button" class="btn-pink px-5 py-2 rounded-lg mb-5 btn-delete-student" data-toggle="modal" data-target="#deleteStudent">
                                    Delete
                                </button>
                            </div>
                            <div class="modalDelete modal fade" id="deleteStudent" tabindex="-1" role="dialog" aria-labelledby="deleteStudentLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-pink-light">
                                            <h5 class="modal-title font-weight-bold" id="deleteStudentLabel">Confirmation</h5>
                                            <input type="submit" class="close" value="&times;" name="btn-exist" id="btn-exist">


                                        </div>
                                        <div class="modal-body bg-pink-light">
                                            <h6 class="text-pink-strong">Are you sure you want to remove these students ?</h6>
                                        </div>
                                        <div class="modal-footer bg-pink-light">
                                            <input type="submit" class="btn btn-edit" name="btn-delete-student" value="Remove">
                                            <input type="submit" class="btn btn-delete" name="btn-cancel" value="Cancel">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="nav-checkpresent" role="tabpanel" aria-labelledby="nav-checkpresent-tab">
            <div class="row mt-3">
                <div class="col-md-12  ">
                    <div class="row ">
                        <a href="?mod=class&action=addLesson&classid=<?php echo $_GET['classid'] ?>" class="text-center col-md-3 mx-3 mt-2 mb-5" id="create-course">
                            <h4 class="my-0 ">
                                <i class="fas fa-calendar-plus fa-lg pb-1"></i> Create a lesson
                            </h4>
                        </a>
                    </div>

                    <h3 class="text-901D57 font-weight-bold mb-3">LESSONS</h3>

                    <?php
                    $temp1 = 0;
                    foreach ($list_lesson as $lesson) {
                        $temp1++;
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="?mod=lesson&action=index&classid=<?php echo $_GET['classid'] ?>&lessonid=<?php echo $lesson['lesson_id'] ?>&buoi=<?php echo $temp1 ?>" class="">
                                    <h2>Buổi <?php echo $temp1 ?> - <?php echo $lesson['room'] ?> - <?php echo $lesson['date_study'] ?> - Tiết 1-3 (<?php echo $lesson['num_of_period'] ?> tiết)</h2>
                                </a>
                            </div>

                        </div>
                    <?php
                    }
                    ?>

                    <!-- END CREATE A COUSE -->
                </div>

            </div>

        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <h3 class="text-901D57 font-weight-bold mb-3">List students banned</h3>
            <?php if (!empty($list_banned)) {
            ?>
                <table class="table table-pink table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Absent Proportion</th>
                        </tr>
                    </thead>
                    <?php
                    $temp2 = 0;
                    foreach ($list_banned as $student_banned) {
                        $temp2++
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $temp2 ?></th>
                                <td><?= $student_banned['full_name'] ?></td>
                                <td><?= $student_banned['student_id'] ?></td>
                                <td class="text-center"><?= $student_banned['percent_absent'] ?> %</td>
                            </tr>

                        </tbody>
                    <?php
                    } ?>

                </table>
            <?php
            }else{
                echo '<p class=""> No student has been banned yet!</p>';
            }
            ?>


        </div>


        <?php

        get_footer();
        ?>