<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookingModel;

class DashboardController extends BaseController
{
    public function index()
    {

        $Booking = new BookingModel();

        $data['calendarAPI'] = $Booking->findAll();
        
        foreach($data['calendarAPI'] as $key => $value) {
            $data['calendarAPI'][$key]['title'] = $value['first_name'] . $value['last_name'];
            $data['calendarAPI'][$key]['start'] = $value['check_in'];
            $data['calendarAPI'][$key]['end'] = $value['check_in'];
        }

     
        return view('admin/index', $data);
    }
}
