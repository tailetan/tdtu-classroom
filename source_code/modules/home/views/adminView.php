<?php
get_header('admin');
?>

<div onclick="barDisappear()" class="container" id="admin-view">
    <nav class="navbar navbar-light nav-bar-custom pb-0">
        <div class="nav nav-tabs justify-content-center mx-auto" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-lecturers-tab" data-toggle="tab" href="#nav-lecturers" role="tab" aria-controls="nav-lecturers" aria-selected="true"><i class="fas fa-chalkboard-teacher"></i> List Lecturers</a>
            <a class="nav-item nav-link" id="nav-all-classes-tab" data-toggle="tab" href="#nav-all-classes" role="tab" aria-controls="nav-all-classes" aria-selected="false"><i class="fas fa-list-ul"></i> List classes</a>

        </div>
    </nav>
    <div class="tab-content " id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-lecturers" role="tabpanel" aria-labelledby="nav-lecturers-tab">
            <div class="row">
                <div class="col-lg-12 col-md-12 " id="list-students">
                    <div class="row my-4 py-0" id="">
                        <div class="col-lg-10 col-md-9 col-sm-8 col-8">
                            <h2 class="text-901D57 font-weight-bold">List Users</h2>
                        </div>
                        <div onClick="window.location.reload();" class="col-lg-2 col-md-3 col-sm-4 col-4 font-weight-bold text-901D57 pt-2 text-right">
                            Total users: <?php echo get_num_row_lecturers() ?>
                        </div>


                    </div>
                    <form action="" method="post" class="" id="table_all_teacher">
                        <?php if (!empty($list_all_users)) {
                        ?>
                            <table class="table table-pink table-hover overflow-auto">
                                <thead class="">
                                    <tr>
                                        <th scope="col" class="">No</th>
                                        <th scope="col" class="">Full Name</th>
                                        <th scope="col" class="">Email</th>
                                        <th scope="col" class="">Department</th>
                                        <th scope="col" class="">Role</th>
                                        <th scope="col" class="text-center">
                                            Add as an admin
                                        </th>

                                    </tr>
                                </thead>

                                <tbody class="">
                                    <?php
                                    $temp = 0;
                                    foreach ($list_all_users as $user) {
                                        $temp++
                                    ?>
                                        <tr>
                                            <th scope="row"><?= $temp ?></th>
                                            <td><?= $user['fullname'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['department'] ?></td>
                                            <td><?= $user['role'] ?></td>
                                            <td class="text-center">
                                                <button onClick="window.location.reload()" type="submit" class="btn btn-delete" name="btn-add-admin" value="<?= $user['user_id'] ?>" <?php if ($user['role'] == 'admin') echo 'disabled'; ?>>Add</button>

                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>



                                </tbody>
                            </table>

                        <?php
                        }
                        ?>



                    </form>
                </div>

            </div>
        </div>

        <div class="tab-pane fade mt-3" id="nav-all-classes" role="tabpanel" aria-labelledby="nav-all-classes-tab">
            <div class="row my-0 py-0" id="">
                <div class="col-lg-10 col-md-8 col-sm-7 col-6 ml-0">
                    <h2 class="text-901D57 font-weight-bold">List Classes</h2>
                </div>

                <div onClick="window.location.reload();" class="col-lg-2 col-md-4 col-sm-5 col-6 text-901D57 font-weight-bold pt-2 text-right">
                    Total classes: <?php echo $total_classes ?>
                </div>


            </div>

            <div class="row">
                <?php
                foreach ($list_all_class_per_page as $class_per_page) {
                ?>
                    <div class="col-lg-4 col-md-6 col-12 mt-4 class-item">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-header p-0">
                                    <img class="card-img img-thumbnail p-0" src="<?php echo $class_per_page['class_img'] ?>" alt="">
                                    <div class="card-img-overlay">
                                        <a href="?mod=class&action=index&classid=<?php echo $class_per_page['class_id'] ?>" rel="noopener noreferrer">
                                            <h2 class="card-title text-white m-0" id="class-name"><?php echo $class_per_page['subject'] ?></h2>
                                            <p class="card-text text-white">Lecturer: <?php echo $class_per_page['fullname']; ?></p>
                                        </a>
                                        <p class="card-text text-white"> Room: <?php echo $class_per_page['room'] ?> - Total periods: <?php echo $class_per_page['total_period'] ?></p>
                                    </div>
                                </div>
                                <div class="card-body " id="card-course">
                                    <div id="card-content"></div>
                                </div>
                                <div class="card-footer ">
                                    <div class="action float-right">
                                        <a href="?mod=home&action=edit&id=<?php echo $class_per_page['class_id'] ?>" class="btn btn-edit mr-3">Edit</a>
                                        <!-- Delete -->
                                        <a href="?mod=home&action=delete&id=<?php echo $class_per_page['class_id'] ?>" class="btn btn-delete ">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                <?php

                }
                ?>
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET["admin-search-value"])) {
                        $value = $_GET["admin-search-value"];
                        echo get_pagging($num_page, $page, "?admin-search-value={$value}&admin-btn-search=");
                    }else{
                        echo get_pagging($num_page, $page, "?mod=home&action=admin");
                    }
                    
                    ?>
                </div>
            </div>
        </div>

    </div>

</div>
<?php
get_footer();
?>