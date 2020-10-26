<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'car_id',
    	'service_type',
    	'additional_info',
    	'is_submitted',
        'offer_id',
        'timer'
    ];

    public function car() {
    	return $this->belongsTo('App\Models\Car', 'car_id', 'id');
    }

    public function offer() {
        return $this->HasOne('App\Models\Offer', 'id', 'offer_id');
    }

}
