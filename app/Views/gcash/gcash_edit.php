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
                <a href="<?= base_url();?>/gcash" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Gcash</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Gcash</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-gcash/".$gcash["g_id"],"","");
								$form->hidden("g_id","g_id",$gcash["g_id"],"","","");
								$form->number("number","number",$gcash["number"],"","","");
								$form->text("first_name","first_name",$gcash["first_name"],"","","");
								$form->text("last_name","last_name",$gcash["last_name"],"","","");

                            $form->submit_button("Update Gcash");
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
    