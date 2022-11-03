<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Libraries\Hash;
use App\Models\AccountModel;
use App\Models\BookingModel;
use App\Models\Carousel_picModel;
use App\Models\DiscountModel;
use App\Models\EventsModel;
use App\Models\GcashModel;
use App\Models\PaymentModel;
use App\Models\RoomsModel;
use NumberToWords\NumberToWords;

class Home extends BaseController
{

	// protected $helpers = ['url', 'form'];
	public $user;

	function __construct()
	{

		helper(['url', 'form', 'array']);
	}

	public function index()
	{
		$rooms = new RoomsModel();
		$pager = \Config\Services::pager();
		$data['roomLists'] = $rooms->limit(3)->findAll();

		return view('index', $data);
	}
	public function Accomodation()
	{
		return view('accomodation');
	}

	public function findReservation()
	{
		return view('find-reservation');
	}

	public function events()
	{
		$events = new EventsModel();

		$data['eventlists'] = $events->findAll();

		return view('events', $data);
	}
	public function services()
	{
		return view('services');
	}

	public function PrintReciept()
	{
		$bookings = new BookingModel();
		$numberToWords = new NumberToWords();
		$data['bookingDetail'] = $bookings->join('booking_payment', 'booking_payment.fb_id = booking.id')->where('booking.id', session()->get('idCurrentBooking'))->first();
		$data['numberTransformer'] = NumberToWords::transformNumber('en', $data['bookingDetail']['paymentAmount']);
		return view('print-reciept', $data);
	}
	public function contactUs()
	{
		return view('contact-us');
	}


	public function sendContactUs()
	{
		$to = 'christopherfrancisco171@gmail.com';
		$subject = 'Customer!';
		$message =  $_POST["messageContactUs"] . '<br><br> From :' . $_POST["nameContactUs"];
		$email = \Config\Services::email();
		$email->setTo($to);
		$email->setFrom('support@fuxdevs-ph.com');
		$email->setReplyTo($_POST["emailContactUs"], $_POST["nameContactUs"]);
		$email->setSubject($subject);
		$email->setMessage($message);

		if ($email->send()) {
			return redirect()->to('/contact-us')->with('success', 'Sending Message Succesfull');
			// echo 'Reset Password sent to your Email. Please verify within 15 mins';
		} else {
			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
	}

	public function roomLists()
	{
		$fetchRooms = new RoomsModel();
		$data['Rooms'] = $fetchRooms->findAll();

		foreach ($data['Rooms'] as $value) {
			echo '<div class="col-md-12">
			<div class="card mb-3">
				<div class="row g-0">
					<div class="col-md-4">
						<img class="card-img card-img-left" src="../../assets/img/elements/12.jpg" alt="Card image" />
					</div>
					<div class="col-md-8">
						<div class="card-body" id="roomTab">
							<h5 class="card-title">' . $value['Type'] . '</h5>
							<p class="card-text h6">
								This is a wider card with supporting text below as a natural lead-in to additional content. This content
								is a
								little bit longer.
							</p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
							<button class="btn-primary btn" data-id="' . $value['r_id'] . '" id="bookNowMoreRoom">Book Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>';
		}
	}

	public function BookingRooms($id = null)
	{
		$rooms = new RoomsModel();
		$gcash = new GcashModel();
		$Booking = new BookingModel();

		$carousel = new Carousel_picModel();

		$data['carousels'] = $carousel->findAll();

		$data['gcashs'] = $gcash->findAll();

		// $data["room"] = $rooms->where('r_id', $id)->first();



		$data['calendarAPI'] = $Booking->findAll();

		foreach ($data['calendarAPI'] as $key => $value) {
			$data['calendarAPI'][$key]['title'] = "Not Available";
			$data['calendarAPI'][$key]['start'] = $value['check_in'];
			$data['calendarAPI'][$key]['end'] = $value['check_in'];
		}

		$data['roomLists'] = $rooms->findAll();
		return view('booking-rooms', $data);
	}

	public function TrackBooking($id = null)
	{

		$booking = new BookingModel();
		$data = $booking->where("book_id", $id)->first();

		echo json_encode($data);
	}

	public function Hotel()
	{

		$rooms = new RoomsModel();
		$pager = \Config\Services::pager();
		// $data['roomLists'] = $rooms->findAll();

		$data = [
			'roomLists' =>  $rooms->paginate(6),
			'pager' => $rooms->pager,
		];

		return view('hotel', $data);
	}



	public function RandomString()
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randstring = '';
		for ($i = 0; $i < 10; $i++) {
			$randstring = $characters[rand(0, strlen($characters))];
		}
		return $randstring;
	}

