@extends('layouts.app')

@section('styles')

<style>
    .py-4 {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
</style>

@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col" style="padding-right: 0; padding-left: 0;">
            <div class="card" style="border: none;">
                <div class="card-header text-center" style="font-weight: 600;">
                    {{ __('Order submitted!') }}
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <p id="timer" style="font-size: 20px; margin: 0;"></p>
                        <span>Remaining time:</span>
                    </div>
                    <div class="text-center pb-0" style="font-size: 24px;">
                        <div class="progress" style="width: 50%; position: relative; left: 25%">
                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" id="progressbar"></div>
                        </div>
                    </div>
                    <div class="text-center" style="font-size: 20px;">
                        @if(count($offers) == 0 && count($services) == 0)
                        <span id="tip">Requesting information...</span>
                        <div class="text-center mt-4">
                            <h5>Hold tight! Soon you will receive best offers for the service work that you requested!</h5>
                            <h5>We will notify you as soon as the offers are ready!</h5>
                        </div>
                        @else
                        <span id="tip">Wait for the full list of offers!</span>
                        @endif
                    </div>
                    @forelse($services as $service)
                    <div id="accept{{ $service->details->service_id }}" class="modal" style="padding: 0;">
                        <div class="card-header" style="font-weight: 600; margin: 0;">
                            {{ $service->details->name }}
                        </div>
                        <div style="padding: 15px 30px;">
                            <form action="{{ route('carfix.orders.update', $order->id) }}" method="POST">
                                @csrf
                                <div class="form-group has-feedback">
                                    <label for="point">Service point</label>
                                    <input type="text" class="form-control" value="{{ $service->point->address . ', ' . $service->point->city }}" name="point" disabled>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="service">Service type</label>
                                    <input type="text" class="form-control" value="{{ $order->service_type }}" name="service" disabled>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" value="{{ $service->price }}€" name="price" disabled required>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="start">Start time</label>
                                    <input type="datetime-local" class="form-control" name="start" required>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <input type="hidden" value="{{ $order->service_type }}" name="service_type" required>
                                <input type="hidden" value="{{ $service->details->service_id }}" name="service_id" required>
                                <input type="hidden" value="{{ $service->point->id }}" name="point_id" required>
                                <input type="hidden" value="{{ $service->price }}" name="price" required>
                                <input type="hidden" value="{{ $service->required_time }}" name="required_time" required>
                                <input type="hidden" value="1" name="is_autoaccepted" required>
                                <input type="hidden" value="PUT" name="_method">
                                <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="row text-center mb-2" style="border: 2px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; align-items: center;">
                        <div class="col-3">
                            <img src="{{ asset("pictures/logo$loop->index.jpg") }}" alt="logo{{ $loop->index }}" width="100%">
                            <i class="fas fa-star" style="font-size: 16px; color: gold;"></i> 5.0 (1)
                        </div>
                        <div class="col-6" style="font-size: 12px;">
                            <strong>{{ $service->details->name }}</strong><br>
                            <span>{{ $service->point->address . ', ' . $service->point->city }} - 5 km from you</span><br>
                            <strong>Date, time: </strong><span>{{ Carbon\Carbon::parse($service->point->start_time)->format('D (d.m), H:i') }}</span><br>
                            <strong>To be finished by: </strong><span>{{ Carbon\Carbon::parse($service->point->start_time)->addDays($service->required_time)->format('D (d.m), H:i') }}</span>
                        </div>
                        <div class="col-3">
                            <strong>{{ $service->price }}€</strong><br>
                            <a href="#accept{{ $service->details->service_id }}" rel="modal:open" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">
                                    Accept
                                </button>
                            </a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    @forelse($offers as $offer)
                    <div id="accept{{ $offer->details->servce_id }}" class="modal" style="padding: 0;">
                        <div class="card-header" style="font-weight: 600; margin: 0;">
                            {{ $offer->details->name }}
                        </div>
                        <div style="padding: 15px 30px;">
                            <form action="{{ route('carfix.orders.update', $order->id) }}" method="POST">
                                @csrf
                                <div class="form-group has-feedback">
                                    <label for="point">Service point</label>
                                    <input type="text" class="form-control" value="{{ $offer->point->address . ', ' . $offer->point->city }}" name="point" disabled>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="service">Service type</label>
                                    <input type="text" class="form-control" value="{{ $order->service_type }}" name="service" disabled>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" value="{{ $offer->price }}€" name="price" disabled required>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="start">Start time</label>
                                    <input type="datetime-local" class="form-control" name="start" required>
                                    <span class="glyphicon form-control-feedback"></span>
                                </div>
                                <input type="hidden" value="{{ $order->id }}" name="order_id" required>
                                <input type="hidden" value="{{ $order->service_type }}" name="service_type" required>
                                <input type="hidden" value="{{ $offer->service_id }}" name="service_id" required>
                                <input type="hidden" value="{{ $offer->point_id }}" name="point_id" required>
                                <input type="hidden" value="{{ $offer->price }}" name="price" required>
                                <input type="hidden" value="1" name="required_time" required>
                                <input type="hidden" value="0" name="is_autoaccepted" required>
                                <input type="hidden" value="PUT" name="_method">
                                <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px;">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="row text-center mb-2" style="border: 2px solid rgba(0, 0, 0, 0.125); border-radius: 0.25rem; align-items: center;">
                        <div class="col-3">
                            <img src="{{ asset("pictures/logo2.jpg") }}" alt="logo{{ $loop->index }}" width="100%">
                            <i class="fas fa-star" style="font-size: 16px; color: gold;"></i> 5.0 (1)
                        </div>
                        <div class="col-6" style="font-size: 12px;">
                            <strong>{{ $offer->details->name }}</strong><br>
                            <span>{{ $offer->point->address . ', ' . $offer->point->city }} - 5 km from you</span><br>
                            <strong>Date, time: </strong><span>{{ Carbon\Carbon::parse($offer->start)->format('D (d.m), H:i') }}</span><br>
                            <strong>To be finished by: </strong><span>{{ Carbon\Carbon::parse($offer->finish)->format('D (d.m), H:i') }}</span>
                        </div>
                        <div class="col-3">
                            <strong>{{ $offer->price }}€</strong><br>
                            <a href="#accept{{ $offer->details->servce_id }}" rel="modal:open" style="text-decoration: none;">
                                <button type="button" class="btn btn-success">
                                    Accept
                                </button>
                            </a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    <form action="{{ route('carfix.orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" style="width: 100%;">Cancel order</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    Date.prototype.addHours= function(h){
        this.setHours(this.getHours()+h);
        return this;
    }

var date = "<?php echo $order->timer ?>";
// Set the date we're counting down to
var countDownDate = new Date(date).getTime();

// Update the count down every 1 second
var countdownfunction = setInterval(function() {

// Get todays date and time
var now = new Date().addHours(1).getTime();

// Find the distance between now an the count down date
var distance = countDownDate - now;

// Time calculations for days, hours, minutes and seconds
var days = Math.floor(distance / (1000 * 60 * 60 * 24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

if(hours <= 9) {
    hours = "0" + hours;
}

if(seconds <= 9) {
    seconds = "0" + seconds;
}
if(minutes <= 9) {
    minutes = "0" + minutes;
}


var val =  100 - minutes / 60 * 100;

// Output the result in an element with id="demo"
document.getElementById("timer").innerHTML = hours + ':'
+ minutes + ":" + seconds;

if(val >= 30 && val <= 70) {
    document.getElementById("progressbar").setAttribute('style', 'background-color: #ffc107!important');
}
if(val >= 70) {
    document.getElementById("progressbar").setAttribute('style', 'background-color: #28a745!important');
}

document.getElementById("progressbar").style.width = val + '%';

// If the count down is over, write some text 
if (distance < 0) {
    clearInterval(countdownfunction);
    document.getElementById("timer").innerHTML = "00:00:00";
    document.getElementById("tip").innerHTML = "Choose your service point!";
    document.getElementById("progressbar").setAttribute('style', 'background-color: #28a745!important');
    document.getElementById("progressbar").style.width = '100%';
}
}, 0);
</script>
@endsection
