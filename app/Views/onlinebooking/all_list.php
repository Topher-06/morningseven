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
                                <!-- <a href="/create-carousel_pic" class="btn btn-primary mb-2">Create New Carousel_pic</a> -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">BOOKING PEDING LIST</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="dataTable_2">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Book Id</th>
                                                        <th>First name</th>
                                                        <th>Last name</th>
                                                        <th>Contact Number</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Check In</th>
                                                        <th>No of hours</th>
                                                        <th>Promo Code</th>
                                                        <th>Zip Code</th>
                                                        <th>Payment Status</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbodyBooking">
                                                    <?php foreach ($bookings as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $value["book_id"] ?></td>
                                                            <td><?= $value["first_name"] ?></td>
                                                            <td><?= $value["last_name"] ?></td>
                                                            <td><?= $value["number"] ?></td>
                                                            <td><?= $value["email"] ?></td>
                                                            <td><?= $value["address"] ?></td>
                                                            <td><?= $value["check_in"] ?></td>
                                                            <td><?= $value["no_of_hours"] ?></td>
                                                            <td><?= $value["promo_code"] ?></td>
                                                            <td><?= $value["zip_code"] ?></td>
                                                            <td>
                                                                <?php if ($value["total_downpayment_required"] >= $value["all_total"]) : ?>
                                                                    <span class="badge badge-pill badge-success">Fully Paid</span>
                                                                <?php else : ?>
                                                                    <span class="badge badge-pill badge-danger">Not Fully Paid</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($value["status"] == "Rejected") : ?>
                                                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                                                <?php elseif ($value["status"] == "Approved") : ?>
                                                                    <span class="badge badge-pill badge-success">Approved</span>
                                                                <?php elseif ($value["status"] == "Pending") : ?>
                                                                    <span class="badge badge-pill badge-primary">Pending</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-success" data-id=<?= $value["id"]; ?> id="showDetails"><i class="mdi mdi-pencil-box-outline"></i>View</button>

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
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleLargeModalLabel">Modal title</h5>
                        <button type="button" class="close" id="btn_close_modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">First Name</label>
                                <input type="text" id="firstName" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Last Name</label>
                                <input type="text" id="lastName" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Book Id</label>
                                <input type="text" id="bookID" name="" class="form-control" readonly>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Contact Number</label>
                                <input type="text" id="contactNumber" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Email</label>
                                <input type="text" id="Email" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Address</label>
                                <input type="text" id="Address" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Zip Code</label>
                                <input type="text" id="zipCode" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">No of Hours</label>
                                <input type="text" id="noofHours" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Promo Code</label>
                                <input type="text" id="promoCode" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Valid Id Number</label>
                                <input type="text" id="validIdNumber" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">SubTotal</label>
                                <input type="text" id="subTotal" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Tax</label>
                                <input type="text" id="tax" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Total</label>
                                <input type="text" id="total" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Downpayment</label>
                                <input type="text" id="downPayment" name="" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label" for="firstname">Senior Discount</label>
                                <input type="text" id="seniorDiscount" name="" class="form-control" readonly>
                            </div>
                        </div>

                        <div>
                            <h6>Booking Payment</h6>

                            <div class="row">
                                <div class="col-sm-3 mb-3">
                                    <label class="form-label" for="firstname">First Name</label>
                                    <input type="text" id="pFirstName" name="" class="form-control" readonly>
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <label class="form-label" for="firstname">Last Name</label>
                                    <input type="text" id="pLastName" name="" class="form-control" readonly>
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <label class="form-label" for="firstname">Amount</label>
                                    <input type="text" id="pAmount" name="" class="form-control" readonly>
                                </div>
                                <div class="col-sm-3 mb-3">
                                    <label class="form-label" for="firstname">Reference</label>
                                    <input type="text" id="pReference" name="" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <h6>All Image</h6>

                            <div class="row" id="appendAllImage">

                            </div>
                        </div>

                        <div class="mt-3">
                            <h6>Booking Room List</h6>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-group m-b-30">
                                        <div class="row" id="appendRooms">



                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close_modal">Close</button>
                        <!-- <button type="button" class="btn btn-danger" id="btn_rejected_booking">Reject</button>
                        <button type="button" class="btn btn-success" id="btn_approved_booking">Approved</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End col -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var store_id;
        $('table').on('click', '#showDetails', function() {
            $('#appendAllImage img').remove();
            $('#appendRooms .spanRooms').remove();
            window.store_id = 0;
            var id = $(this).data('id');
            window.store_id = id;
            $.get("/fetch-booking-info/" + id, function(data, status) {
                var obj = jQuery.parseJSON(data);
                $('#firstName').val(obj.first_name);
                $('#lastName').val(obj.last_name);
                $('#bookID').val(obj.book_id);
                $('#contactNumber').val(obj.number);
                $('#Email').val(obj.email);
                $('#Address').val(obj.address);
                $('#zipCode').val(obj.zip_code);
                $('#noofHours').val(obj.no_of_hours);
                $('#promoCode').val(obj.promo_code);
                $('#validIdNumber').val(obj.valid_id_number);
                $('#subTotal').val(obj.subtotal);
                $('#total').val(obj.all_total);
                $('#downPayment').val(obj.total_downpayment_required);
                $('#seniorDiscount').val(obj.senior_discount);
                $('#tax').val(obj.tax);
                $('#appendAllImage').append('<a href="uploads/' + obj.any_valid_id_pic + '" data-lightbox="' + id + '" data-title="Valid Id Picture"><img src="uploads/' + obj.any_valid_id_pic + '" class="ml-2" height="100" width="100" alt=""></a>');


                $.get("/fetch-booking-payment/" + obj.id, function(data, status) {
                    var obj = jQuery.parseJSON(data);
                    $('#pFirstName').val(obj.paymentFirstname);
                    $('#pLastName').val(obj.paymentLastname);
                    $('#pAmount').val(obj.paymentAmount);
                    $('#pReference').val(obj.paymentReference);
                    $('#appendAllImage').append('<a href="uploads/' + obj.paymentPop + '" data-lightbox="' + obj.fb_id + '" data-title="Proof of Payment"><img src="uploads/' + obj.paymentPop + '" class="ml-2" height="100" width="100" alt=""></a>');
                });

                $.get("/fetch-booking-mpic/" + obj.id, function(data, status) {


                    // alert(data);
                    $.each(JSON.parse(data), function(i, item) {
                        $('#appendAllImage').append('<a href="uploads/' + item.bm_picture + '" data-lightbox="' + item.fb_id + '" data-title="Senior / PWD ID"><img src="uploads/' + item.bm_picture + '" class="ml-2" height="100" width="100" alt=""></a>');
                    });

                });

                $.get("/fetch-booking-rooms/" + obj.id, function(data, status) {
                    $.each(JSON.parse(data), function(i, item) {
                        var htmlRoom = '<div class="card col spanRooms">';
                        htmlRoom += '<a href="uploads/' + item.Picture + '" data-lightbox="' + obj.id + '" data-title="' + item.Type + '"><img class="card-img-top" src="uploads/' + item.Picture + '" style="height:100px;"  alt="Card image cap"></a>';
                        htmlRoom += '<div class="card-body">';
                        htmlRoom += '<h5 class="card-title font-18">' + item.Type + '</h5>';
                        htmlRoom += '</div>';
                        htmlRoom += '</div>';
                        $('#appendRooms').append(htmlRoom);
                    });

                });
            });

            $('#viewModal').modal('show')

        });

        $('#btn_approved_booking').on('click', function() {
            $.get("/booking-approved/" + window.store_id, function(data, status) {
                alert("Booking approved");
                location.href = '/booking-pending-list';
            });
        })

        $('#btn_rejected_booking').on('click', function() {
            $.get("/booking-rejected/" + window.store_id, function(data, status) {
                alert("Booking rejected");
                location.href = '/booking-pending-list';
            });
        })

        $('#close_modal, #btn_close_modal').click(function() {
            $('#viewModal').modal('hide');
        })
    </script>


    <?= $this->endSection(); ?>