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
                        <h1 class="h3 mb-3"><strong>Carousel_pic</strong></h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Create New Carousel_pic</h5>
                                    </div>
                                    <div class="card-body">

                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="mb-3 col-6">
                                                    <label for="Discount_Code" class="form-label">Rooms</label>
                                                    <select name="room_select" id="room_select" class=" form-control">
                                                        <?php foreach ($rooms as $key => $room) : ?>
                                                            <option value="<?= $room['r_id'] ?>"><?= $room['Type'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="Discount_Code" class="form-label">NO. OF HOURS STAYED</label>
                                                    <select name="hours_select" id="hours_select" class=" form-control">
                                                        <option value="6">6 Hours</option>
                                                        <option value="12">12 Hours</option>
                                                        <option value="24">24 Hours</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-6">
                                                    <label for="add_person" class="form-label">Additional Person :</label>
                                                    <select name="add_person1" id="add_person1" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-6">
                                                    <label for="senior" class="form-label">No. of senior :</label>
                                                    <select name="senior1" id="senior1" class="form-control">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </div>

                                                <!-- Persoal Information -->
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label" for="firstname">FIRST NAME</label>
                                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="First name">
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label" for="firstname">LAST NAME</label>
                                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last name">
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label" for="firstname">CONTACT NUMBER</label>
                                                    <input type="text" id="contact_number" name="contact_number" class="form-control" placeholder="First name">
                                                </div>
                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label" for="firstname">EMAIL ADDRESS</label>
                                                    <input type="email" id="emailAddress" name="emailAddress" class="form-control" placeholder="Last name">
                                                </div>

                                                <div class="col-sm-6 mb-3">
                                                    <label class="form-label" for="firstname">COMPLETE ADDRESS</label>
                                                    <input type="text" id="address" name="address" class="form-control" placeholder="First name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label" for="firstname">ZIP CODE</label>
                                                    <input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Last name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-label" for="firstname">ID NUMBER</label>
                                                    <input type="text" id="valid_id_number" name="valid_id_number" class="form-control" placeholder="Last name">
                                                </div>

                                            </div>


                                            <button type="button" id="walkin_booking" class="btn btn-primary">Submit</button>
                                        </form>







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
        $('#walkin_booking').on('click', function() {

            var room_select = $('#room_select :selected').val();
            var hours_select = $('#hours_select :selected').val();
            var add_person = $('#add_person1 :selected').val();
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var contact_number = $('#contact_number').val();
            var emailAddress = $('#emailAddress').val();
            var address = $('#address').val();
            var zip_code = $('#zip_code').val();

            var valid_id_number = $('#valid_id_number').val();

            var senior = $('#senior1 :selected').val();

            $.get("/get-room/" + room_select, function(data, status) {
                var obj = jQuery.parseJSON(data);
                var finalPrice;
                if (hours_select == '6') {
                    finalPrice = obj.Price
                } else if (hours_select == '12') {
                    finalPrice = obj.Price2
                } else if (hours_select == '24') {
                    finalPrice = obj.Price3
                }

                if (add_person != 0) {
                    var computation_add_person = add_person * 400;
                    finalPrice = parseInt(finalPrice) + computation_add_person;
                }

                var payable_amount = finalPrice;
                var fv = payable_amount / 1.12;
                var discount_sr = fv * 0.2;
                var billable_amount = payable_amount - discount_sr;


                var vat = payable_amount * 0.12;


                // alert(moment().format('MMMM Do YYYY, h:mm:ss a'))

                var checkin = moment().format('MMMM D YYYY, h:mm:ss a');
                var pricePerson = add_person * 400;
                var checkOut = moment().add(hours_select, 'hours').format('MMMM D YYYY, h:mm:ss a');


                $.post("/insert-walkin-booking", {
                        w_rid: room_select,
                        w_check_in: checkin,
                        w_first_name: firstname,
                        w_last_name: lastname,
                        w_number: contact_number,
                        w_email: emailAddress,
                        w_address: address,
                        w_zip_code: zip_code,
                        w_subtotal: finalPrice,
                        w_tax: Math.round(vat),
                        w_all_total: Math.round(billable_amount),
                        w_senior_discount: Math.round(discount_sr),
                        w_seniorNum: senior,
                        w_pricePerson: pricePerson,
                        w_personNum: add_person,
                        w_valid_id_number: valid_id_number,
                        w_check_out: checkOut
                    },
                    function(data, status) {
                        location.href = '/reciept-walkin';
                    });
            });

        })
    </script>



    <?= $this->endSection(); ?>