	public function signIn()
	{

		if (session()->has('LoggedUserData')) {
			session()->setFlashData('error_message', 'You have already Logged in');
			return redirect()->to(base_url() . "/dashboard");
		}

		return view('login');
	}


	function check()
	{
		$validated = $this->validate([
			'email' => [
				'rules' => 'required|valid_email|is_not_unique[users.email]',
				'errors' => [
					'required' => 'Email is required.',
					'valid_email' => 'Email is not valid.',
					'is_not_unique' => 'Email is already registered.'
				]
			],
			'password' => [
				'rules' => 'required|min_length[8]|max_length[20]',
				'errors' => [
					'required' => 'Password is required.',
					'min_length' => 'Password must be at least 8 characters.',
					'max_length' => 'Password must be at most 20 characters.'
				]
			],
		]);

		if (!$validated) {
			return view("/signin", ['validation' => $this->validator]);
		} else {
			echo "Success";
		}
	}


	public function signinAccount()
	{
		$user = new AccountModel();
		$db = db_connect();
		$emailAddress = $this->request->getPost('email');
		$password = $this->request->getPost('password');

		$userAuth = $user->where('email', $emailAddress)->first();

		if (!$userAuth) {
			return redirect()->to('/login')->with('error_message', 'Account not Exist!');
		} else {
			if (md5($password) != $userAuth['password'] || $password == '') {
				session()->setFlashData('error_message', 'Password is incorrect!');
				return redirect()->to('/login')->withInput();
			} else {
				if ($userAuth['role'] == 'Administrator') {
					$adminSession = array(
						'id' => $userAuth['id'],
						'fullname' => $userAuth['fullname'],
						'email' => $userAuth['email'],
						'contact' => $userAuth['contact'],
						'role' => $userAuth['role'],
					);
					$db = \Config\Database::connect();
					$db->query("UPDATE `account` SET `status` = 'Active' WHERE id =" . $userAuth['id']);

					session()->set("LoggedUserData", $adminSession);
					return redirect()->to('/dashboard');
				} else if ($userAuth['role'] == 'Employee') {
					$adminSession = array(
						'id' => $userAuth['id'],
						'fullname' => $userAuth['fullname'],
						'email' => $userAuth['email'],
						'contact' => $userAuth['contact'],
						'role' => $userAuth['role'],
					);
					$db = \Config\Database::connect();
					$db->query("UPDATE `account` SET `status` = 'Active' WHERE id =" . $userAuth['id']);
					session()->set("LoggedUserData", $adminSession);
					return redirect()->to('/dashboard');
				} else {
					return redirect()->to('/login')->with('error_message', 'You are not authorized to access this page!');
				}
			}
		}
	}

	public function signUp()
	{

		if (session()->has('LoggedUserData')) {
			session()->setFlashData('error_message', 'You have already Logged in');
			return redirect()->to(base_url() . "/dashboard");
		}

		return view('signup');
	}

