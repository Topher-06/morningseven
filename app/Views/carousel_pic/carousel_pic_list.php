<?php

$this->extend("layout/main");
$this->section("body")

?>


<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Start row -->
                <div class="row">
                    <!-- Start col -->
                    <div class="col-lg-12 col-xl-12">
                        <!-- Start row -->
                        <div class="row">
                            <div class="col-12">
                                <?php if (session()->getFlashData("success")) : ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?php echo session()->getFlashData("success"); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                <?php endif; ?>
                                <a href="/create-carousel_pic" class="btn btn-primary mb-2">Create New Carousel_pic</a>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">CAROUSEL_PIC LIST</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>c_id</th>
                                                        <th>c_picture</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Carousel_pic as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["c_id"] ?></td>
                                                            <td><img src="uploads/<?= $value["c_picture"] ?>" height="100" width="100" alt=""></td>
                                                            <td>
                                                                <a href="/edit-carousel_pic/<?= $value["c_id"]; ?>" class="btn btn-success btn-sm edit text-white" data-id=<?= $value["c_id"]; ?>><i class="mdi mdi-pencil-box-outline"></i>Edit</a>
                                                                <a href="/delete-carousel_pic/<?= $value["c_id"]; ?>" class="btn btn-danger btn-sm delete" data-id=<?= $value["c_id"]; ?>><i class="mdi mdi-trash-can-outline"></i>Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End col -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End col -->



    <?= $this->endSection(); ?>