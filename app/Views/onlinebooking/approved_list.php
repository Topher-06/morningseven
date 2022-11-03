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
                                        <h5 class="card-title mb-0">BOOKING APPROVED LIST</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Book Id</th>
                                                        <th>First name</th>
                                                        <th>Last name</th>
                                                        <th>Contact Number</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Check In</th>
                                                        <th>No of hours</th>
                                                        <th>Promo Code</th>
                                                        <th>Zip Code</th>
                                                        <th>Payment Status</th>
                                                        <!-- <th>Actions</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyBooking">
                                                    <?php foreach ($bookings as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["book_id"] ?></td>
                                                            <td><?= $value["first_name"] ?></td>
                                                            <td><?= $value["last_name"] ?></td>
                                                            <td><?= $value["number"] ?></td>
                                                            <td><?= $value["email"] ?></td>
                                                            <td><?= $value["address"] ?></td>
                                                            <td><?= $value["check_in"] ?></td>
                                                            <td><?= $value["no_of_hours"] ?></td>
                                                            <td><?= $value["promo_code"] ?></td>
                                                            <td><?= $value["zip_code"] ?></td>
                                                            <td>
                                                                <?php if ($value["total_downpayment_required"] >= $value["all_total"]) : ?>
                                                                    <span class="badge badge-pill badge-success">Fully Paid</span>
                                                                <?php else : ?>
                                                                    <span class="badge badge-pill badge-danger">Not Fully Paid</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <!-- <td>
                                                                <button class="btn btn-sm btn-success" data-id=<?= $value["id"]; ?> id="showDetails"><i class="mdi mdi-pencil-box-outline"></i>View</button>

                                                            </td> -->
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