	public function signupAccount()
	{
		// Create Function for Creating Avatar from User Initials

		/* 
			Check if the email is already registered
			if not, create a new user
		*/
		$user = new AccountModel();


		$fullname = $this->request->getPost('fullname');
		$email = $this->request->getPost('email');
		$password = $this->request->getPost('password');
		$contact = $this->request->getPost('contact');

		$userAuth = $user->where('email', $email)->orWhere('contact', $contact)->first();
		$str = rand();
		$recode = sha1($str);

		$userAccountCreate = array(
			'fullname' => $fullname,
			'email' => $email,
			'password' => md5($password),
			'contact' => $contact,
			'recovery_code' => $recode,
			'role' => 'User',
		);


		if (!$userAuth) {
			$user->insert($userAccountCreate);
			session()->setFlashData('success', 'Account Created Successfully.');
			return redirect()->to('/login');
		} else {
			return redirect()->to('/signup')->with('error_message', 'Email Address or Contact Number is already registered.');
		}
	}

	public function forgotPassword()
	{
		$data = [];

		if ($this->request->getMethod() == "post") {
			$rules = [
				'email' => [
					'label' => 'Email Address',
					'rules' => 'required|valid_email',
					'errors' => [
						'required' => 'Email Address is required.',
						'valid_email' => 'Email is not valid.',
					]
				]
			];

			if ($this->validate($rules)) {
				$email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
				$userEmail = $this->verifyEmail($email);
				if (!empty($userEmail)) {
					if ($this->updatedAt($userEmail['recovery_code'])) {
						$to = $email;
						$subject = 'Recover your Account';
						$token = $userEmail['recovery_code'];
						$message =  'Hi ' . $userEmail['fullname'] . '<br><br>'
							. 'Your reset password request has been received. Please click'
							. 'the below link to reset your password.<br><br>'
							. '<a href="' . base_url() . '/reset/' . $token . '">Click here to Reset Password</a><br><br>'
							. 'Thanks<br>Clinic Management System | Appointment Management System';

						$email = \Config\Services::email();
						$email->setTo($to);
						$email->setFrom('support@fuxdevs-ph.com', 'Dental Clinic Management System');
						$email->setSubject($subject);
						$email->setMessage($message);

						if ($email->send()) {
							return redirect()->to('/forgot')->with('success', 'Reset Password sent to your Email. Please verify within 15 mins.', 3);
						} else {
							$data = $email->printDebugger(['headers']);
							print_r($data);
						}
					} else {
						// session()->setTempData('error_message', 'Sorry unabled to Update, Please try Again.', 3);
						return redirect()->to('/forgot')->with('error_message', 'Sorry unabled to Update, Please try Again.', 3);
					}
				} else {
					// session()->setTempData('error_message', 'Email is not registered.', 3);
					return redirect()->to('/forgot')->with('error_message', 'Email is not registered.', 3);
				}
			} else {
				$data['validation'] = $this->validator;
			}
		}
		return view('forgot', $data);
	}



	// function updateDate($id) {
	// 	$db = db_connect();
	// 	$db->query("UPDATE `users` SET updated_at = '".date('Y-m-d h:i:s')."' WHERE recovery_code = '".$id."'");
	// }

	public function resetPassword($token)
	{
		$data = [];
		if (!empty($token)) {
			$userdata = $this->verifyToken($token);
			if (!empty($userdata)) {
				if ($this->checkExpiryDate($userdata['updated_at'])) {
					if ($this->request->getMethod() == 'post') {
						$rules = [
							'password' => [
								'label' => 'Password',
								'rules' => 'required|min_length[8]|max_length[16]',
							],
							're-password' => [
								'label' => 'Confirm Password',
								'rules' => 'required|matches[password]'
							],
						];
						if ($this->validate($rules)) {
							$pwd = $this->request->getPost('password');
							if ($this->updatePassword($token, $pwd)) {
								return redirect()->to(base_url() . '/signin')->with('success', 'Password updated successfully, Login now');
							} else {
								return redirect()->to(current_url())->with('error_message', 'Sorry! Unable to update Password. try again');
							}
						} else {
							$data['validation'] = $this->validator;
						}
					}
				} else {
					$data['error_message'] = 'Reset password link was expired.';
					return redirect()->to(base_url() . '/forgot')->with('error_message', 'Reset password link was expired.');
				}
			} else {
				$data['error_message'] = 'Unable to find user account';
			}
		} else {
			$data['error_message'] = 'Sorry! Unauthourized access';
		}
		return view('reset', $data);
	}



