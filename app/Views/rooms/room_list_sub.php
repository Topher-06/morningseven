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
                                <a href="/create-rooms" class="btn btn-primary mb-2">Create New Rooms</a>
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">ROOMS LIST</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Picture</th>
                                                        <th>Category</th>
                                                        <th>Type</th>
                                                        <th>Capacity</th>
                                                        <!-- <th>6Hrs</th>
                                                        <th>12Hrs</th>
                                                        <th>24Hrs</th> -->
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Rooms as $key => $value) : ?>

                                                        <?php for ($i = 0; $i < $value['Room_Count']; $i++) : ?>
                                                            <tr>
                                                                <td><img src="uploads/<?= $value["Picture"] ?>" height="100" width="100" alt=""></td>
                                                                <td><?= $value["Category"] ?></td>
                                                                <td><?= $value["Type"] . " " . $i + 1 ?></td>
                                                                <td><?= $value["Capacity"] ?></td>
                                                                <td>
                                                                    <button >Maintenance</button>
                                                                    <button>Available</button>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>


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
    
    <script>
        $("table").on('click', '#btn_maintenance', function() {
            var r_id = $(this).data('r_id');
            var name = $(this).data('name');
            $.post("/maintenance", {
                    r_id: r_id,
                    name: name,
                    status: 'Maintenance'
                },
                function(data, status) {
                    location.href = '/room-sub';
                });
        })
    </script>


    <?= $this->endSection(); ?>