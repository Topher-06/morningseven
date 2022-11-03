<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MORNING SEVEN RESORT HOTEL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/home_assets/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/home_assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/home_assets/bootstrap.bundle.min.js"></script>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,900,700,900italic' rel='stylesheet' type='text/css'> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="images/morning7-logo.png" />

    <!-- Stylesheets -->
    <!-- Dropdown Menu -->
    <base href="/">
    <link rel="stylesheet" href="home_assets/css/superfish.css">
    <!-- Owl Slider -->
    <!-- <link rel="stylesheet" href="home_assets/css/owl.carousel.css"> -->
    <!-- <link rel="stylesheet" href="home_assets/css/owl.theme.default.min.css"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="home_assets/css/bootstrap-datepicker.min.css">
    <!-- CS Select -->
    <link rel="stylesheet" href="home_assets/css/cs-select.css">
    <link rel="stylesheet" href="home_assets/css/cs-skin-border.css">

    <!-- Icons -->
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/fonts/flag-icons.css" />

    <!-- Themify Icons -->
    <link rel="stylesheet" href="home_assets/css/themify-icons.css">
    <!-- Flat Icon -->
    <link rel="stylesheet" href="home_assets/css/flaticon.css">
    <!-- Icomoon -->
    <link rel="stylesheet" href="home_assets/css/icomoon.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="home_assets/css/flexslider.css">
    <!-- Wysiwyg editor -->
    <link rel="stylesheet" href="assets/plugins/fullcalendar/css/fullcalendar.min.css">
    <!-- <script src="https://use.fontawesome.com/8a8f0458ff.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Style -->
    <link rel="stylesheet" href="home_assets/css/style.css">
    <link href="lightbox/dist/css/lightbox.css" rel="stylesheet" />

    <!-- UI CAROUSEL -->


    <!-- Vendors CSS -->

    <link rel="stylesheet" href="wizzard_assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/css/pages/ui-carousel.css" />

    <!-- End  -->
    <!-- timePicker -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/css/rtl/theme-semi-dark.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="wizzard_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="wizzard_assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

    <!-- Modernizr JS -->
    <script src="home_assets/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="home_assets/respond.min.js"></script>
	<![endif]-->

<body>
    <div id="fh5co-wrapper">
        <div id="fh5co-page">
            <div id="fh5co-contact-section">
                <div class="HolyGrail-body">
                    <main class="HolyGrail-content">



                        <div class="content-wrapper">

                            <!-- Content -->


                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <table class="table table-bordered text-center">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2"><label>IN SETTLEMENT OF THE FOLLOWING</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Invoice No.</td>
                                                    <td>#<?= $bookingDetail['book_id']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>Total Sales</td>
                                                    <td>
                                                        <?= number_format($bookingDetail['subtotal']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Less SC/PWD Discount</td>
                                                    <td>
                                                        <?= number_format($bookingDetail['senior_discount']); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Due</td>
                                                    <td>
                                                        <?= $bookingDetail['all_total'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Less Withholding Tax</td>
                                                    <td>12%</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Due</td>
                                                    <td>
                                                        <?= $bookingDetail['paymentAmount'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">FORM OF PAYMENT</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <label>CASH<input type="checkbox" class="form-check-input ms-3" disabled></label>
                                                            </div>
                                                            <div class="col-6">
                                                                <label>CHECK<input type="checkbox" class="form-check-input ms-3" disabled></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-center">
                                            <p class="lh-1">
                                                <span style="font-size: 25px; font-weight:600;">MORNING SEVEN RESORT HOTEL</span>
                                                <br>
                                                <span style="font-size: 18px; font-weight:600;">Nalvo Sur, Luna, La Union</span>
                                                <br>
                                                <span style="font-size: 18px; font-weight:600;">NON-VAT Reg. TIN 200-091-004-001</span>
                                            </p>
                                        </div>

                                        <div class="me-5 ms-5 mt-5">
                                            <div>
                                                <h6><label>OFFICIAL RECIEPT</label></h6>
                                            </div>
                                            <div class="text-right">
                                                <h6><label>Date: <?= date('m/d/Y') ?></label></h6>
                                            </div>


                                            <h6><label>Recieved from : <?= $bookingDetail['first_name'] . " " . $bookingDetail['last_name']; ?></label></h6>
                                            <h6><label>with TIN : <?= $bookingDetail['valid_id_number']; ?></label></h6>
                                            <h6><label>and address : <?= $bookingDetail['address']; ?></label></h6>
                                            <h6><label>engaged in the business of Morning Seven Resort Hotel the sum of<br>
                                                    <?= $numberTransformer;
                                                    ?> pesos <br>
                                                    P ( <?= $bookingDetail['paymentAmount']; ?> ) in partial/full payment for check-in
                                                </label></h6>

                                        </div>

                                        <?php




                                        ?>




                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex">
                                            <img src="home_assets/images/morning7-logo.png" width="80" height="80">
                                            <h6 class="ms-5">
                                                *THIS DOCUMENT IS NOT VALID <br>
                                                FOR CLAIMING INPUT TAXES* <br>
                                                THIS OFFICIAL RECEIPT SHALL BE <br>
                                                VALID UP June 2024</h6>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2">
                                                        <span style="font-size: 10px;">Sr. Citizen TIN</span>
                                                        <br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span style="font-size: 10px;">OSCA/PWD ID No.</span>
                                                        <br><br>
                                                    </td>
                                                    <td>
                                                        <span style="font-size: 10px;">Signature</span>
                                                        <br><br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                    </div>

                                    <div class="col">
                                        <p class="lh-1"><label>By: ________________________</label>
                                            <br>
                                            <span style="font-size: 14px;">Cashier/Autorized Representative</span>
                                        </p>
                                    </div>

                                </div>

                            </div>


                            <!-- / Content -->


                            <div class="content-backdrop fade"></div>
                        </div>




                    </main>


                </div>
            </div>

        </div>
        <!-- END fh5co-page -->

    </div>
    <!-- End Containerbar -->
    <!-- Start js -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
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


    <script src="wizzard_assets/js/form-wizard-numbered.js"></script>
    <script src="wizzard_assets/js/form-wizard-validation.js"></script>

    <script src="wizzard_assets/js/modal-add-new-cc.js"></script>
    <script src="wizzard_assets/js/modal-add-new-address.js"></script>
    <script src="wizzard_assets/js/modal-edit-user.js"></script>
    <script src="wizzard_assets/js/modal-enable-otp.js"></script>

    <script src="lightbox/dist/js/lightbox.js"></script>
    <!-- JS CAROUSEL -->



    <!-- Vendors JS -->
    <script src="wizzard_assets/vendor/libs/swiper/swiper.js"></script>

    <script src="wizzard_assets/js/ui-carousel.js"></script>
    <!-- End -->
    <script src="assets/moment.js"></script>
    <script src="wizzard_assets/js/app-invoice-print.js"></script>
</body>

</html>