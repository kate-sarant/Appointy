<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;



class FullCalenderController extends Controller
{
    public function index()
    {
       
        $events = Appointment::all();
      
        return view('appointments.create',['events'=>$events]);
    }

 


}
?>
