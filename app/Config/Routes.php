<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.



$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::signIn');
$routes->get('/signup', 'Home::signUp');
$routes->get('/signout', 'Home::signOut');
$routes->add('/forgot', 'Home::forgotPassword');
$routes->add('/reset/(:any)', 'Home::resetPassword/$1');
$routes->post('/signinAccount', 'Home::signinAccount');
$routes->post('/signupAccount', 'Home::signupAccount');
$routes->get('/accomodation', 'Home::Accomodation');
$routes->get('/find-reservation', 'Home::findReservation');
$routes->get('/hotel', 'Home::Hotel');
$routes->get('/booking-rooms', 'Home::BookingRooms');
$routes->get('/service', 'Home::services');
$routes->get('/event', 'Home::events');
$routes->get('/contact-us', 'Home::contactUs');
$routes->get('/room-lists', 'Home::roomLists');
$routes->get('/get-discount/(:any)', 'Home::Discount/$1');

$routes->post('/booking-record', 'OtherController::BookingRecorder');
$routes->get('/reciept', 'OtherController::Reciept');
$routes->get('/reciept-walkin', 'OtherController::RecieptWalkin');

$routes->get('/booking-add', 'OtherController::bookingCreate');
$routes->post('/insert-walkin-booking', 'OtherController::insertWalkinBooking');
$routes->get('/sales-report', 'OtherController::salesReport');
$routes->get('/inventory-report', 'OtherController::inventoryReport');
$routes->get('/reservation-report', 'OtherController::reservationReport');


// sub
$routes->post('/moc', 'OtherController::moc');
$routes->post('/available', 'OtherController::available');

$routes->get('/room-subs', 'OtherController::roomSubs');




$routes->get('/room-sub', 'OtherController::roomSub');

$routes->get('/get-room/(:any)', 'OtherController::getRoom/$1');
$routes->get('/booking-list-walkin', 'OtherController::bookingListWalkin');

// Online Booking
$routes->get('/booking-pending-list', 'OtherController::bookingPendingList');
$routes->get('/booking-approved-list', 'OtherController::bookingApprovedList');
$routes->get('/booking-rejected-list', 'OtherController::bookingRejectedList');
$routes->get('/booking-list-online', 'OtherController::bookingRejectedOnline');


// Fetch Booking
$routes->get('/fetch-booking-info/(:any)', 'OtherController::fetchBookingInfo/$1');
$routes->get('/fetch-booking-payment/(:any)', 'OtherController::fetchBookingPayment/$1');

$routes->get('/fetch-booking-rooms/(:any)', 'OtherController::fetchBookingRooms/$1');



$routes->get('/fetch-booking-mpic/(:any)', 'OtherController::fetchBookingMpic/$1');

$routes->get('/booking-approved/(:any)', 'OtherController::bookingApproved/$1');

$routes->get('/booking-rejected/(:any)', 'OtherController::bookingRejected/$1');


$routes->get('/track-booking/(:any)', 'Home::TrackBooking/$1');


$routes->get('/print-reciept', 'Home::PrintReciept');

$routes->post('/sendContactUs', 'Home::sendContactUs');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'authGuard']);

$routes->post('/get-book-room', 'Home::getBookRoom');

// Rooms Modules
$routes->get('/rooms', 'RoomsController::index', ['filter' => 'authGuard']);
$routes->get('/create-rooms', 'RoomsController::createRoomsView', ['filter' => 'authGuard']);
$routes->post('/add-rooms', 'RoomsController::createRooms', ['filter' => 'authGuard']);
$routes->get('/edit-rooms/(:any)', 'RoomsController::editRoomsView/$1', ['filter' => 'authGuard']);
$routes->post('/update-rooms/(:any)', 'RoomsController::updateRooms/$1', ['filter' => 'authGuard']);
$routes->get('/delete-rooms/(:any)', 'RoomsController::deleteRooms/$1', ['filter' => 'authGuard']);
$routes->get('/table-rooms', 'RoomsController::tableRooms');
$routes->get('/api-rooms', 'RoomsController::fetchRooms');
$routes->get('/apis-rooms/(:any)', 'RoomsController::fetchAPIsRooms/$1');


// Discount Modules
$routes->get('/discount', 'DiscountController::index', ['filter' => 'authGuard']);
$routes->get('/create-discount', 'DiscountController::createDiscountView', ['filter' => 'authGuard']);
$routes->post('/add-discount', 'DiscountController::createDiscount', ['filter' => 'authGuard']);
$routes->get('/edit-discount/(:any)', 'DiscountController::editDiscountView/$1', ['filter' => 'authGuard']);
$routes->post('/update-discount/(:any)', 'DiscountController::updateDiscount/$1', ['filter' => 'authGuard']);
$routes->get('/delete-discount/(:any)', 'DiscountController::deleteDiscount/$1', ['filter' => 'authGuard']);
$routes->get('/table-discount', 'DiscountController::tableDiscount');
$routes->get('/api-discount', 'DiscountController::fetchDiscount');
$routes->get('/apis-discount/(:any)', 'DiscountController::fetchAPIsDiscount/$1');


