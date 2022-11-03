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
                                <a href="/create-account" class="btn btn-primary mb-2">Create New Account</a>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">ACCOUNT LIST</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>email</th>
                                                        <th>fullname</th>
                                                        <th>contact</th>
                                                        <th>role</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Account as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["email"] ?></td>
                                                            <td><?= $value["fullname"] ?></td>
                                                            <td><?= $value["contact"] ?></td>
                                                            <td><?= $value["role"] ?></td>
                                                            <?php if ($value["status"] == "Active") : ?>
                                                                <td class="text-primary">
                                                                    Active
                                                                </td>
                                                            <?php else : ?>
                                                                <td class="text-danger">
                                                                    Not active
                                                                </td>
                                                            <?php endif; ?>
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