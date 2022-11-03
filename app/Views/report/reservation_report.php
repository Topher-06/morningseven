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
                                        <h5 class="card-title mb-0">Reservation Report</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Customer</th>
                                                        <th>Room</th>
                                                        <th>Reservation</th>
                                                        <th>Check-In</th>
                                                        <th>Check-Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Bookings as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["first_name"] . " " . $value["last_name"]; ?></td>
                                                            <td><?= $value["allRooms"]; ?></td>
                                                            <td><?= date('d/m/Y',strtotime($value["created_at"])); ?></td>
                                                            <td><?= date('d/m/Y',strtotime($value["check_in"])); ?></td>
                                                            <td><?= date('d/m/Y',strtotime($value["check_out"])); ?></td>
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