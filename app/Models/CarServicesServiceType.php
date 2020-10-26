<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarServicesServiceType extends Model
{
	use HasFactory;

	protected $fillable = [
		'id',
		'service_id',
		'point_id',
		'service_type',
		'price',
		'required_time',
		'created_at',
		'updated_at'
	];

	public function details() {
		return $this->belongsTo('App\Models\CarServicesDetail', 'service_id', 'id');
	}

	public function point() {
		return $this->belongsTo('App\Models\CarServicesPoint', 'point_id', 'id');
	}

}
