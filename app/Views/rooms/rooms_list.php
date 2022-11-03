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
                                                        <th>r_id</th>
                                                        <th>Picture</th>
                                                        <th>Category</th>
                                                        <th>Type</th>
                                                        <th>Capacity</th>
                                                        <th>Room_Count</th>
                                                        <th>6Hrs</th>
                                                        <th>12Hrs</th>
                                                        <th>24Hrs</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($Rooms as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["r_id"] ?></td>
                                                            <td><img src="uploads/<?= $value["Picture"] ?>" height="100" width="100" alt=""></td>
                                                            <td><?= $value["Category"] ?></td>
                                                            <td><?= $value["Type"] ?></td>
                                                            <td><?= $value["Capacity"] ?></td>
                                                            <td><?= $value["Room_Count"] ?></td>
                                                            <td><?= $value["Price"] ?></td>
                                                            <td><?= $value["Price2"] ?></td>
                                                            <td><?= $value["Price3"] ?></td>

                                                            <td>
                                                                <a href="/edit-rooms/<?= $value["r_id"]; ?>" class="btn btn-success btn-sm edit text-white" data-id=<?= $value["r_id"]; ?>><i class="mdi mdi-pencil-box-outline"></i>Edit</a>
                                                                <a href="/delete-rooms/<?= $value["r_id"]; ?>" class="btn btn-danger btn-sm delete" data-id=<?= $value["r_id"]; ?>><i class="mdi mdi-trash-can-outline"></i>Delete</a>

                                                                <select name="actionM" data-r_id="<?= $value['r_id'] ?>" data-name="<?= $value["Type"] ?>" class="btn btn-sm btn-primary" id="actionM">
                                                                    <option>Select</option>
                                                                    <option value="Maintenance">Maintenance</option>
                                                                    <option value="Occupied">Occupied</option>
                                                                </select>
                                                            </td>
                                                        </tr>
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
        $('#actionM').on('change', function() {

            var r_id = $(this).data('r_id');
            var name = $(this).data('name');


            if ($(this).val() == 'Maintenance') {
                $.post("/moc", {
                        r_id: r_id,
                        name: name,
                        status: 'Maintenance'
                    },
                    function(data, status) {
                        location.href = '/room-subs';
                    });
            } else if ($(this).val() == 'Occupied') {
                $.post("/moc", {
                        r_id: r_id,
                        name: name,
                        status: 'Occupied'
                    },
                    function(data, status) {
                        location.href = '/room-subs';
                    });
            }

        })
        // $("table").on('click', '#btn_maintenance', function() {


        // })
        // $("table").on('click', '#btn_occ', function() {
        //     var r_id = $(this).data('r_id');
        //     var name = $(this).data('name');

        // })
    </script>
    <?= $this->endSection(); ?>