<?php

namespace App\Http\Controllers\Carfix;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use App\Repositories\OrderRepository;
use App\Repositories\OfferRepository;
use App\Repositories\CarServicesServiceTypeRepository;
use Auth;

class OrderController extends Controller
{
    private $carRepository;
    private $orderRepository;
    private $offerRepository;
    private $carServicesServiceTypeRepository;

    public function __construct(
        CarRepository $car,
        OrderRepository $order,
        OfferRepository $offer,
        CarServicesServiceTypeRepository $service_type
    ) {
        $this->carRepository = $car;
        $this->orderRepository = $order;
        $this->offerRepository = $offer;
        $this->carServicesServiceTypeRepository = $service_type;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carfix.orders.index', [
            'orders' => $this->orderRepository->getAll(Auth::user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($service_type = '')
    {
        return view('carfix.orders.create', [
            'cars' => $this->carRepository->getAll(Auth::user()->id),
            'service_type' => $service_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->orderRepository->create($request, Auth::user()->id);

        return redirect(route('carfix.orders.show', $order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->getById($id);
        $service_type = $order->service_type ? $order->service_type : 'Diagnostics';
        return view('carfix.orders.show', [
            'order' => $order,
            'services' => $this->carServicesServiceTypeRepository->getByServiceType($service_type),
            'offers' => $this->offerRepository->getAllByOrderId($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = $this->offerRepository->updateOrCreate($request, $id);
        $this->orderRepository->update($id, $offer->id);
        $this->offerRepository->declineTheRest($request, $id);
        return redirect(route('carfix.orders.index'))->withSuccess('Order successfully Accepted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
