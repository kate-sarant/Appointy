<?php

namespace Database\Factories;

use App\Models\User;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        
        $users = User::all();
        
        $userRandom = $users->random();
        $date = $this->faker->dateTimeBetween('now', '+30 days')->format('Y-m-d'); // Random date within the next 30 days
        $time = $this->faker->time('H:00:00'); // Random time in hours format
        
        $startDateTime = new DateTime($date . ' ' . $time);
        $endDateTime = (clone $startDateTime)->modify('+1 hour');
        return [
         
  
                'user_id' => $userRandom->id,
                'date' => $date,
                'time' => $time,
                'end' => $endDateTime->format('Y-m-d H:i:s'),
      
            
        ];
        
  
        
  
      
        
     
        
    }
}
