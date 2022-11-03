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
                                                        <th>name</th>
                                                        <th>Status</th>
                                                        <!-- <th>6Hrs</th>
                                                        <th>12Hrs</th>
                                                        <th>24Hrs</th> -->
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Rooms as $key => $value) : ?>

                                                        <?php for ($i = 0; $i < $value['num_rls']; $i++) : ?>
                                                            <tr>
                                                                <td><?= $value["rls_name"] . " " . $i + 1  ?></td>
                                                                <td><?= $value["status"] ?></td>
                                                                <td>
                                                                    <button id="btn_available" data-r_id="<?= $value['r_id'] ?>" data-d_id="<?= $value['rls_id'] ?>" class="btn btn-primary">Available</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('table').on('click', '#btn_available', function() {

            var d_id = $(this).data('d_id');
            var r_id = $(this).data('r_id');

            $.post("/available", {
                    d_id: d_id,
                    r_id: r_id,
                },
                function(data, status) {
                    location.href = '/room-subs';
                });
        })
    </script>
    <?= $this->endSection(); ?>