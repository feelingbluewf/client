<?php 

namespace App\Repositories;

use App\Repositories\CoreRepository;
use App\Models\Offer as Model;
use Carbon;

class OfferRepository extends CoreRepository {

	public function __construct() {

		parent::__construct();

	}
	
	protected function getModelClass() {

		return Model::class;
		
	}

	// public function getByNotSupportedServiceType(array $service_types) {
	// 	$whereData = [];

	// 	foreach ($service_types as $service_type) {
	// 		$whereData[] = ['service_type', '!=', $service_type];
	// 	}

	// 	return $this->startConditions()
	// 	->where($whereData)
	// 	->where('timer', '>', Carbon\Carbon::now())
	// 	->get();
	// }

	public function updateOrCreate($request, $order_id) {

		return $this->startConditions()
		->updateOrCreate(
			[
				'order_id' => $order_id,
				'service_id' => $request['service_id'],
				'point_id' => $request['point_id']
			],
			[
			'service_type' => $request['service_type'],
			'price' => $request['price'],
			'start' => $request['start'],
			'finish' => Carbon\Carbon::parse($request['start'])->addDays($request['required_time']),
			'is_submitted' => 1,
			'is_autoaccepted' => $request['is_autoaccepted']
		]);
	}

	public function declineTheRest($request, $order_id) {
		return $this->startConditions()
		->where('order_id', $order_id)
		->where('service_id', '!=', $request['service_id'])
		->update([
			'is_submitted' => 2
		]);
	}

	// public function getOrderIds($service_id) {
	// 	$offers = $this->startConditions()
	// 	->where('service_id', $service_id)
	// 	->get();

	// 	$order_ids = [];

	// 	foreach($offers as $offer) {
	// 		$order_ids[] = $offer->order_id;
	// 	}

	// 	return $order_ids;
	// }

	public function getAllByOrderId($order_id) {
		return $this->startConditions()
		->where('order_id', $order_id)
		->get();
	}

}