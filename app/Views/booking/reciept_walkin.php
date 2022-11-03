<?php

$session = session();

use NumberToWords\NumberToWords;

$this->extend('layout/home_main');
$this->section("body");

$form = new Formr\Formr("bootstrap");
// $autoload['helper'] = array('url');


?>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700);

    /* Mixins */
    * {
        margin: 0;
        padding: 0;
    }

    .cardx {
        background-clip: padding-box;
        box-shadow: 0 2px 14px rgb(38 60 85 / 16%);
    }

    .cardx {
        min-width: 0;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid #d4d8dd;
        border-radius: 0.3125rem;
    }

    body {
        padding: 1em;
        background: #333;
        color: black;
        font-family: 'Open Sans', sans-serif;
        font-weight: 800;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        /* 1, 3 */
        min-height: 100%;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    /* .HolyGrail-body {
		display: -webkit-box;
		display: -moz-box;
		display: -ms-flexbox;
		display: flex;
		width: 100%;
		margin: 0 auto;
		height: 950px;
	} */

    /* .HolyGrail-body .HolyGrail-content {
		background: white;
		order: 2;
		flex: 3;
	} */

    .HolyGrail-body {
        background: white;
        order: 1;
        flex: 1;
    }

    .HolyGrail-nav {
        padding-top: 10%;
        padding-left: 5%;
        padding-right: 5%;
    }

    .HolyGrail-content {
        padding-top: 2%;
        padding-right: 4%;
    }

    .HolyGrail-body .HolyGrail-ads {
        background: white;
        order: 3;
        flex: 1;
    }

    /* @media only screen and (max-width: 1080px) {
		.HolyGrail-body {
			display: -webkit-box;
			display: -moz-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-flex-flow: column;
			-ms-flex-flow: column;
			flex-flow: column;
		}

		.HolyGrail-body .HolyGrail-content {
			order: 1;
		}

		.HolyGrail-body .HolyGrail-ads {
			order: 2;
		}

		.HolyGrail-body .HolyGrail-nav {
			order: 3;
		}
	} */

    .fh5co-contact-section {
        padding-bottom: 0;
    }


    /* .vl {
		border-left: 6px solid blue;
		height: 100px;
		position: absolute;
		margin-left: 5px;

	} */

    /* .box {
		height: 300px;
		border: 5px solid orange;
		background-color: white;
		color: black;
		padding-top: 5px;
		padding-bottom: 10px;
		padding-left: 30px;
	} */
</style>

<body>


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
                                <td>#<?= $bookingDetail['w_book_id']; ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Total Sales</td>
                                <td>
                                    <?= number_format($bookingDetail['w_all_total']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Less SC/PWD Discount</td>
                                <td>
                                    <?= number_format($bookingDetail['w_senior_discount']); ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Total Due</td>
                                <td>
                                    <?= $bookingDetail['w_all_total'] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Less Withholding Tax</td>
                                <td>12%</td>
                            </tr>
                            <tr>
                                <td>Payment Due</td>
                                <td>
                                    <?= $bookingDetail['w_all_total'] ?>
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


                        <h6><label>Recieved from : <?= $bookingDetail['w_first_name'] . " " . $bookingDetail['w_last_name']; ?></label></h6>
                        <h6><label>with TIN : <?= $bookingDetail['w_valid_id_number']; ?></label></h6>
                        <h6><label>and address : <?= $bookingDetail['w_address']; ?></label></h6>
                        <h6><label>engaged in the business of Morning Seven Resort Hotel the sum of<br>
                                <?= $numberTransformer;
                                ?> pesos <br>
                                P ( <?= $bookingDetail['w_all_total']; ?> ) in partial/full payment for check-in
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
    </div>


    <?= $this->endSection(); ?>