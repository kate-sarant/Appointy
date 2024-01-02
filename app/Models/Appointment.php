<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function getRouteKeyName()
    // {
    //     return "uuid";
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'user_id', 'date','time','end'
    ];


}
