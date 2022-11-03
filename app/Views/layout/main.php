<?php $session = session(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Morning Seven Resort - Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <base href="/" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="assets/css/pages/fileupload.css">
    <!-- bootstrap-tagsinput-latest css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap-tagsinput-latest/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <!-- multi-select css -->
    <link rel="stylesheet" href="assets/plugins/multi-select/css/multi-select.css">
    <!-- Wysiwyg editor -->
    <link rel="stylesheet" href="assets/plugins/fullcalendar/css/fullcalendar.min.css">
    <!-- data tables css -->
    <link rel="stylesheet" href="assets/plugins/data-tables/css/datatables.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- from home main -->
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/css/pages/ui-carousel.css" />

    <!-- End  -->
    <!-- timePicker -->

    <!-- Core CSS -->
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/core.css" class="template-customizer-core-css" /> -->
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" /> -->
    <link rel="stylesheet" href="wizzard_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> -->
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/libs/typeahead-js/typeahead.css" /> -->
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/libs/bootstrap-select/bootstrap-select.css" /> -->
    <!-- <link rel="stylesheet" href="wizzard_assets/vendor/libs/select2/select2.css" /> -->
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link href="lightbox/dist/css/lightbox.css" rel="stylesheet" />
    <!-- Modernizr JS -->
    <!-- <script src="home_assets/modernizr-2.6.2.min.js"></script> -->

</head>

<body>

    <style>
        .nav-link:hover,
        .mobile-menu:hover {
            cursor: pointer;
        }

        a {
            cursor: pointer;
        }
    </style>

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="/dashboard" class="b-brand">
                    <span class="b-title">Morning Seven</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-menu-caption">
                        <label>Modules</label>
                    </li>

                    <li data-username="sidebarRooms" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Rooms</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/rooms" class="nav-link ">Rooms Lists</a>
                            </li>
                            <!-- <li class="">
                                <a href="/room-sub" class="nav-link ">Rooms Sub</a>
                            </li> -->
                            <li class="">
                                <a href="/room-subs" class="nav-link ">Rooms Subs</a>
                            </li>
                            
                            <li class="">
                                <a href="/create-rooms" class="nav-link ">Create Rooms</a>
                            </li>
                        </ul>
                    </li>

                    <!--end sidebarRooms-->

                    <li data-username="sidebarRooms" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Walkin Booking</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/booking-list-walkin" class="nav-link ">Booking List - Walkin</a>
                            </li>
                            <li class="">
                                <a href="/booking-add" class="nav-link ">Create Booking</a>
                            </li>
                        </ul>
                    </li>

                    <li data-username="sidebarRooms" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Online Booking</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/booking-list-online" class="nav-link ">Booking All List</a>
                            </li>
                            <li class="">
                                <a href="/booking-pending-list" class="nav-link ">Pending List</a>
                            </li>
                            <li class="">
                                <a href="/booking-approved-list" class="nav-link ">Approved List</a>
                            </li>
                            <li class="">
                                <a href="/booking-rejected-list" class="nav-link ">Rejected List</a>
                            </li>
                        </ul>
                    </li>

                    <!-- End Bookingside -->

                    <li data-username="sidebarDiscount" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Discount</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/discount" class="nav-link ">Discount Lists</a>
                            </li>
                            <li class="">
                                <a href="/create-discount" class="nav-link ">Create Discount</a>
                            </li>
                        </ul>
                    </li>

                    <!--end sidebarDiscount-->

                    <!-- <li data-username="sidebarExtras" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Extras</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/extras" class="nav-link ">Extras Lists</a>
                            </li>
                            <li class="">
                                <a href="/create-extras" class="nav-link ">Create Extras</a>
                            </li>
                        </ul>
                    </li> -->

                    <?php if ($session->get('LoggedUserData')['role'] != "Employee") : ?>
                        <!--end sidebarExtras-->
                        <li data-username="sidebarGcash" class="nav-item pcoded-hasmenu">
                            <a class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">PAYMENT METHOD(GCASH)</span></a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="/gcash" class="nav-link ">Gcash Lists</a>
                                </li>
                                <li class="">
                                    <a href="/create-gcash" class="nav-link ">Create Gcash</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                    <!--end sidebarGcash-->


                    <!--end sidebarBooking-->

                    <li data-username="sidebarEvents" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Events</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/events" class="nav-link ">Events Lists</a>
                            </li>
                            <li class="">
                                <a href="/create-events" class="nav-link ">Create Events</a>
                            </li>
                        </ul>
                    </li>

                    <!--end sidebarEvents-->

                    <li data-username="sidebarCarousel_pic" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Carousel Picture</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/carousel_pic" class="nav-link ">Carousel Picture Lists</a>
                            </li>
                            <li class="">
                                <a href="/create-carousel_pic" class="nav-link ">Create Carousel Picture</a>
                            </li>
                        </ul>
                    </li>

                    <li data-username="sidebarCarousel_pic" class="nav-item pcoded-hasmenu">
                        <a class="nav-link">
                            <span class="pcoded-micon">
                                <i class="feather icon-menu"></i>
                            </span>
                            <span class="pcoded-mtext">Reports</span></a>
                        <ul class="pcoded-submenu">
                            <li class="">
                                <a href="/sales-report" class="nav-link ">Sales Report</a>
                            </li>
                            <li class="">
                                <a href="/inventory-report" class="nav-link ">Inventory Report</a>
                            </li>
                            <li class="">
                                <a href="/reservation-report" class="nav-link ">Reservation Report</a>
                            </li>
                        </ul>
                    </li>





                    <!--end sidebarCarousel_pic-->

                    <?php if ($session->get('LoggedUserData')['role'] != "Employee") : ?>
                        <li data-username="sidebarAccount" class="nav-item pcoded-hasmenu">
                            <a class="nav-link">
                                <span class="pcoded-micon">
                                    <i class="feather icon-menu"></i>
                                </span>
                                <span class="pcoded-mtext">Account</span></a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                    <a href="/account" class="nav-link ">Account Lists</a>
                                </li>
                                <li class="">
                                    <a href="/create-account" class="nav-link ">Create Account</a>
                                </li>
                                <li class="">
                                    <a href="/account-monitoring" class="nav-link ">Account Monitoring</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="">
                        <a href="/signout" class="nav-link ">Logout</a>
                    </li>
                    <!--end sidebarAccount-->
                    <!-- ###navgen### -->













                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->


    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1"><span></span></a>
            <a href="/dashboard" class="b-brand">
                <!-- <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div> -->
                <span class="b-title">Morning Seven Resort Hotel</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header">
            <i class="feather icon-more-horizontal"></i>
        </a>

    </header>


    <?= $this->renderSection('body') ?>





    </div>
    <!-- end page content -->
    </div>
    <!-- end page-wrapper -->



    <!-- Required Js -->

    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <!-- sweet alert Js -->
    <script src="assets/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="assets/js/pages/ac-alert.js"></script>
    <!-- bootstrap-tagsinput-latest Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="assets/plugins/bootstrap-tagsinput-latest/js/bootstrap-tagsinput.min.js"></script>

    <!-- bootstrap-maxlength Js -->
    <script src="assets/plugins/bootstrap-maxlength/js/bootstrap-maxlength.min.js"></script>

    <!-- form-advance custom js -->
    <script src="assets/js/pages/form-advance-custom.js"></script>
    <script src='assets/js/deals/deals_modals.js' type='text/javascript'></script>

    <!-- Modals js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>


    <!-- select2 Js -->
    <script src="assets/plugins/select2/js/select2.full.min.js"></script>

    <!-- multi-select Js -->
    <script src="assets/plugins/multi-select/js/jquery.quicksearch.js"></script>
    <script src="assets/plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- form-select-custom Js -->
    <script src="assets/js/pages/form-select-custom.js"></script>

    <!-- Full calendar js -->
    <script src="assets/plugins/fullcalendar/js/lib/moment.min.js"></script>
    <script src="assets/plugins/fullcalendar/js/lib/jquery-ui.min.js"></script>
    <script src="assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>

    <!-- datatable Js -->
    <script src="assets/plugins/data-tables/js/datatables.min.js"></script>
    <script src="assets/js/pages/tbl-datatable-custom.js"></script>
    <script src="assets/js/appointments/appointments.js"></script>


    <!-- From home main -->
    <script src="wizzard_assets/vendor/libs/jquery/jquery.js"></script>
    <script src="wizzard_assets/vendor/libs/popper/popper.js"></script>
    <script src="wizzard_assets/vendor/js/bootstrap.js"></script>
    <script src="wizzard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="wizzard_assets/vendor/libs/hammer/hammer.js"></script>


    <script src="wizzard_assets/vendor/libs/i18n/i18n.js"></script>
    <script src="wizzard_assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="wizzard_assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="wizzard_assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="wizzard_assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="wizzard_assets/vendor/libs/select2/select2.js"></script>
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="wizzard_assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>

    <!-- Full calendar js -->
    <script src="assets/plugins/fullcalendar/js/lib/moment.min.js"></script>
    <script src="assets/plugins/fullcalendar/js/lib/jquery-ui.min.js"></script>
    <script src="assets/plugins/fullcalendar/js/fullcalendar.min.js"></script>

    <!-- Main JS -->
    <script src="wizzard_assets/js/main.js"></script>

    <!-- Page JS -->

    <script src="lightbox/dist/js/lightbox.js"></script>


    <script src="wizzard_assets/js/form-wizard-numbered.js"></script>
    <script src="wizzard_assets/js/form-wizard-validation.js"></script>

    <script src="wizzard_assets/js/modal-add-new-cc.js"></script>
    <script src="wizzard_assets/js/modal-add-new-address.js"></script>
    <script src="wizzard_assets/js/modal-edit-user.js"></script>
    <script src="wizzard_assets/js/modal-enable-otp.js"></script>


    <!-- JS CAROUSEL -->



    <!-- Vendors JS -->
    <script src="wizzard_assets/vendor/libs/swiper/swiper.js"></script>

    <script src="wizzard_assets/js/ui-carousel.js"></script>
    <!-- End -->
    <script src="assets/moment.js"></script>

    <script>
        $(document).ready(function() {
            const checkerData = $('#checkerData').val();
            if (checkerData == "yes") {
                $("#calendarNextBtn").trigger("click");
            }

            $('#add_person').change(function() {
                if ($('#add_person :selected').val() != 0) {
                    var totalAddPerson = 400 * $('#add_person :selected').val();
                    $("#additionalPersonFirst").removeClass('d-none');
                    $("#additionalPersonLeftFirst").text($('#add_person :selected').val() + " x 400.00");
                    $("#additionalPersonTotal").text(totalAddPerson);

                } else {
                    $("#additionalPersonFirst").addClass('d-none');
                    $("#additionalPersonTotal").text("0");
                }
                $('#additionalPersonTotal').attr('data-numperson', $('#add_person :selected').val());
                totalFunction();
            })

            $("#senior").change(function() {
                // if ($('#senior :selected').val() != 0) {
                //     var totalAddPerson = 100 * $('#senior :selected').val();
                //     $("#seniorFirst").removeClass('d-none');
                //     $("#seniorLeftFirst").text($('#senior :selected').val() + " x 100.00");
                //     $("#priceseniorTotal").text(totalAddPerson);
                // } else {
                //     $("#seniorFirst").addClass('d-none');
                //     $("#priceseniorTotal").text("0");
                // }
                $('#priceseniorTotal').attr('data-numsenior', $('#senior :selected').val());
                totalFunction();
            })
        })
    </script>

    <script>
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: new Date(),
            events: events,
            dayClick: function(rdate) {

                var fdate = rdate.format()
                $('#checkIn').val(fdate)

                $("#checkInDateCalendar").text($.datepicker.formatDate('mm/dd/yy', new Date(fdate)));

                const timeString = $('#checkInDateCalendar').text() + " " + $('#timeCheckIn').val();
                const formValidationCheckIn = $('#formValidationCheckIn :selected').val();
                const date = moment(timeString);
                date.add(formValidationCheckIn, 'h');

                var formattedTime = new Date($('#checkInDateCalendar').text() + " " + $('#timeCheckIn').val())
                var checkoutFormatted = new Date(date.toString());

                if ($('#timeCheckIn').val() != '') {
                    $('#checkOutDateCalendar').text($.datepicker.formatDate('mm/dd/yy', new Date(date.toString())))
                    $('#checkInDateAndTime').text(formattedTime.toLocaleString());
                    $('#checkOutDateAndTime').text(checkoutFormatted.toLocaleString());
                    $('#lengthOfstay').text(formValidationCheckIn + " Hours");
                    $('#checkOutDateAndTime2').text(moment().format('h:mm:ss a', checkoutFormatted.toLocaleString()))
                }


                $("#calendarNextBtn").removeAttr('disabled');


                // $("#calendarNextBtn").trigger("click");
            },
            viewRender: function(view, element) {
                // Drop the second param ('day') if you want to be more specific
                if (moment().isAfter(view.intervalStart, 'day')) {
                    $('.fc-prev-button').addClass('fc-state-disabled');
                } else {
                    $('.fc-prev-button').removeClass('fc-state-disabled');
                }
            }
        });

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        var nextDay = new Date();
        var ddNextDay = String(today.getDate() + 1).padStart(2, '0');
        var mmNextDay = String(today.getMonth() + 1).padStart(2, '0');
        var yyyyNextDay = today.getFullYear();

        var time = new Date().toLocaleTimeString();



        tomorrow = yyyyNextDay + '-' + mmNextDay + '-' + ddNextDay;
        today = yyyy + '-' + mm + '-' + String(today.getDate()).padStart(2, '0');

        today = yyyy + '-' + mm + '-' + dd;
        $('#checkIn').attr('min', tomorrow);
    </script>

    <!-- End from home main -->

    <script>
        const baseUrl = '<?= base_url(); ?>';
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        var nextDay = new Date();
        var ddNextDay = String(today.getDate() + 1).padStart(2, '0');
        var mmNextDay = String(today.getMonth() + 1).padStart(2, '0');
        var yyyyNextDay = today.getFullYear();

        var time = new Date().toLocaleTimeString();

        tomorrow = yyyyNextDay + '-' + mmNextDay + '-' + ddNextDay;
        today = yyyy + '-' + mm + '-' + String(today.getDate()).padStart(2, '0');

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: new Date(),
            events: events
        });
        $('.dropify').dropify();
    </script>

    <script>
        $('#first_name, #surname, #Email, #Contact,#Address,#City,#Country,#Booking_ID,#Room_Type,#Adult,#Children,#Status,#Promo_Code,#Payment_Method').on('change', function() {
            var roomType = $('#Room_Type option:selected').text();
            var promoCode = $('#Promo_Code').val();
            $.post("/fetch-status-booking", {
                    RoomType: roomType,
                    PromoCode: promoCode
                },
                function(data, status) {
                    // alert("Data: " + data + "\nStatus: " + status);
                });
        });
    </script>
</body>

</html>

</body>

</html>