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
                <a href="<?= base_url();?>/carousel_pic" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Carousel_pic</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Carousel_pic</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-carousel_pic/".$carousel_pic["c_id"],"","");
								$form->hidden("c_id","c_id",$carousel_pic["c_id"],"","","");
								$form->file("c_picture","c_picture",$carousel_pic["c_picture"],"","","");

                            $form->submit_button("Update Carousel_pic");
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
    