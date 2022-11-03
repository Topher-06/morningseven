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
                <a href="<?= base_url();?>/rooms" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Rooms</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Rooms</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-rooms/".$rooms["r_id"],"","");
								$form->hidden("r_id","r_id",$rooms["r_id"],"","","");
								$form->file("Picture","Picture",$rooms["Picture"],"","","");
								$form->text("Category","Category",$rooms["Category"],"","","");
								$form->text("Type","Type",$rooms["Type"],"","","");
								$form->number("Capacity","Capacity",$rooms["Capacity"],"","","");
								$form->number("Room_Count","Room_Count",$rooms["Room_Count"],"","","");
								$form->text("Price","Price",$rooms["Price"],"","","");
                                $form->text("Price2","Price2",$rooms["Price2"],"","","");
                                $form->text("Price3","Price3",$rooms["Price3"],"","","");

                            $form->submit_button("Update Rooms");
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
    