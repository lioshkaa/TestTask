<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recored extends Model
{
    use HasFactory;

    protected $guarded = false;


    protected $fillable = [
        'user_id',
        'start_record',
        'stop_record',
        'date_day',
        'client_id'
    ];
    public function user(){

        return $this->belongsTo(User::class,'user_id','id');

    }
}
