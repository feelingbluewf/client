@extends('layouts.app')

@section('styles')

<style>
    .py-4 {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    html, body {
        height: 100% !important;
    }
    #app, .py-4 {
        height: 100% !important;
    }
</style>



@endsection

@section('content')
<div class="container" style="height: 100%;">
    <div class="row justify-content-center" style="height: 100%;">
        <div class="col" style="padding-right: 0; padding-left: 0; height: 100%;">
            <div class="card" style="height: 100%;">
                <div class="card-header">
                    <div class="row" style="align-items: center;">
                        <div class="col text-center grey active">
                            <a href="{{ route('carfix.orders.index') }}" style="text-decoration: none;">Active Orders</a>
                        </div>
                        <div class="col text-center">
                            <a href="{{ route('carfix.orders.create') }}" style="text-decoration: none;">
                                <button class="btn btn-success">New Order</button>
                            </a>
                        </div>
                        <div class="col text-center grey">
                            <a href="{{ route('carfix.orders.history.index') }}" style="text-decoration: none;">History</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding:0;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-center">
                                <i class="fas fa-signal" style="font-size: 22px;"></i>
                            </div>
                            <div class="col text-center">
                                <i class="far fa-calendar-alt" style="font-size: 22px;"></i>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-map-marker-alt" style="font-size: 22px;"></i>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-car" style="font-size: 22px;"></i>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-tools" style="font-size: 22px;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @forelse($orders as $order)
                        @if($loop->last)
                        @if($order->is_submitted == 0)
                        <a href="{{ route('carfix.orders.show', $order->id) }}" style="text-decoration: none"><div class="row mb-5" style="font-size: 11px; border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                            @else
                            <a href="#" style="text-decoration: none"><div class="row mb-5" style="font-size: 11px; border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                                @endif
                                @else
                                @if($order->is_submitted == 0)
                                <a href="{{ route('carfix.orders.show', $order->id) }}" style="text-decoration: none"><div class="row" style="font-size: 11px; border-bottom: 1px solid rgba(0, 0, 0, 0.125); margin-bottom: 1.25rem;">
                                    @else
                                    <a href="#" style="text-decoration: none"><div class="row" style="font-size: 11px; border-bottom: 1px solid rgba(0, 0, 0, 0.125); margin-bottom: 1.25rem;">
                                        @endif
                                        @endif
                                        <div class="col text-center">
                                            @if($order->is_submitted == 0)
                                            <span>Submitted, choose service point</span>
                                            @else
                                            <span>Service scheduled</span>
                                            @endif
                                        </div>
                                        <div class="col text-center">
                                            @if($order->is_submitted == 0)
                                            <span>{{ $order->created_at }}</span>
                                            @else
                                            <span>{{ $order->offer->start }}</span>
                                            @endif
                                        </div>
                                        <div class="col text-center">
                                            @if($order->is_submitted == 0)
                                            <span>-</span>
                                            @else<span>{{ $order->offer->details->name }}</span><br>
                                            <span>{{ $order->offer->point->address . ', ' . $order->offer->point->city }}</span>
                                            @endif
                                        </div>
                                        <div class="col text-center">
                                            {{ $order->car->brand . ', ' .$order->car->model }}
                                        </div>
                                        <div class="col text-center">
                                            @if($order->diagnostics == 1)
                                            <span>Diagnostics</span>
                                            @else
                                            <span>{{ $order->service_type }}</span>
                                            @endif
                                        </div>
                                    </div></a>
                                    @empty
                                    <h4>You do not have any orders yet!</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endsection