	public function verifyEmail($email)
	{

		$user = new AccountModel();
		$userEmails = $user->where('email', $email)->first();
		if ($userEmails) {
			return $userEmails;
		} else {
			return false;
		}
	}

	public function updatedAt($id)
	{
		$db = db_connect();
		$updates = $db->query("UPDATE `users` SET updated_at = '" . date('Y-m-d h:i:s') . "' WHERE recovery_code = '" . $id . "'");
		if ($updates) {
			return true;
		} else {
			return false;
		}
	}
	public function verifyToken($token)
	{
		$user = new AccountModel();
		$userToken = $user->select('*')->where('recovery_code', $token)->first();
		if ($userToken) {
			return $userToken;
		} else {
			return false;
		}
	}

	public function updatePassword($id, $pwd)
	{
		// $db = db_connect();
		// $user = new UsersModel();
		$str = rand();
		$recode = sha1($str);

		// $data = [
		// 	'password' => md5($pwd),
		// 	'recovery_code' => $recode,
		// ];

		// $user->where('recovery_code', $id);
		// $user->update($data, ['id' => $id]);
		// $builder->update(['password' => md5($pwd), 'recovery_code' => $recode]);
		// $updatePasswords = $db->query("UPDATE `users` SET password = '". $pwd ."' WHERE recovery_code = '". $id ."'");
		// $updateRecoveryCodes = $db->query("UPDATE `users` SET recovery_code = '". $recode ."' WHERE recovery_code = '". $id ."'");

		// if($user)
		// {
		//     return true;
		// }
		// else
		// {
		//     return false;
		// }

		$user = new AccountModel();

		$db = db_connect();
		$updatePassword = $db->query("UPDATE `users` SET password = '" . md5($pwd) . "', recovery_code = '" . $recode . "' WHERE recovery_code = '" . $id . "'");

		if ($updatePassword) {
			return true;
		} else {
			return false;
		}
	}

	public function checkExpiryDate($time)
	{
		$timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);
		if ($timeDiff < 900) {
			return true;
		} else {
			return false;
		}
	}

	public function signOut()
	{
		$session = session();
		if (!(session()->get('LoggedUserData'))) {
			$session->destroy();
			session()->setFlashData("success", "Logout Successfully");
			return redirect()->to(base_url() . "/login");
		} else if (session()->has('LoggedUserData')) {
			$session->destroy();
			session()->setFlashData("success", "Logout Successfully");
			return redirect()->to(base_url() . "/login");
		} else {
			session()->setFlashData("error_message", "Failed to Logout, Please Try Again");
			return redirect()->to(base_url() . "/dashboard");
		}
	}
	public function Discount($id = null)
	{
		$discount = new DiscountModel();

		$result = $discount->where('Discount_Code', $id)->first();
		if (!$result) {
			echo '0';
		} else {
			echo $result['Discount_Amount'];
		}
	}
	public function getBookRoom()
	{
		$room = new RoomsModel();
		$rooms = new RoomsModel();
		$room_id = $rooms->where('r_id', $_POST['id'])->first();
		if ($_POST['checkInHrs'] == 6) {
			$r_hrs = $room_id['Price'];
		} elseif ($_POST['checkInHrs'] == 12) {
			$r_hrs = $room_id['Price2'];
		} elseif ($_POST['checkInHrs'] == 24) {
			$r_hrs = $room_id['Price3'];
		}
		$data = $room->where('r_id', $_POST['id'])->first();
		$data['originalPrice'] = $r_hrs;

		echo json_encode($data);
	}
}
