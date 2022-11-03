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
                    <?php if(session()->getFlashData("success")): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashData("success"); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php endif; ?>
                    <a href="/create-events" class="btn btn-primary mb-2">Create New Events</a>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">EVENTS LIST</h5>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dataTable_2">
                                <thead class="thead-light">
                                    <tr>
									<th>image</th>
									<th>date</th>
									<th>title</th>
									<th>Actions</th>
								</tr>
                                </thead>
                                <tbody>
                                    <?php foreach($Events as $key => $value): ?>
                                    <tr>
											<td><img src="uploads/<?= $value["e_image"] ?>" height="100" width="100" alt="" srcset=""></td>
											<td><?= $value["e_date"] ?></td>
											<td><?= $value["e_title"] ?></td>

                                        <td>
                                            <a href="/edit-events/<?=$value["e_id"];?>"
                                                class="btn btn-success btn-sm edit text-white"
                                                data-id=<?=$value["e_id"];?>><i
                                                class="mdi mdi-pencil-box-outline"></i>Edit</a>
                                            <a href="/delete-events/<?=$value["e_id"];?>"
                                                class="btn btn-danger btn-sm delete" data-id=<?=$value["e_id"];?>><i
                                                class="mdi mdi-trash-can-outline"></i>Delete</a>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
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

