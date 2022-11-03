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
                                <!-- <a href="/create-carousel_pic" class="btn btn-primary mb-2">Create New Carousel_pic</a> -->
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
                                                        <th>Room Picture</th>
                                                        <th>Book Id</th>
                                                        <th>Check In</th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Contact Number</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Zip Code</th>
                                                        <th>SubTotal</th>
                                                        <th>Tax</th>
                                                        <th>Payment</th>
                                                        <!-- <th>w_senior_discount</th> -->
                                                        <!-- <th>w_pricePerson</th>
                                                        <th>w_seniorNum</th>
                                                        <th>w_personNum</th> -->
                                                        <th>Valid Id Number</th>

                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($walkins as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["w_id"] ?></td>
                                                            <td><img src="uploads/<?= $value["Picture"] ?>" height="100" width="100" alt=""></td>
                                                            <td><?= $value["w_book_id"] ?></td>
                                                            <td><?= $value["w_check_in"] ?></td>
                                                            <td><?= $value["w_first_name"] ?></td>
                                                            <td><?= $value["w_last_name"] ?></td>
                                                            <td><?= $value["w_number"] ?></td>
                                                            <td><?= $value["w_email"] ?></td>
                                                            <td><?= $value["w_address"] ?></td>
                                                            <td><?= $value["w_zip_code"] ?></td>
                                                            <td><?= $value["w_subtotal"] ?></td>
                                                            <td><?= $value["w_tax"] ?></td>
                                                            <td><?= $value["w_all_total"] ?></td>
                                                            
                                                            
                                                            <td><?= $value["w_valid_id_number"] ?></td>
                                                            <td>
                                                                <a href="/delete-carousel_pic/<?= $value["w_id"]; ?>" class="btn btn-danger btn-sm delete" data-id=<?= $value["w_id"]; ?>><i class="mdi mdi-trash-can-outline"></i>Delete</a>
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