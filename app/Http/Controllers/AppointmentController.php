<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $appointments = Appointment::where('user_id', Auth::id())->paginate(2);

        return view("appointments.index",compact('appointments'))->with('links', $appointments->links());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $events =array();
        $bookings = Appointment::all();
        
        foreach ($bookings as $booking){     
        $events[]=[
            'title'=>'booked',
            'start'=> $booking->date.'T'.$booking->time,
            $end = str_replace(" ","T",$booking->end),
            'end' => $end
        ];
   
        }
         return view('appointments/create',['events' =>$events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
      
        
        //   validation -required inputs
        $request->validate([
          'time'=>"required",
          'date'=>"required",
        ]);

        
        //   validation --date and time 
        $time = date("H:i:s", ($request->time)* 3600);
        $end =strtotime($time)+3600;
        $end = date("H:i:s", ($end));
        $date =$request->date;

        date_default_timezone_set('Europe/Athens');
      
       if ((date('Y-m-d' ) > $date)|
          ((date('Y-m-d' ) == $date)&
           (!($time > date('G'.':00:00')))
          )){
       
            return redirect()->route("appointments.create")->with('message',"choose a diffrent date ");

       }elseif(date('Y-m-d' ) < $date){

      
        Auth::user()-> appointment()->create([
            'user_id'=> Auth::id(),
            // 'uuid'=> Str::uuid(),
            'time'=>$time,
            'date'=>$request->date,
            'end'=>$request->date.'T'.$end
        ]);
    
            return redirect()->route("appointments.index")->with('success',"appointement booked");  
    }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    
    {


        return view('appointments.edit',['appointment'=>$appointment]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    
        //   validation -required inputs
        $request->validate([
            'time'=>"required",
            'date'=>"required",
          ]);
  
          
          //   validation --date and time 
          $time = date("H:i:s", ($request->time)* 3600);
          $end =strtotime($time)+3600;
          $end = date("H:i:s", ($end));
          $date =$request->date;
  
          date_default_timezone_set('Europe/Athens');
        
         if ((date('Y-m-d' ) > $date)|
            ((date('Y-m-d' ) == $date)&
             (!($time > date('G'.':00:00')))
            )){
         
              return redirect()->route("appointments.create")->with('message',"choose a diffrent date ");
  
         }elseif(date('Y-m-d' ) < $date){
           
        
            Appointment::findOrFail($id)->update([
                'user_id' => Auth::id(),
                'time' => $time,
                'date' => $request->date,
                'end' => $request->date.'T'.$end
            ]);
            
      
              return redirect()->route("appointments.index")->with('success',"appointement booked");
      
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Appointment::findOrFail($id)->user_id ==  Auth::id()){
            // $appoitment = Appointment::findOrfFail($id);
            Appointment::destroy($id);
            
            return to_route("appointments.index")->with('success','Successfully deleted'); 
            }
      
       
        
    }
}
