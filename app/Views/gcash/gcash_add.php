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
                <h1 class="h3 mb-3"><strong>Gcash</strong></h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Create New Gcash</h5>
                            </div>
                            
                            <div class="card-body">
                                <?php
                        // The required first parameter contains the fields name. name=""
                        // The optional second parameter contains the fields label text. <label>
                        // The optional third parameter contains a default value. 
                        // The optional fourth parameter contains the fields ID. id=""
                        // The optional fifth parameter contains a string, which lets you add CSS, JavaScript, etc.
                        // The optional sixth parameter utilizes Bootstraps .form-text block-level text.
                        // The optional seventh parameter contains a default value.
                        // The required eight parameter contains an array of options to populate the menu.

                        $form->open_multipart("","","/add-gcash","","");
								$form->hidden("g_id","g_id","","g_id","","","","");
								$form->number("number","number","","number","","","","");
								$form->text("first_name","first_name","","first_name","","","","");
								$form->text("last_name","last_name","","last_name","","","","");

                            $form->submit_button("Add New Gcash");
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
    