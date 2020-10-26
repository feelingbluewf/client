<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Car as Model;

class CarRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	public function create($request, $user_id) {
		return $this->startConditions()
		->create([
			'user_id' => $user_id,
			'vin' => $request['vin'],
			'car_number' => $request['car_number'],
			'brand' => $request['brand'],
			'model' => $request['model'],
			'year' => $request['year']
		]);
	}

	public function getAll($user_id) {
		return $this->startConditions()
		->where('user_id', $user_id)
		->get();
	}

}