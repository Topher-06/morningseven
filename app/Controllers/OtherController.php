<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\BookingMpic;
use App\Models\BookingPayment;
use App\Models\BookingRooms;
use App\Models\Carousel_picModel;
use App\Models\GcashModel;
use App\Models\RoomsModel;
use App\Models\RoomSubModel;
use App\Models\WalkinModel;
use NumberToWords\NumberToWords;

class OtherController extends BaseController
{
    public function index()
    {
        //
    }

    public function BookingRecorder()
    {

        $booking = new BookingModel();
        $bookingmpic = new BookingMpic();
        $bookingPayment = new BookingPayment();
        $bookingrooms = new BookingRooms();


        $bookingID  = "MSRH-" . $this->generateRandomString() . date("mdy");

        if ($img1 = $this->request->getFile('upload_valid_id')) {
            if ($img1->isValid() && !$img1->hasMoved()) {
                $uvidName = $img1->getRandomName();
                $img1->move('uploads/', $uvidName);
            }
        }

        $data = array(
            'book_id' => $bookingID,
            'check_in' => $_POST['checkIn'],
            'check_out' => $_POST['checkOut'],
            'no_of_hours' => $_POST['formValidationCheckIn'],
            'promo_code' => $_POST['promo_code'],
            'first_name' => $_POST['firstname'],
            'last_name' => $_POST['lastname'],
            'number' => $_POST['number'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'zip_code' => $_POST['zip_code'],
            'status' => 'Pending',
            'valid_id_number' => $_POST['valid_id_number'],
            'any_valid_id_pic' => $uvidName,
            'subtotal' => $_POST['subtotal'],
            'promo_code_price' => $_POST['discountPromo'],
            'tax' => $_POST['tax'],
            'all_total' => $_POST['totalAllPayment'],
            'total_downpayment_required' => $_POST['totalDownpaymentRequired'],
            'senior_discount' => $_POST['senior_discount']
        );

        // print_r($data);

        if ($idBooking = $booking->insert($data)) {
            session()->set('idCurrentBooking', $idBooking);
            if ($this->request->getFileMultiple('filesenior')) {
                foreach ($this->request->getFileMultiple('filesenior') as $file) {
                    $filename = $file->getRandomName();
                    $file->move('uploads/', $filename);
                    $dataPic = array(
                        'fb_id' => $idBooking,
                        'bm_picture' => $filename,
                    );
                    // print_r($dataPic);
                    $bookingmpic->insert($dataPic);
                }
            }

            if ($img2 = $this->request->getFile('paymentPop')) {
                if ($img2->isValid() && !$img2->hasMoved()) {
                    $ppopName = $img2->getRandomName();
                    $img2->move('uploads/', $ppopName);
                }
            }

            // Insert Payment
            $dataPayment = array(
                'fb_id' => $idBooking,
                'paymentFirstname' => $_POST['paymentFirstname'],
                'paymentLastname' => $_POST['paymentLastname'],
                'paymentAmount' => $_POST['paymentAmount'],
                'paymentReference' => $_POST['paymentReference'],
                'paymentPop' => $ppopName
            );



            $bookingPayment->insert($dataPayment);

            // BookingRooms List
            $jsonToarray = json_decode($_POST['BookingRoomLists'], true);
            // print_r($jsonToarray);
            foreach ($jsonToarray as $key => $BookingRoom) {
                $dataBR = array(
                    'fb_id' => $idBooking,
                    'roomId' => $BookingRoom['roomId'],
                    'roomName' => $BookingRoom['roomName'],
                    'priceRoom' => $BookingRoom['priceRoom'],
                    'priceAdditionPerson' => $BookingRoom['priceAdditionPerson'],
                    'numAdditionPerson' => $BookingRoom['numAdditionPerson'],
                    'numSeniorTotal' => $BookingRoom['numSeniorTotal']
                );

                // print_r($dataBR);
                $bookingrooms->insert($dataBR);
            }
        }
    }

    function generateRandomString($length = 5)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function Reciept()
    {
        $bookings = new BookingModel();
        $numberToWords = new NumberToWords();
        $data['bookingDetail'] = $bookings->join('booking_payment', 'booking_payment.fb_id = booking.id')->where('booking.id', session()->get('idCurrentBooking'))->first();
        $data['numberTransformer'] = NumberToWords::transformNumber('en', $data['bookingDetail']['paymentAmount']);
        return view('reciept', $data);
    }

    public function RecieptWalkin()
    {
        $walkin = new WalkinModel();
        $numberToWords = new NumberToWords();
        $data['bookingDetail'] = $walkin->where('w_id', session()->get('idCurrentBooking'))->first();
        $data['numberTransformer'] = NumberToWords::transformNumber('en', $data['bookingDetail']['w_all_total']);

        return view('booking/reciept_walkin', $data);
    }



    public function bookingListWalkin()
    {
        $walkin = new WalkinModel();
        $data['walkins'] = $walkin->join('rooms', 'rooms.r_id = walkin.w_rid')->findAll();
        return view('booking/booking_list_walkin', $data);
    }

    public function bookingCreate()
    {
        $room = new RoomsModel();
        $data['rooms'] = $room->findAll();
        return view('booking/booking_add', $data);
    }

    public function getRoom($id = null)
    {
        $room = new RoomsModel();
        $data = $room->where('r_id', $id)->first();

        echo json_encode($data);
    }

    public function insertWalkinBooking()
    {

        $walking = new WalkinModel();
        $bookingID  = "MSRHW-" . $this->generateRandomString() . date("mdy");



        $data = array(
            'w_rid' => $_POST['w_rid'],
            'w_book_id' => $bookingID,
            'w_check_in' => $_POST['w_check_in'],
            'w_first_name' => $_POST['w_first_name'],
            'w_last_name' => $_POST['w_last_name'],
            'w_number' => $_POST['w_number'],
            'w_email' => $_POST['w_email'],
            'w_address' => $_POST['w_address'],
            'w_zip_code' => $_POST['w_zip_code'],
            'w_subtotal' => $_POST['w_subtotal'],
            'w_tax' => $_POST['w_tax'],
            'w_all_total' => $_POST['w_all_total'],
            'w_senior_discount' => $_POST['w_senior_discount'],
            'w_seniorNum' => $_POST['w_seniorNum'],
            'w_pricePerson' => $_POST['w_pricePerson'],
            'w_personNum' => $_POST['w_personNum'],
            'w_valid_id_number' => $_POST['w_valid_id_number'],
            'w_check_out' => $_POST['w_check_out']
        );

        $id = $walking->insert($data);

        session()->set('idCurrentBooking', $id);
    }

    public function bookingPendingList()
    {

        $booking = new BookingModel();
        $data['bookings'] = $booking->where('status', 'Pending')->findAll();
        return view('onlinebooking/pending_list', $data);
    }

    public function bookingApprovedList()
    {
        $booking = new BookingModel();
        $data['bookings'] = $booking->where('status', 'Approved')->findAll();
        return view('onlinebooking/approved_list', $data);
    }

    public function bookingRejectedList()
    {
        $booking = new BookingModel();
        $data['bookings'] = $booking->where('status', 'Rejected')->findAll();
        return view('onlinebooking/rejected_list', $data);
    }

    public function bookingRejectedOnline()
    {
        $booking = new BookingModel();
        $data['bookings'] = $booking->findAll();
        return view('onlinebooking/all_list', $data);
    }

    public function fetchBookingInfo($id = null)
    {
        $booking = new BookingModel();
        $data = $booking->where('id', $id)->first();

        echo json_encode($data);
    }

    public function fetchBookingPayment($id = null)
    {
        $booking = new BookingPayment();
        $data = $booking->where('fb_id', $id)->first();
        echo json_encode($data);
    }
    public function fetchBookingMpic($id = null)
    {
        $booking = new BookingMpic();
        $data = $booking->where('fb_id', $id)->findAll();
        echo json_encode($data);
    }
    public function bookingApproved($id = null)
    {
        $booking = new BookingModel();

        $booking->set('status', 'Approved');
        $booking->where('id', $id);
        $booking->update();
    }

    public function bookingRejected($id = null)
    {
        $booking = new BookingModel();

        $booking->set('status', 'Rejected');
        $booking->where('id', $id);
        $booking->update();
    }


    public function fetchBookingRooms($id = null)
    {
        $bookingrooms = new BookingRooms();
        $rooms = new RoomsModel();
        $resultBooking = $bookingrooms->where('fb_id', $id)->findAll();

        $array = array();
        foreach ($resultBooking as $key => $BookingRooms) {
            $fresult = $rooms->where('r_id', $BookingRooms['roomId'])->first();
            $arr = [
                'Picture' => $fresult['Picture'],
                'Category' => $fresult['Category'],
                'Type' => $fresult['Type'],
                'Capacity' => $fresult['Capacity'],
                'Room_Count' => $fresult['Room_Count']
            ];

            array_push($array, $arr);
        }

        echo json_encode($array);
    }
    public function salesReport()
    {
        $booking = new BookingModel();
        $data['bookings'] = $booking->where('status', 'Approved')->findAll();
        return view('report/sales_report', $data);
    }
    public function inventoryReport()
    {
        $room = new RoomsModel();
        $data['rooms'] = $room->findAll();
        return view('report/inventory_report', $data);
    }
    public function reservationReport()
    {
        $booking = new BookingModel();
        $data['Bookings'] = $booking->select("id,first_name,last_name,`check_in`, `check_out`,`created_at`,GROUP_CONCAT(rooms.Type SEPARATOR ',') AS allRooms")->join('booking_rooms', 'booking_rooms.fb_id = booking.id')->join('rooms', 'rooms.r_id = booking_rooms.roomId')->groupBy('booking_rooms.fb_id')->findAll();
        return view('report/reservation_report', $data);
    }


    public function roomSub()
    {
        $fetchRooms = new RoomsModel();
        $data['Rooms'] = $fetchRooms->findAll();
        return view('rooms/room_list_sub', $data);
    }

    public function roomSubs()
    {
        $subsRoom = new RoomSubModel();
        $data['Rooms'] = $subsRoom->select('*,COUNT(rls_name) as num_rls')->groupBy('rls_name')->findAll();
        return view('rooms/room_list_subs', $data);
    }



    public function moc()
    {
        $roomSub = new RoomSubModel();
        $rooms = new RoomsModel();

        $data = array(
            'r_id' => $_POST['r_id'],
            'rls_name' => $_POST['name'],
            'status' => $_POST['status']
        );
        if ($roomSub->insert($data)) {
            $rooms->set('Room_Count', '`Room_Count` - 1', false);
            $rooms->where('r_id', $_POST['r_id']);
            $rooms->update();
        }
    }

    public function available()
    {
        $roomSub = new RoomSubModel();
        $rooms = new RoomsModel();
        $result = $roomSub->where('rls_id', $_POST['d_id'])->first();

        $rooms->set('Room_Count', '`Room_Count` + 1', false);
        $rooms->where('r_id', $result['r_id']);
        if ($rooms->update()) {
            $roomSub->where('rls_id', $_POST['d_id']);
            $roomSub->delete();
        }
    }
}
