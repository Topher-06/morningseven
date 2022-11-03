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
                <a href="<?= base_url();?>/events" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Events</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Events</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-events/".$events["e_id"],"","");
								$form->hidden("e_id","e_id",$events["e_id"],"","","");
								$form->file("e_image","e_image",$events["e_image"],"","","");
								$form->date("e_date","e_date",$events["e_date"],"","","");
								$form->text("e_title","e_title",$events["e_title"],"","","");

                            $form->submit_button("Update Events");
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
    