// Extras Modules
$routes->get('/extras', 'ExtrasController::index', ['filter' => 'authGuard']);
$routes->get('/create-extras', 'ExtrasController::createExtrasView', ['filter' => 'authGuard']);
$routes->post('/add-extras', 'ExtrasController::createExtras', ['filter' => 'authGuard']);
$routes->get('/edit-extras/(:any)', 'ExtrasController::editExtrasView/$1', ['filter' => 'authGuard']);
$routes->post('/update-extras/(:any)', 'ExtrasController::updateExtras/$1', ['filter' => 'authGuard']);
$routes->get('/delete-extras/(:any)', 'ExtrasController::deleteExtras/$1', ['filter' => 'authGuard']);
$routes->get('/table-extras', 'ExtrasController::tableExtras');
$routes->get('/api-extras', 'ExtrasController::fetchExtras');
$routes->get('/apis-extras/(:any)', 'ExtrasController::fetchAPIsExtras/$1');


// Gcash Modules
$routes->get('/gcash', 'GcashController::index', ['filter' => 'authGuard']);
$routes->get('/create-gcash', 'GcashController::createGcashView', ['filter' => 'authGuard']);
$routes->post('/add-gcash', 'GcashController::createGcash', ['filter' => 'authGuard']);
$routes->get('/edit-gcash/(:any)', 'GcashController::editGcashView/$1', ['filter' => 'authGuard']);
$routes->post('/update-gcash/(:any)', 'GcashController::updateGcash/$1', ['filter' => 'authGuard']);
$routes->get('/delete-gcash/(:any)', 'GcashController::deleteGcash/$1', ['filter' => 'authGuard']);
$routes->get('/table-gcash', 'GcashController::tableGcash');
$routes->get('/api-gcash', 'GcashController::fetchGcash');
$routes->get('/apis-gcash/(:any)', 'GcashController::fetchAPIsGcash/$1');

// Events Modules
$routes->get('/events', 'EventsController::index');
$routes->get('/create-events', 'EventsController::createEventsView');
$routes->post('/add-events', 'EventsController::createEvents');
$routes->get('/edit-events/(:any)', 'EventsController::editEventsView/$1');
$routes->post('/update-events/(:any)', 'EventsController::updateEvents/$1');
$routes->get('/delete-events/(:any)', 'EventsController::deleteEvents/$1');
$routes->get('/table-events', 'EventsController::tableEvents');
$routes->get('/api-events', 'EventsController::fetchEvents');
$routes->get('/apis-events/(:any)', 'EventsController::fetchAPIsEvents/$1');


// Carousel_pic Modules
$routes->get('/carousel_pic', 'Carousel_picController::index');
$routes->get('/create-carousel_pic', 'Carousel_picController::createCarousel_picView');
$routes->post('/add-carousel_pic', 'Carousel_picController::createCarousel_pic');
$routes->get('/edit-carousel_pic/(:any)', 'Carousel_picController::editCarousel_picView/$1');
$routes->post('/update-carousel_pic/(:any)', 'Carousel_picController::updateCarousel_pic/$1');
$routes->get('/delete-carousel_pic/(:any)', 'Carousel_picController::deleteCarousel_pic/$1');
$routes->get('/table-carousel_pic', 'Carousel_picController::tableCarousel_pic');
$routes->get('/api-carousel_pic', 'Carousel_picController::fetchCarousel_pic');
$routes->get('/apis-carousel_pic/(:any)', 'Carousel_picController::fetchAPIsCarousel_pic/$1');


// Account Modules
$routes->get('/account', 'AccountController::index');
$routes->get('/account-monitoring', 'AccountController::AccountMonitoring');
$routes->get('/create-account', 'AccountController::createAccountView');
$routes->post('/add-account', 'AccountController::createAccount');
$routes->get('/edit-account/(:any)', 'AccountController::editAccountView/$1');
$routes->post('/update-account/(:any)', 'AccountController::updateAccount/$1');
$routes->get('/delete-account/(:any)', 'AccountController::deleteAccount/$1');
$routes->get('/table-account', 'AccountController::tableAccount');
$routes->get('/api-account', 'AccountController::fetchAccount');
$routes->get('/apis-account/(:any)', 'AccountController::fetchAPIsAccount/$1');

###RouterGen###





















/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
