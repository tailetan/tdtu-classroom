<?php

get_header('in-class');
?>

<div onclick="barDisappear()" class="container " id="lesson">
    <div class="row mt-4">
        <div class="col-lg-10">
            <h2 class="">Buổi <?php echo $_GET['buoi'] ?> - <?php echo $lesson['room'] ?> - <?php echo $lesson['date_study'] ?> - Tiết 1-3 (<?php echo $lesson['num_of_period'] ?> tiết)</h2>

        </div>
        <div class="col-lg-2">
            <a class="return-class" href="?mod=class&action=index&classid=<?= $_GET['classid'] ?>"><i class="fas fa-arrow-left"></i> Return your class</a>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-7 col-6 pb-2">
            <h2 class="mt-3">Check attendance</h2>
        </div>
        <div onClick="window.location.reload();" class="col-lg-2 col-md-4 col-sm-5 col-6 pt-4">
            Total students: <?php echo get_num_row_students() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php if (!empty($list_students)) {
            ?>
                <form action="" method="post" class="">
                    <table class="table table-pink overflow-auto mb-1">
                        <thead class="">
                            <tr>
                                <th scope="col" class="th11">No</th>
                                <th scope="col" class="th22">Full Name</th>
                                <th scope="col" class="th33">Student ID</th>
                                <th scope="col" class="th44">Email</th>
                                <th scope="col" class="th55 pr-0">Present</th>
                                <th scope="col" class="th66 pl-0">Absent</th>


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
                                        <td><?php echo  $student['student_id'] ?>
                                            <input type="hidden" name="list_id[]" value="<?= $student['id'] ?>">
                                        </td>
                                        <td><?php echo $student['email'] ?></td>
                                        <td class=" mx-5">
                                            <label class="radio-container">
                                                <input type="radio" name="attendance[<?php echo  $student['id'] ?>]" value="1" <?php if (isset($_POST["attendance"]) && $_POST["attendance"][$student['id']] == '1') echo 'checked="checked" '; ?>>
                                                <span class="radio-checkmark"></span></span>
                                            </label>

                                        </td>
                                        <td class=" ">
                                            <label class="radio-container">
                                                <input type="radio" name="attendance[<?php echo  $student['id'] ?>]" value="0" <?php if (isset($_POST["attendance"]) && $_POST["attendance"][$student['id']] == '1'){echo ''; }else{echo 'checked="checked" ';} ?>>
                                                <span class="radio-checkmark"></span>
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
                        <input type="submit" class="btn-pink px-5 py-2 rounded-lg mb-5 " name="btn-attendance" value="Mark attendance">

                    </div>
                    <?php
                    global $is_check_attendance;
                    if ($is_check_attendance == 1) { ?>
                        <div class="alert alert-success alert-dismissible fade show text-center w-50" role="alert">
                            <h4 class="mb-0">Check attendance successfully!</h4>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                    <?php
                    }
                    ?>
                </form>

            <?php
            }
            ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-10 col-md-7 col-sm-7 col-6 pb-2">
            <h2 class="mt-3">Student absent list</h2>
        </div>
        <div class="col-lg-2 col-md-5 col-sm-5 col-6 pt-4">
            Students absent: <?php echo get_num_row_students_absent() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 overflow-auto" class="table-absent">
            <?php if (!empty($list_student_absent)) {
            ?>
                <table class="table table-pink ">
                    <thead class="">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp_absent = 0;
                        foreach ($list_student_absent as $student_absent) {
                            $temp_absent++;
                        ?>
                            <tr>
                                <th scope="row"><?php echo $temp_absent ?></th>
                                <td><?php echo $student_absent['last_name'] . " " . $student_absent['first_name'] ?></td>
                                <td><?php echo  $student_absent['student_id'] ?></td>
                                <td><?php echo $student_absent['email'] ?></td>
                                <td>Absent</td>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            <?php
            }
            ?>

        </div>

    </div>
</div>

<?php

get_footer();
?>