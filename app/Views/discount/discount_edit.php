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
                <a href="<?= base_url();?>/discount" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Discount</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Discount</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-discount/".$discount["id"],"","");
								$form->hidden("d_id","d_id",$discount["d_id"],"","","");
								$form->text("Discount_Code","Discount_Code",$discount["Discount_Code"],"","","");
								$form->text("Discount_Amount","Discount_Amount",$discount["Discount_Amount"],"","","");
								$form->date("Date_From","Date_From",$discount["Date_From"],"","","");
								$form->date("Date_To","Date_To",$discount["Date_To"],"","","");

                            $form->submit_button("Update Discount");
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
    