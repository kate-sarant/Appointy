<?php

namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Contracts\Mail\Mailable;



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

        // display all the users appointments from db to calendar
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

    //  Incorect data from the user
       if ((date('Y-m-d' ) > $date)|
          ((date('Y-m-d' ) == $date)&
           (!($time > date('G'.':00:00')))
          )){
       
            return redirect()->route("appointments.create")->with('message',"choose a diffrent date ");

       }elseif(date('Y-m-d' ) < $date){
  // Correct data from the user
      
        Auth::user()-> appointment()->create([
            'user_id'=> Auth::id(),
            'time'=>$time,
            'date'=>$request->date,
            'end'=>$request->date.'T'.$end
        ]);
        $user = Auth::user();
        Mail::to($user->email)->send(new AppointmentMail( )); 
   /* test->*/    // Mail::to('fake@mail.com')->send(new AppointmentMail( )); 

            return redirect()->route("appointments.index")->with('success',"appointement booked");  
    }
     
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

       //  Incorect data from the user
         if ((date('Y-m-d' ) > $date)|
            ((date('Y-m-d' ) == $date)&
             (!($time > date('G'.':00:00')))
            )){
         
              return redirect()->route("appointments.create")->with('message',"choose a diffrent date ");
  
         }elseif(date('Y-m-d' ) < $date){
           
         //  Correct data from the user
            Appointment::findOrFail($id)->update([
                'user_id' => Auth::id(),
                'time' => $time,
                'date' => $request->date,
                'end' => $request->date.'T'.$end
            ]);
            $user = Auth::user();
      
                 Mail::to($user->email)->send(new AppointmentMail( )); 
    /* test->*/    // Mail::to('fake@mail.com')->send(new AppointmentMail( )); 

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
            
            Appointment::destroy($id);
            
            return to_route("appointments.index")->with('success','Successfully deleted'); 
            }
      
       
        
    }
}
