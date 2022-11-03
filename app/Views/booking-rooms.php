<?php

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

	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type=number] {
		-moz-appearance: textfield;

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

	<input type="hidden" id="checkerData" value="yes">
	<input type="hidden" id="setIdRoom">
	<div class="container-fluid" style="margin-left: 2%;">

		<div class="col-md-12">
			<div style="margin-left: 1%; margin-right: 1.5%;">




				<!-- <div class="col-md d-none" id="showRoomDesc">
					<div class="card mb-3">
						<div class="row g-0">
							<div class="col-md-4">
								<img class="card-img card-img-left" id="setImageRoom" src="uploads/1658260442_0a2a3fbb316feec79013.png" alt="Card image" />
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title" id="getTypeRoom"><b><span id="setTypeRoom"></span></b></h5>
									<p class="card-text">
									<table id="default-datatable" class="display table table-bordered">
										<thead>
											<tr>
												<th>
													6Hrs
												</th>
												<th>
													12hrs
												</th>
												<th>
													24hrs
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													₱ <span id="setPrice1"></span>
												</td>
												<td>
													₱ <span id="setPrice2"></span>
												</td>
												<td>
													₱ <span id="setPrice3"></span>
												</td>
											</tr>
										</tbody>
									</table>
									</p>
									<p class="card-text"><small class="text-muted">Capacity : <span id="setCapacityPax"></span> PAX</small></p>
									<p class="card-text"><small class="text-danger"><span id="setRoomLeft"></span> Room left</small></p>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="swiper-container" id="swiper-with-arrows">
					<div class="swiper-wrapper">
						<?php foreach ($carousels as $key => $carousel) : ?>
							<div class="swiper-slide" style="background-image:url(uploads/<?= $carousel['c_picture'] ?>); background-size:100% 100%;"></div>
						<?php endforeach; ?>
					</div>
					<div class="swiper-button-next swiper-button-white custom-icon">
					</div>
					<div class="swiper-button-prev swiper-button-white custom-icon">
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="col-12 mb-4">
					<div id="wizard-validation" class="bs-stepper wizard-vertical vertical mt-3 cardx">
						<div class="bs-stepper-header">
							<div class="step" data-target="#calendar-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">1</span>
									<span class="bs-stepper-label">Calendar</span>
								</button>
							</div>
							<div class="line"></div>
							<div class="step" data-target="#book-now-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">2</span>
									<span class="bs-stepper-label">Select a room</span>
								</button>

							</div>
							<div class="line"></div>
							<div class="step" data-target="#booking-details-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">3</span>
									<span class="bs-stepper-label">Booking Details</span>
								</button>
							</div>
							<div class="line"></div>
							<div class="step" data-target="#personal-info-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">4</span>
									<span class="bs-stepper-label">Personal Information</span>
								</button>
							</div>
							<div class="line"></div>
							<div class="step" data-target="#payment-info-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">5</span>
									<span class="bs-stepper-label">Payment Information</span>
								</button>
							</div>
							<div class="line"></div>
							<div class="line"></div>
							<div class="step" data-target="#confirmation-validation">
								<button type="button" class="step-trigger">
									<span class="bs-stepper-circle">6</span>
									<span class="bs-stepper-label">Confirmation</span>
								</button>

							</div>

						</div>
						<div class="bs-stepper-content">
							<form id="wizard-validation-form" method="post" action="/insert-booking-room" enctype="multipart/form-data">
								<!-- Calendar -->
								<div id="calendar-validation" class="content">
									<div class="content-header mb-3">
									</div>
									<div class="row g-3">
										<div class="col-sm-9">
											<div class="pcoded-main-container">
												<div class="pcoded-wrapper">
													<div class="pcoded-content">
														<div class="pcoded-inner-content">
															<div class="main-body">
																<div class="page-wrapper">
																	<!-- [ Main Content ] start -->
																	<div class="row">
																		<!-- [ Full-calendar ] start -->
																		<div class="col-sm-12">
																			<div class="card fullcalendar-card">
																				<div class="card-block">
																					<div class="row">
																						<div class="col-xl-12 col-md-6 p-4">
																							<div id='calendar' class='calendar'></div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<!-- [ Full-calendar ] end -->
																	</div>
																	<!-- [ Main Content ] end -->
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="mt-5">
												<!-- <div class="col-sm-12 col-md-2">
													<i class="fa fa-calendar fa-3x"></i>
												</div> -->
												<label class="text-muted">Check in Date:</label><br>
												<div>
													<input type="text" readonly id="dateCheckIn" class="form-control">
												</div>
											</div>
											<div class="mt-5">
												<label class="form-label" for="formValidationCheckIn">No. of Hours Stayed</label>
												<select name="formValidationCheckIn" id="formValidationCheckIn" class="form-control">
													<option value="6">6 Hours</option>
													<option value="12">12 Hours</option>
													<option value="24">24 Hours</option>
												</select>
											</div>
											<div class="mt-5">
												<!-- <div class="col-sm-12 col-md-2">
													<i class="fa fa-calendar fa-3x"></i>
												</div> -->
												<label class="text-muted">Check in Time:</label><br>
												<label id="checkInDateCalendar" class="d-none">00/00/0000</label>
												<div>
													<input type="time" id="timeCheckIn" class="form-control">
												</div>
											</div>



											<div class="mt-5">
												<label class="text-muted">Check out:</label>
												<div>
													<div class="d-flex align-items-center form-control mb-2">
														<i class='bx bxs-calendar fa-xl me-2' style="color: black;"></i>
														<input type="text" disabled style="border: none;" id="checkOutDateCalendar" value="00/00/0000">
													</div>
													<div class="d-flex align-items-center form-control">
														<i class="fa-solid fa-clock fa-xl me-2" style="color: black;"></i>
														<input type="text" disabled id="checkOutDateAndTime2" style="border: none;" value="0:00:00 AM">
													</div>

												</div>
											</div>
										</div>


										<div class="col-12 d-flex justify-content-between">
											<button type="button" class="btn btn-label-secondary btn-prev" disabled> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
												<span class="d-sm-inline-block">Previous</span>
											</button>
											<button type="button" class="btn btn-primary btn-next" id="calendarNextBtn" disabled> <span class="d-sm-inline-block me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
										</div>
									</div>
								</div>

								<!-- End Calendar -->
								<!-- select a room -->
								<div id="book-now-validation" class="content">
									<div class="content-header mb-3">
										<h6 class="mb-0">Select a room</h6>
									</div>
									<div class="row g-3">
										<?php foreach ($roomLists as $key => $roomList) : ?>
											<div class="col-md-12">
												<div class="card mb-3">
													<div class="row g-0">
														<div class="col-md-4">
															<a href="uploads/<?= $roomList['Picture'] ?>" data-lightbox="<?= $roomList['r_id'] ?>" data-title="<?= $roomList['Type'] ?>"><img class="card-img card-img-left" src="uploads/<?= $roomList['Picture'] ?>" style="height: 100%;" alt="Card image" /></a>

														</div>
														<div class="col-md-8">
															<div class="card-body">
																<h5 class="card-title"><?= $roomList['Type'] ?></h5>
																<p class="card-text">
																<div class="price" style="line-height: 1;">
																	<?php if ($roomList['Price'] != null) : ?>
																		<label>6hours : ₱ <?= number_format($roomList['Price']); ?></label><br>
																	<?php endif; ?>

																	<?php if ($roomList['Price2'] != null) : ?>
																		<label>12hours : ₱ <?= number_format($roomList['Price2']); ?></label><br>
																	<?php endif; ?>

																	<?php if ($roomList['Price3'] != null) : ?>
																		<label>24hours : ₱ <?= number_format($roomList['Price3']); ?></label>
																	<?php endif; ?>
																</div>
																</p>
																<p class="card-text">
																	<small class="text-muted">
																		<li>Capacity : <?= $roomList['Capacity'] ?></li>
																		<li>Room Count : <?= $roomList['Room_Count'] ?></li>
																	</small>
																</p>
																<div class="text-right dButton">
																	<button type="button" class="btn btn-primary btn-next" data-id="<?= $roomList['r_id'] ?>" id="bookNow"> <span class="d-sm-inline-block me-sm-1">Book Now</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
																</div>


															</div>
														</div>

													</div>

												</div>

											</div>

										<?php endforeach; ?>
										<!-- <div class="col-sm-6">
										<label class="form-label" for="specialValidation">Special Request</label>
										<input type="text" class="form-control" id="specialValidation" name="specialValidation">
									</div> -->
									</div>
								</div>
								<!-- end select a room -->
								<!-- Account Details -->
								<div id="booking-details-validation" class="content">
									<input type="hidden" id="room_id" name="room_id" value="">
									<div class="content-header mb-3">
										<h6 class="mb-0">Booking Details</h6>
									</div>
									<div class="row g-3">
										<div class="col-sm-6">
											<label class="form-label" for="checkIn">Check In</label>
											<!-- <input type="text" name="formValidationUsername" id="formValidationUsername" class="form-control" placeholder="johndoe" /> -->
											<input type="date" class="datepicker-here form-control" readonly name="checkIn" id="checkIn">
										</div>
										<div class="col-sm-6 form-password-toggle">
											<?php
											$count = [
												'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
											];
											$form->select("add_person", "Additional Person :", "", "add_person", "", "", "", $count); ?>
										</div>
										<div class="col-sm-6 form-password-toggle">
											<?php
											$count = [
												'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
											];
											$form->select("senior", "No. of senior :", "", "senior", "", "", "", $count); ?>
										</div>

										<div class="col-sm-6 form-password-toggle">
											<label class="form-label" for="formValidationConfirmPass">Promo Code: (*Optional)</label>
											<input type="text" name="promo_code" class="form-control" id="promo_code">
										</div>
										<div class="col-12 col-md-6">
											<label class="form-label" for="senior_pic_id">UPLOAD SENIOR CITIZEN/PWD ID</label>
											<input type="file" id="senior_pic_id" name="senior_pic_id[]" multiple class="form-control" />
										</div>
										<!-- <div class="col-sm-6">
											<label class="form-label" for="modalEditUserFirstName">Extra</label>
											<select name="" id="" class="form-control">
												<option value="" selected>Select Extra</option>
												<option value="">Unan</option>
											</select>
										</div> -->

										<div class="col-12 d-flex justify-content-between">
											<button type="button" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
												<span class="d-sm-inline-block">Previous</span>
											</button>
											<button type="button" class="btn btn-primary btn-next"> <span class="d-sm-inline-block me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
										</div>
									</div>
								</div>
								<!-- Personal Info -->
								<div id="personal-info-validation" class="content">
									<div class="content-header mb-3">
										<h6 class="mb-0">Personal Information</h6>
									</div>
									<div class="row g-3">
										<div class="col-sm-6">
											<label class="form-label" for="firstname">First Name</label>
											<input type="text" id="firstname" name="firstname" class="form-control" placeholder="John" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="lastname">Last Name</label>
											<input type="text" id="lastname" name="lastname" class="form-control" placeholder="Doe" />
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="number">Contact Number</label>
											<input type="number" maxlength="11" value="63" class="form-control" id="number" name="number">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="email">Email Address</label>
											<input type="email" class="form-control" id="email" name="email">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="address">Complete Address</label>
											<input type="text" class="form-control" id="address" name="address">
										</div>

										<div class="col-sm-6">
											<label class="form-label" for="country">Zip Code</label>
											<input type="text" id="zip_code" class="form-control">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="country">Valid id number</label>
											<input type="text" id="valid_id_number" class="form-control">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="country">Upload any valid id</label>
											<input type="file" class="form-control" name="upload_valid_id" id="upload_valid_id">
										</div>



										<!-- <div class="col-sm-6">
										<label class="form-label" for="specialValidation">Special Request</label>
										<input type="text" class="form-control" id="specialValidation" name="specialValidation">
									</div> -->


										<div class="col-12 d-flex justify-content-between">
											<button type="button" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
												<span class="d-sm-inline-block">Previous</span>
											</button>
											<button type="button" class="btn btn-primary btn-next"> <span class="d-sm-inline-block me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
										</div>
									</div>
								</div>


								<!-- Payment Information -->
								<div id="payment-info-validation" class="content">
									<div class="content-header mb-3">
										<h6 class="mb-0">Payment Information</h6>
									</div>
									<div class="row g-3">
										<div class="col-md-12">
											<div class="card mb-3">
												<div class="row g-0">
													<div class="col-md-8">
														<div class="card-body">
															<h5 class="card-title"><b>Send your payment here.</b></h5>
															<p class="card-text">
																<?php foreach ($gcashs as $gcash) : ?>
															<p class="card-text">
															<h6>Name :<?= $gcash['first_name'] . " " .  $gcash['last_name']; ?></h6>
															</p>
															<p class="card-text">
															<h6>Number : <b><?= $gcash['number'] ?></b></h6>
															</p>
														<?php endforeach; ?>
														</p>
														</div>
													</div>
													<div class="col-md-4">
														<img class="card-img card-img-right" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAO8AAADTCAMAAABeFrRdAAAAvVBMVEUAff7///8CLbhwuvchhP4Ae/4AeP4phv4Ad/4Acv4Afv8AdP4AgP8AcP4Agf8Ac/51vvYCJLLu9P8CI7JQl/7P4P+yzf+cwf4BS89upf7x9v8BcfLU4//l7v+lxf4ziv4BVNdgnv4CNL0BYeOTuv660v8BP8VZqfmHs/5Hkv5+rv5Tpfqtyv9grvjI2//T4v8BRMk+l/sBX+He6v9cnP5rtvdGnPs8lvtJk/4AZv5qo/5Ln/oBauyCsP4+jv59x9XOAAAQIUlEQVR4nO2deX/aOBOATYqEja9ALq5wBVJCKc0m6TZvmuX7f6zXtmRpdGBDkQlxPX9sfxuE8eORRjOSZmw1kPX3CGpYfxtvveItr/yNvB99D8eUirfcUvGWWyreckvFW26peMstFW+5peItt1S85ZaKt9xS8ZZbKt5yy9F4m57nBUFA/hv/0zzKz8pyDN4INbDen8aP07PWRavVOpved8Z3fS/4AObCeZsR611nGmMK0mpd3I/fIz0X+uuKFMzbDKynexkVQnfej9uzC+X1gvfH7bAU+WyMguMRF8gb0U5zYIlcdPpHIy6Mt7krbUL8iI40jovi9dD9zrRJtx4fx3IVw9sMxnvRxsBn74H5G1GkEF4P7d6VuVx0jmCpi+AN7v6ANpZp8aO4AN6go8WNPY77x04ksZ+ln6Za/aI1bJy36ekMVWvauetbid+cONBW/6lzpml3X/QYNs3btKYa2Kd+ILlRsU/dHyvIhSvYMK8GtxV5E3pDFLnW71JnaN3pRjAyd4LILK+K28r2FiMlP0Li1rvKi9BoY2FDyGZ5PQm39ZjrGzeDPpi8WkhujtC380i+Ns0AG+UNHiXtvgNahGw3dBzfd0LXhupqBk8M+FGxV+jnFyKeEWCTvJJT1Xq0WOdEtoPfbubP7V6t1rsdzBevvovZFz2mYkW9+CvF/fIdWwbEIK/3fgFxL56YrrDTuHmuSbJeum6qsqY3jmbkVsdSO/95yns+MqFgc7xNJGqXucPY7yqwRK4bYcrgef1+U2OrNozXjILN8Qb3Am6f3jzy39p62kTJgZ1+v6kzbJD33MTBVmO8nuA0M1y7MdhOG8uNn3l7Huf98u2EeJsWxL1Icf1FNm0kV5nA+Dvn/XJCvEEH4lKvATnrXNxabSGPS4QjoWxoBDr0P4cDG+Jt9oFtbo2JqUL4dgfcWtuRb+nrl/Ofv6kTCRVswGIZ4hU8DRrkINTbBbdWE31F9ItqlJgn9GDUYpnhFdVLnAZkZ9hlQSxIgRop30+iTQwG8L8nwgtHb+uJDF5fO+n22upTEAwWd6jOfxEF/2uyQxvhFVyNKenNzrXCtV6OHD/yoN2H2RX488qG1wLq/Jl8gALQoQ92oo3wek8gwiERO55IsO1l6DKji0M0Yxq3BQYM6IgHCS3Wr5PgDaaysUK2hLv0xa6I7HCYfDCQgnn8k9N9Uzr011PgbfYV9bpibx4gW/2a3VwMZw+ORIB+A/uUPCNUBz6W5jp7iQlebyyPXjQScFe+Vi0I2+qyBfQgzzekQ3OVHzwjmeAF3ZmuP4WCXzXM9BhlgcOVduhvnPf143mhdW6Ri9Yh7nwvXMHBIFMw80Ai+f3xvDAyIusx9hDg3u6HG90S1+95EOPBAXzoDGyCtyN3Zx86knunF3OPI3U5oIv18bxw+CauJLqEg9fd+5b+4XS/5Rn4/AT6M+/OU7U7779wzD3otPtCg3VgNvrhvHD27RDrDDzn673Vq+m+wOM4f/hoXu+d85JQwQHq1d1e5Fs5qoRstVLpvuiVa/zAmN8ALzfPZDcEbThuT2OccbB6bmtkfUn7Auy+iX8BFzkODAkN8HLvijiTuAvmXrU722+1bbIiTwd23408IR24aGeWNzHPeMYJZoq/C7WvyIL6F/Jw9U6JF0y/SawAzXNXmS7dzPXZpDsADyuN+TnvgRGSWV4yHYHY6FK5OzcLtzZJuu9GNk8gKP56mMNhgPdR5p3z+1fce9TI5F3GNCfOu59+5YWAT82bTL/Z4zfcsndG5C3hBRHSCY7fTPus8ArOtSJJfzhx+7zn/OtmbSkl648nPv/u61/Zm/XWjYekuRIenJZ/xf3n1o7+s+v4QJa89SDpDqftPx8aH/lgU22YuGOnHR/lxL92zv2hV9B4ol++Oan4V7O+8QAQ8tY3fOhfJjujwDxT6wQ7+IE3+9HrV9CYU2t+6utXcH2yQzr0DYDIXJ9ECFrnS5mOhr+ntT4prD83VYrrDGBh05Q8mez150PPrBSzvyBuH209goN8uC9KnGfYnTX7C4duEJreP6Lbgx7kqA237B85Am6bqBfuHz2c5P6RZn9QmJJqtStbM+zshrjV/0KUmb0/eOgGv/H9X3rC1ZFcxq68/4v9mdhiTY7paPZ/wfr7gdGgqf190KGpggU3IjFGXd/m+/uuu5B9aPohytzfP/gElvnzG/Q0kiupL5Lrruc7Yej4jaV6Du2Sag6E9vT8BhzQwUnwiudzaAqCrz1bd/v8rD2mtEjdMK5NepwOHmf4eRrnc8TzV2f0FLP+QJJeVmzKAos5RJc2GNCH7v4We77O3RkYuiT4XwpMHFHDJ4ILPT8Z/tgNVzzwgDffz8+/fPXU85OHd+eCz8f6q11wl/KBUYwCTI8pwc3Rw62zOV7x/DM77u10c2nbG80ZIwYGvctD97qTCxs73/4kpC+kmZ7YyjkCPZQPYIm3J5xvN5DAUFT+whnLX3AuM05BrxtsOSA/f8FEofni8lNS4GgUT7bskc1HPD8lQH1NRjsMDk8sP0XOP2rdsfwj5NRvFCX/WGCYfxSnBI+VvErQn08t/0jNL+t4ML8MdYfr28Rp7j2vbyauy0+ypPnvranSp/l0dHL5ZcoQjgYxzB/Ecf5gvOAcJxDq8wdbHTl/EHkp78GuM7me2XzYqch70bHyMvJz80O973F+6HczuMbzfyUFR76WlVV1IaJ9hKNek/+LcP31V/00838jIy0DJxnP2/O7Bdot+d0ImUvwPkr+/v0d0ufvK2U6Plv+fgysqc/Qak3H78ij9Rnif/t32voM089WnyHW3Nb6G9PHTmc87nTu1fJfRC4+X/2NSIKnCx3MDtL/jPVVYH76PgLz3wuTguojeeO9VRz5n0co+lVU/atgTxXv4JkYkQLrm93pDPAW3d4fq6JbkfXrvLvddNy6f//89etiievj5I3jVuuI1foK5k3C+MiJyqg/eX+X6V8bl2PUF0VPj2cKc+x+dO6soFz1RROJfWX0Pk7cqrh+bFJA9uk9Yj0yrHUc3ljS8sBxoEPqBGvX5wqXqv5zuaXiLbdUvOWWirfcUvGWWyreckvFW26peD+JIPRH24aflRdPYtm/SPK+vAjbsey0/YwwJm3NledOJaTHX/a+9F682PU3y9lwtbpZXNphduZY1HbUJW1f8truL5ge8lHzqXNkd15kh8Ix7eeZ5279Ndvpim2b29v+gaDiebGQREVPx430yXLYVdvOG39QWWbrXRfO6+sPfq5CzQ86+ooi2Scl97vrgnlRuO3UZ2+kVLv151vatutGjoxZhfNmFr59EY/zIjvjVPuDIeBieRHOrAT7AiGQnVkTeGMGuFheByK019fD1VzQITzIKSRp9KK2Q7Gt7CGQWs+ZR6A1TQrlhePxpu67kQvhhvaSP4R2yNqG4AD/TYO2dUHb5xBcGbnOw3I2W7xZDkmVJMcrAQOyfW/yX9yk7oM5XOBFdlwPwHF3muPzeUFG8pD7DQgDi80ePiiusXJhW16TYMPuCvkTZgVvFxElJna9x5ogtz5kQ6m3arj8iowX+5fDH1Gj9mB16eePllxexAv8XIbCJxhRtQ3Y3312dy/iRGXXafpcm83C7qsw0nsPdpq/c00tILIlS3+dAnNefwlsS7urT0Tdh5e7GYqtQW7yWzOWXoKZGl/lHAyaIcvb+mIGaS1OqRwIvLihlOlo0yQdxvsiTQY/cssj5PGG6aUmahoJqrdrc1AKl5WWWKpt8UvkY1ns77psu4bAKxYppUKLJzNeRdo5kUweL1PZ3NF8ikLBiqR1GQa6hG7cGHEfWuuTPF9BXl87sc3DbN7ac3Y50zxeN9XDDpEXS3LeaNuCK9hL7b22AS8s3ABroJOCOtt5NSXk9uH10+e6g7ef1lXJecSWUM/geoJ8+1IYzAmvm+bizRu+47jLdCzPbZl3+Or6XpenwGTP5tm8rJDzBF4Eu7Ig+GzUIlCS8HIGgyhOTKZQOHEnvOxBE5OLMQVOKhAB3lsr/vFoWvpvJwXn8LJeBdVrL68kWceOMSvVllfiht/tms8f4M0jCW9adOgNpz8K1Mev0GM2IUwvcKuzNLvy0ixt+A4MoVxMKg1koRfNs9FeNL2zNpwueW6loN9ZWoSTIibOHOed8L7EDFxWh87hTWdf6AZinbGJ+jDrC3nD103LUAiRBi8jRfSbDtgJ9ZpQ8yWSCRbsVRsmDqf3NTmAlxqSAdBZHq+uxpcgqeqkSjPMsyH2is1Yg66T5GYhvgTLeOG7G9g7AZQX0OzBS+9hkKff6DdwuqyRw8vG+Y0UOae2MeEVCjysF0K4wHmXEM1pa6+7D692/E40vNEPs2Ah550B7PsvUr9L9U78DUd0SW6HGx4OcH8SXiIcHM6rs8/uqseFft7FXG85NfRZ/5Cz8dNFZeo/h3JW6TMLB/Txb2oXDuDVz782r9r8P+pjxHPQjvMv47VkXjFe0GTDPwe4WN48/4p5SvH43tG/Yn1Gzl8OpXjQckdKVEFWwIrjzfGfbTq+E3u2o//M5ml53kjLojHeKOL0ZlLE5wnzkXFepgx9fJROATNS95X+nz4+GtF3pbBAT7bPQU3mjckctJyDQHgt+BvGeTPjXx7FkjiceTgLtffHLwi6qifeXzpG2uJjYW5XOn7pbIvibSseUASoUF6wvqFchq1RrMn0zGO4F7ktVd4qnkWZfzURDBtbDCLzr92Ihc77yGbvj4q9iQJ5wfrVi7h+BTYS0gHLY/Q3cfPETtdmetG94DSUERTMCyrFvOnkxm1futoTu1QF8m5Zn7Sw/8qi8Hn6IIBTdG3D9UkWrMWPhr8MCsRH7iX4KujczMdOg0iyGlAcr7D2Mms6to2x7fpvoDYOt90uCNxXG991bdt10IKvT/xIDDmbWNd01Rau2BL9pkFYm5aCQ6n1vimaV9xfuJ3PFosbYV68BMNQKBdaG8yvr9fCOhSxQGB9Y9b0Q8cV3iBL4sH0GfXeoscWWay0xRsqmjdn/6gLL4/CzP0juvUihBy9W+nypMeCJlfrKz4jJfNiobzZ+4MTce5BWS8cYEvYW/dMGe+2cmFktaZYXgs52+7vtqHu/6pvHqRtPbAYcaV+vhbXn7Wv46T2umDeaAxPtDW5Z7oNjFDf9kZoq2p4/j8pXkBqr3qmRr9wXguHM4ViiPVXxo7adu5JbeXSWF1fjheQLx8DYYVK0xlN5P1hkDeeMyaCI9t1tm/WYP8Nth0skHo+B7szbqhuomknXVzgcYRtDcFVrut8s410hZ74Kk46Z2fF33udv0p2Yxc3w+FsuYHvk9e2df3gjbR9DV39rg72R/+t5vPr2SVZrbGDUSQWuHD0i6PlcL6erxYPwoqOG7ccSQ+RfP+Q9Xa1fXLADu92vg7hvLN4cREhl7fQHYpMmrjKVbTHJ/MPVX7W85N/KhVvuaXiLbdUvOWWirfcUvGWWyreckvFW26peMstFW+5peItt1S85ZaKt9zyN/Kiv0ka1qYhS/1URbnTvaW++T/cI02dWjm1XgAAAABJRU5ErkJggg==" height="100" width="100" alt="Card image" />
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="paymentFirstname">First name</label>
											<input type="text" class="form-control" id="paymentFirstname" name="paymentFirstname">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="paymentLastname">Last name</label>
											<input type="text" class="form-control" id="paymentLastname" name="paymentLastname">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="paymentAmount">Amount of payment</label>
											<input type="hidden" name="hpaymentAmount" id="hpaymentAmount">
											<input type="number" class="form-control" min="1500" id="paymentAmount" name="paymentAmount">
											<div class="fv-plugins-message-container invalid-feedback" id="errorPaymentAmount"></div>
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="paymentReference">Reference</label>
											<input type="number" class="form-control" id="paymentReference" name="paymentReference">
										</div>
										<div class="col-sm-6">
											<label class="form-label" for="paymentPop">Proof of Payment</label>
											<input type="file" class="form-control" id="paymentPop" name="paymentPop">
										</div>

										<div class="col-12 d-flex justify-content-between">
											<button type="button" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
												<span class="d-sm-inline-block">Previous</span>
											</button>
											<button type="button" class="btn btn-primary btn-next"> <span class="d-sm-inline-block me-sm-1">Next</span> <i class="bx bx-chevron-right bx-sm me-sm-n2"></i></button>
										</div>
									</div>
								</div>
								<!-- Personal Info -->

								<div id="confirmation-validation" class="content">
									<div class="content-header mb-3">
										<h6 class="mb-0">Confirmation</h6>

									</div>
									<div class="row g-3">
										<h4 class="font-22 mb-3">Morning Seven Policies:</h4>
										<br><br>
										<p style="color: black;">
										<h6>The Resort has a zero tolerance policy, which means that it will refuse to admit or refuse service or accommodation to anyone who acts in an obviously intoxicated or disorderly manner while on the Resort's premises, destroys or threatens to destroy Resort property, causes or threatens to cause a public disturbance; or refuses or is unable to pay for the accommodations or services.
											<br><br>
											Morning Seven Hotel Resort has the right to limit the number of people who can stay in a given guest unit and will only allow registered guests to utilize its services. A person who causes damage to the Resort or any furniture or furnishings within the Resort, whether negligently or intentionally, shall be liable for damages sustained by the Resort staff, comprising the Resort's income loss as a result of the inability to rent or lease units until the damage is repaired.
											<br><br>
											THE RESORT'S MANAGEMENT RESERVES THE RIGHT TO ADD TO, ALTER, OR AMEND ANY OF THE ABOVE TERMS, CONDITIONS, AND RULES, ALL OF WHICH ARE PART AND ABSTRACT OF THE LODGING ACT.</p>
											<br>
										</h6>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="acceptTermsValidation" class="custom-control-input" required id="acceptTermsValidation">
											<label class="custom-control-label" for="acceptTerms"> I UNDERSTAND THE POLICIES.</label>
											<p class="text-danger">
											<h5 class="d-none" id="acceptTermsRequired">* Required</h5>
											</p>
										</div>
										<div class="col-12 d-flex justify-content-between">
											<button type="button" class="btn btn-primary btn-prev"> <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
												<span class="d-sm-inline-block">Previous</span>
											</button>
											<button type="button" class="btn btn-success" id="btn_submit_triggered">Submit</button>

										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="modal" id="seeMore" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-simple modal-edit-user">
					<div class="modal-content p-3 p-md-5">
						<div class="modal-body">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							<div class="text-center mb-4">
								<h3>Add More room</h3>
							</div>
							<div class="row" id="insertRoomLists">

							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal" id="moreRoomForm" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-simple modal-edit-user">
					<div class="modal-content p-3 p-md-5">
						<div class="modal-body">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							<div class="text-center mb-4">
								<h3>Add More room</h3>
							</div>
							<div class="row g-3">
								<div class="col-sm-6 form-password-toggle">
									<?php
									$count = [
										'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
									];
									$form->select("add_personModal", "Additional Person :", "", "add_personModal", "", "", "", $count); ?>
								</div>
								<div class="col-sm-6 form-password-toggle">
									<?php
									$count = [
										'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
									];
									$form->select("seniorModal", "No. of senior :", "", "seniorModal", "", "", "", $count); ?>
								</div>

								<!-- <div class="col-sm-6 form-password-toggle">
									<label class="form-label" for="formValidationConfirmPass">Promo Code: (*Optional)</label>
									<input type="text" name="promo_code" class="form-control" id="promo_code">
								</div> -->
								<!-- <div class="col-12 col-md-6">
									<label class="form-label" for="senior_pic_id">Senior Pic ID</label>
									<input type="file" id="senior_pic_idModal" name="senior_pic_idModal" class="form-control" />
								</div> -->
								<div class="col-sm-6">
									<label class="form-label" for="modalEditUserFirstName">Extra</label>
									<select name="" id="extraModal" class="form-control">
										<option value="" selected>Select Extra</option>
										<option value="">Unan</option>
									</select>
								</div>
								<div class="col-sm-6">
									<button type="button" class="btn btn-primary" id="doneAddMoreBooking"> Done </button>
									<!-- <button type="button" class="btn btn-primary" id="trackBooking"> Close </button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="modal" id="editShowRoomForm" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-simple modal-edit-user">
					<div class="modal-content p-3 p-md-5">
						<div class="modal-body">
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							<div class="text-center mb-4">
								<h3>Edit room</h3>
							</div>
							<div class="row g-3">
								<div class="col-sm-6 form-password-toggle">
									<?php
									$count = [
										'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
									];
									$form->select("add_personEditModal", "Additional Person :", "", "add_personEditModal", "", "", "", $count); ?>
								</div>
								<div class="col-sm-6 form-password-toggle">
									<?php
									$count = [
										'0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10'
									];
									$form->select("seniorEditModal", "No. of senior :", "", "seniorEditModal", "", "", "", $count); ?>
								</div>

								<!-- <div class="col-sm-6 form-password-toggle">
									<label class="form-label" for="formValidationConfirmPass">Promo Code: (*Optional)</label>
									<input type="text" name="promo_code" class="form-control" id="promo_code">
								</div> -->
								<!-- <div class="col-12 col-md-6">
									<label class="form-label" for="senior_pic_id">Senior Pic ID</label>
									<input type="file" id="senior_pic_idModal" name="senior_pic_idModal" class="form-control" />
								</div> -->
								<div class="col-sm-6">
									<label class="form-label" for="modalEditUserFirstName">Extra</label>
									<select name="" id="extraModal" class="form-control">
										<option value="" selected>Select Extra</option>
										<option value="">Unan</option>
									</select>
								</div>
								<div class="col-sm-6">
									<button type="button" class="btn btn-primary" id="editAddMoreBooking"> Done </button>
									<!-- <button type="button" class="btn btn-primary" id="trackBooking"> Close </button> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="content-wrapper" style="margin-right: 5%;">
				<div class="mt-2 mb-5" style="height: 500px; overflow-y: scroll; overflow-x:hidden;">
					<div class="mt-3">
						<div class="row invoice-preview">
							<div class="col-xl-12 col-md-12 col-12 mb-md-0 mb-4">
								<div class="card border-2 border-dark invoice-preview-card">

									<div style="border-bottom:2px solid black;" class="ps-4 pe-4">
										<div class="text-center">
											<img src="home_assets/images/morning7-logo.png" height="70" width="90" alt="">
											<h4>Booking Summary</h4>
										</div>

										<div class="d-flex justify-content-between">
											<h5><b>Check-in</b></h5>
											<h5><span id="checkInDateAndTime">00/00/0000, 0:00:00 AM</span></h5>
										</div>
										<div class="d-flex justify-content-between">
											<h5><b>No. of Hours</b></h5>
											<h5><span id="lengthOfstay">0 Hours</span></h5>
										</div>
										<div class="d-flex justify-content-between">
											<h5><b>Check-out</b></h5>
											<h5><span id="checkOutDateAndTime">00/00/0000, 0:00:00 AM</span></h5>
										</div>
									</div>
									<div id="roomListBookingSummary">
										<div style='border-bottom:2px solid black;' class='ps-4 pe-4 mt-3 d-none spamBooked' id="firstBook">
											<h4><b>Booked room (1)</b></h4>
											<h4><b><span id="roomNameFirst"></span></b></h4>
											<h5>No. of Guest</h5>
											<div class='d-flex justify-content-between'>
												<h5><b><span id="noofQuestLeftFirst"></span></b></h5>
												<h5><span id="noofQuestTotalFirst">0</span>.00</h5>
											</div>
											<div class="d-none" id="additionalPersonFirst">
												<h5>Additional Person</h5>
												<div class='d-flex justify-content-between'>
													<h5><b><span id="additionalPersonLeftFirst">1 x 400.00</span></b></h5>
													<h5><span id="additionalPersonTotal" data-numperson="0">0</span></b></h5>
												</div>
											</div>

											<div class="d-none" id="seniorFirst">
												<h5>Senior</h5>
												<div class='d-flex justify-content-between'>
													<h5><b><span id="seniorLeftFirst">1 x 400.00</span></b></h5>
													<h5><span id="priceseniorTotal" data-numsenior="0">0</span></b></h5>
												</div>
											</div>
											<!-- <div class="d-none" id="extrasFirst">
												<h5>Extras</h5>
												<div class='d-flex justify-content-between'>
													<h5><b>1 x Bed</b></h5>
													<h5>0.00</h5>
												</div>
											</div> -->

										</div>

									</div>

									<div style="border-bottom:2px solid black;" class="ps-4 pe-4">
										<div class="text-right">
											<button type="button" class="btn btn-primary d-none" id="trackBooking"> Add more room </button>
										</div>
										<div class="d-flex justify-content-between">
											<h5>Subtotal</h5>
											<h5><span id="setsubTotal">0</span>.00</h5>
										</div>
										<h5>Promo code</h5>
										<div class="d-flex justify-content-between">
											<h5><span id="ipromoCode"></span></h5>
											<h5>-<span id="discountPromo">0</span>.00</h5>
										</div>
										<div class="d-flex justify-content-between">
											<h5>Tax</h5>
											<h5><span id="taxtInput">0</span>.00</h5>
										</div>
										<div class="d-flex justify-content-between">
											<input type="hidden" id="senior_discount">
										</div>

										<div class="d-flex justify-content-between">
											<h5>Total</h5>
											<h5>Php <span id="totalAllPayment"></span>.00</h5>
										</div>

									</div>
									<div class="d-flex justify-content-between ps-4 pe-4 mt-3">
										<h5>Total Downpayment</h5>
										<h5>Php <span id="totalDownpayment"></span></h5>
									</div>
								</div>

							</div>

						</div>
					</div>

				</div>
				<div class="content-backdrop fade"></div>
			</div>
		</div>
	</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		var arrayData = [];
		var subTotal;
		var resultNumSenior;
		var resultNumPerson;
		var firstNumSenior;
		var firstNumPerson;
		var capacityRoom;
		// var addtitionalPerson;

		$('#promo_code').on('input', function() {
			$('#ipromoCode').text($(this).val().toUpperCase());
			$.get("/get-discount/" + $(this).val().toUpperCase(), function(data, status) {
				if (data != '0') {
					$('#discountPromo').text(data);
				} else {
					$('#discountPromo').text('0');
				}
				totalFunction();
			});

		})
		$('#btn_submit_triggered').on('click', function() {
			arrayData.length = 0;
			$('#roomListBookingSummary .spamBooked').each(function() {
				var $postData = {
					roomId: $(this).find("#noofQuestTotalFirst").data('roomid'),
					roomName: $(this).find("#roomNameFirst").text(),
					priceRoom: $(this).find("#noofQuestTotalFirst").text(),
					priceAdditionPerson: $(this).find("#additionalPersonTotal").text(),
					numAdditionPerson: $(this).find("#additionalPersonTotal").data('numperson'),
					numSeniorTotal: $(this).find("#priceseniorTotal").data('numsenior')
				}
				arrayData.push($postData);
			});

			var form_data = new FormData();

			var senior_pic_id = document.getElementById('senior_pic_id').files.length;
			var upload_valid_id = $('#upload_valid_id').prop('files')[0];
			var paymentPop = $('#paymentPop').prop('files')[0];

			for (var index = 0; index < senior_pic_id; index++) {
				form_data.append("filesenior[]", document.getElementById('senior_pic_id').files[index]);
			}

			form_data.append('upload_valid_id', upload_valid_id);
			form_data.append('paymentPop', paymentPop);

			// Senior
			var senior_discount = $('#senior_discount').val()

			form_data.append('senior_discount', senior_discount);



			// get Booking Element
			var checkIn = $('#checkInDateAndTime').text();
			var checkOut = $('#checkOutDateCalendar').val() + ", " + $('#checkOutDateAndTime2').val();
			var formValidationCheckIn = $('#formValidationCheckIn :selected').val();
			var promo_code = $('#promo_code').val();
			var firstname = $('#firstname').val();
			var lastname = $('#lastname').val();
			var number = $('#number').val();
			var email = $('#email').val();
			var address = $('#address').val();
			var zip_code = $('#zip_code').val();
			var valid_id_number = $('#valid_id_number').val();

			var paymentFirstname = $('#paymentFirstname').val();
			var paymentLastname = $('#paymentLastname').val();
			var paymentAmount = $('#paymentAmount').val();
			var paymentReference = $('#paymentReference').val();

			// Booking details
			form_data.append('checkIn', checkIn);
			form_data.append('checkOut', checkOut);
			form_data.append('promo_code', promo_code);
			form_data.append('formValidationCheckIn', formValidationCheckIn);

			form_data.append('firstname', firstname);
			form_data.append('lastname', lastname);
			form_data.append('number', number);

			form_data.append('email', email);
			form_data.append('address', address);
			form_data.append('zip_code', zip_code);
			form_data.append('valid_id_number', valid_id_number);

			// Payment Details
			form_data.append('paymentFirstname', paymentFirstname);
			form_data.append('paymentLastname', paymentLastname);
			form_data.append('paymentAmount', paymentAmount);
			form_data.append('paymentReference', paymentReference);

			var arrayTojson = JSON.stringify(arrayData);
			form_data.append('BookingRoomLists', arrayTojson);


			// Room Payment List

			var subtotal = $('#setsubTotal').text();
			var discountPromo = $('#discountPromo').text();
			var tax = $('#taxtInput').text();
			var totalAllPayment = $('#totalAllPayment').text();
			var totalDownpaymentRequired = $('#totalDownpayment').text();

			form_data.append('subtotal', subtotal);
			form_data.append('discountPromo', discountPromo);
			form_data.append('tax', tax);
			form_data.append('totalAllPayment', totalAllPayment);
			form_data.append('totalDownpaymentRequired', totalDownpaymentRequired);





			// AJAX request
			$.ajax({
				url: '/booking-record',
				type: 'post',
				data: form_data,
				dataType: 'text',
				contentType: false,
				processData: false,
				success: function(response) {
					// alert(response);
					location.href = '/reciept';
				}
			});
		})


		$('#roomListBookingSummary').on('click', '#removeBookedBtn', function() {
			console.log($(this).data('id'))
			$(this).closest(".spamBooked").remove();
			totalFunction();
		});
		var thisEditButton
		$('#roomListBookingSummary').on('click', '#editBookedBtn', function() {
			// $('#editRoomForm').modal('show');
			thisEditButton = $(this);
			$("#editShowRoomForm").modal("show");

		});

		$('#editAddMoreBooking').on('click', function() {
			var personAdditional = $('#seniorEditModal :selected').val() + 400;
			thisEditButton.closest('.spamBooked').find('#noofQuestTotalFirst').text('dwadwadwa');
		})




		$('#formValidationCheckIn').on('change', function() {
			if ($('#checkInDateCalendar').text() != '00/00/0000') {
				const timeString = $('#checkInDateCalendar').text() + " " + $('#timeCheckIn').val();

				const formValidationCheckIn = $('#formValidationCheckIn :selected').val();
				$('#lengthOfstay').text(formValidationCheckIn + " Hours");
				const date = moment(timeString);
				date.add(formValidationCheckIn, 'h');
				var checkoutFormatted = new Date(date.toString());
				$('#checkOutDateAndTime').text(checkoutFormatted.toLocaleString());
				$('#checkOutDateAndTime2').val(moment().format('h:mm:ss a', checkoutFormatted.toLocaleString()))
				$('#checkOutDateCalendar').val($.datepicker.formatDate('mm/dd/yy', new Date(date.toString())))
				var formattedTime = new Date($('#checkInDateCalendar').text() + " " + $('#timeCheckIn').val())
				$('#checkInDateAndTime').text(formattedTime.toLocaleString());

			}
		});
		$('#timeCheckIn').on('change', function() {
			if ($('#checkInDateCalendar').text() != '00/00/0000') {
				const timeString = $('#checkInDateCalendar').text() + " " + $(this).val();
				const formValidationCheckIn = $('#formValidationCheckIn :selected').val();
				$('#lengthOfstay').text(formValidationCheckIn + " Hours");
				const date = moment(timeString);
				date.add(formValidationCheckIn, 'h');
				var checkoutFormatted = new Date(date.toString());
				$('#checkOutDateAndTime').text(checkoutFormatted.toLocaleString());
				$('#checkOutDateAndTime2').val(moment().format('h:mm:ss a', checkoutFormatted.toLocaleString()))
				$('#checkOutDateCalendar').val($.datepicker.formatDate('mm/dd/yy', new Date(date.toString())))
				var formattedTime = new Date($('#checkInDateCalendar').text() + " " + $(this).val())
				$('#checkInDateAndTime').text(formattedTime.toLocaleString());

			}
		})

		var finalData = [];

		// CalenderAPI
		const events = <?php echo json_encode($calendarAPI); ?>;

		console.log(events);
		const calendarEvent = events.map(event => {
			return {
				title: event.title,
				start: event.check_in,
				end: event.check_in,
				backgroundColor: '#f1c40f',
				textColor: '#fff'
			}
		});

		$('#trackBooking').on('click', function() {
			$.get("/room-lists", function(data, status) {
				$('#seeMore').modal('show');
				$('#insertRoomLists').html(data);
				$('#roomTab #bookNowMoreRoom').on('click', function() {
					$('#seeMore').modal('hide');
					$('#moreRoomForm').modal('show');
					$('#doneAddMoreBooking').data('id', $(this).data('id'));
				});
			});
		});


		var originalPriceByHour = 0;

		$('#doneAddMoreBooking').on('click', function() {
			const id = $(this).data('id');
			var checkInHrs = $("#formValidationCheckIn :selected").val();
			var add_personModal = $('#add_personModal :selected').val();
			var seniorModal = $('#seniorModal :selected').val();
			window.finalData.push({
				roomID: id,
			});
			$.post("/get-book-room", {
					id: id,
					checkInHrs: checkInHrs,
				},
				function(data, status) {
					console.log(data);
					var obj = jQuery.parseJSON(data);
					$('#setPrice1').text(obj.Price);
					$('#setPrice2').text(obj.Price2);
					$('#setPrice3').text(obj.Price3);
					$('#setTypeRoom').text(obj.Type);
					$("#setImageRoom").attr("src", "uploads/" + obj.Picture);
					$('#setCapacityPax').text(obj.Capacity);
					$('#setRoomLeft').text(obj.Room_Count);

					var totalAddPersonModal = add_personModal * 400;
					var totalseniorModalModal = seniorModal * 100;

					var htmlH = "<div style='border-bottom:2px solid #000' class='ps-4 pe-4 mt-3 spamBooked'><h4><b>Booked room (1)</b></h4><h4><b><span id='roomNameFirst'>" + obj.Type + " room </span></b></h4><h5>Room Capacity</h5><div class='d-flex justify-content-between'><h5><b>" + obj.Capacity + " x Adults</b></h5><h5><span data-roomid='" + obj.r_id + "' id='noofQuestTotalFirst'>" + obj.originalPrice + "</span></h5></div>";

					if (add_personModal != 0) {
						htmlH += "<h5>Additional Person</h5><div class='d-flex justify-content-between'><h5><b><span id='AddPersonModalNum'>" + add_personModal + "</span> x 400.00</b></h5><h5><span data-numperson='" + add_personModal + "' id='additionalPersonTotal'>" + totalAddPersonModal + "</span>.00</div>";
					} else {
						htmlH += "<div class='d-none d-flex justify-content-between'><h5><b><span id='AddPersonModalNum'>" + add_personModal + "</span> x 400.00</b></h5><h5><span data-numperson='0' id='additionalPersonTotal'>0</span>.00</div>";
					}

					htmlH += "<div class='d-none'><h5>Senior</h5><div class='d-flex justify-content-between'><h5><b><span id='seniroModalNum'></span> x 100.00</b></h5><h5><span data-numsenior='" + seniorModal + "' id='priceseniorTotal'></span>.00</h5></div></div>";


					// htmlH += "<h5>Extras</h5><div class='d-flex justify-content-between'><h5><b>1 x Bed</b></h5><h5>0.00</h5></div>";
					htmlH += "<div id='removeAndEdit'><button class='btn btn-danger' data-id='" + obj.Type + "' id='removeBookedBtn'>Remove</button></div></div>";

					$('#roomListBookingSummary').append(htmlH);

					$('#moreRoomForm').modal('hide');

					totalFunction();


				});
		});


		function totalFunction() {
			window.subTotal = 0;
			window.resultNumSenior = -1;
			window.resultNumPerson = 0;
			$(".spamBooked").each(function() {
				var noofQuestTotalFirst = $(this).find("#noofQuestTotalFirst").text();
				var AditionalPerson = $(this).find("#additionalPersonTotal").text();

				subTotal += parseInt(noofQuestTotalFirst);
				subTotal += parseInt(AditionalPerson);

			});

			if (parseInt($('#discountPromo').text()) == 0) {
				$('#setsubTotal').text(window.subTotal);
			} else {
				$('#setsubTotal').text(window.subTotal - parseInt($('#discountPromo').text()));
			}


			// Tax Compute
			$(".spamBooked").each(function() {
				var numSenior = $(this).find("#priceseniorTotal").data('numsenior');
				var numPerson = $(this).find("#additionalPersonTotal").data('numperson');
				resultNumSenior += parseInt(numSenior);
				resultNumPerson += parseInt(numPerson);
			});


			window.firstNumSenior = $('#senior :selected').val();
			window.firstNumPerson = $('#add_person :selected').val();

			window.resultNumSenior = parseInt(window.firstNumSenior) + parseInt(window.resultNumSenior);
			window.resultNumPerson = parseInt(window.capacityRoom);

			console.log('SeniorNUm ' + window.resultNumSenior);

			console.log('additionalNUm' + window.resultNumPerson);



			// Computation FInal

			var payable_amount = window.subTotal;
			var fv = payable_amount / 1.12;
			var discount_sr = fv * 0.2;
			var billable_amount = payable_amount - discount_sr;


			var vat = payable_amount * 0.12;


			$('#senior_discount').val(Math.round(discount_sr));
			$('#taxtInput').text(Math.round(vat));
			$('#totalAllPayment').text(Math.round(billable_amount));
			$('#paymentAmount').val(Math.round(billable_amount) * 0.5);
			$('#totalDownpayment').text(Math.round(billable_amount) * 0.5);

		}

		$(".dButton Button").on('click', function() {
			const id = $(this).data('id');
			$("#room_id").val(id);
			$('#setIdRoom').val(id);
			var checkInHrs = $("#formValidationCheckIn :selected").val();
			finalData.push({
				roomID: id,
			});


			$.post("/get-book-room", {
					id: id,
					checkInHrs: checkInHrs,
				},
				function(data, status) {
					console.log(data);
					var obj = jQuery.parseJSON(data);
					$('#setPrice1').text(obj.Price);
					$('#setPrice2').text(obj.Price2);
					$('#setPrice3').text(obj.Price3);
					$('#setTypeRoom').text(obj.Type);
					$("#setImageRoom").attr("src", "uploads/" + obj.Picture);
					$('#setCapacityPax').text(obj.Capacity);
					$('#setRoomLeft').text(obj.Room_Count);

					$("#tbodyContentTr").remove();

					// $("#roomListBookingSummary").append("");
					$('#firstBook').removeClass('d-none');
					$('#roomNameFirst').text(obj.Type + " Room");
					$('#noofQuestLeftFirst').text(obj.Capacity + " x Adults");
					$('#noofQuestTotalFirst').text(obj.originalPrice);
					$('#noofQuestTotalFirst').attr('data-roomid', obj.r_id);

					$('#trackBooking').removeClass('d-none')
					window.capacityRoom = obj.Capacity;
					totalFunction();




				});
		});
	</script>


	<?= $this->endSection(); ?>