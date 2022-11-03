<?php

$this->extend("layout/main");
$this->section("body");

$form = new Formr\Formr("bootstrap");

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
                        <a href="<?= base_url(); ?>/account" class="btn btn-dark btn-sm">Go Back</a>
                        <h1 class="h3 mb-3"><strong>Edit Account</strong></h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Edit Account</h5>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $form->open_multipart("", "", "/update-account/" . $account["id"], "", "");
                                        $form->hidden("id", "id", $account["id"], "", "", "");
                                        $form->email("email", "email", $account["email"], "", "", "");
                                        $form->text("password", "password", $account["password"], "", "", "");
                                        $form->text("fullname", "fullname", $account["fullname"], "", "", "");
                                        $form->number("contact", "contact", $account["contact"], "", "", "");
                                        $role1 = [
                                            'Administrator' => 'Administrator',
                                            'Employee' => 'Employee'
                                        ];
                                        $form->select("role", "role", $account["role"], "", "", "", "", $role1);

                                        $form->submit_button("Update Account");
                                        $form->close();
                                        ?>
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