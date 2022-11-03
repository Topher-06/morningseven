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
                <a href="<?= base_url();?>/extras" class="btn btn-dark btn-sm">Go Back</a>
                <h1 class="h3 mb-3"><strong>Edit Extras</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Extras</h5>
                            </div>
                            <div class="card-body">
                                <?php
                        $form->open_multipart("","","/update-extras/".$extras["e_id"],"","");
								$form->hidden("e_id","e_id",$extras["e_id"],"","","");
								$form->text("Items","Items",$extras["Items"],"","","");
								$form->text("Price","Price",$extras["Price"],"","","");
								$form->text("Quantity","Quantity",$extras["Quantity"],"","","");
								$form->checkbox("Status","Status",$extras["Status"],"","","");

                            $form->submit_button("Update Extras");
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
    