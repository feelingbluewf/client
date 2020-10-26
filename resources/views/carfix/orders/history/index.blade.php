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
    <div class="row justify-content-center">
        <div class="col" style="padding-right: 0; padding-left: 0;">
            <div class="card">
                <div class="card-header">
                    <div class="row" style="align-items: center;">
                        <div class="col text-center grey">
                            <a href="{{ route('carfix.orders.index') }}" style="text-decoration: none;">Active Orders</a>
                        </div>
                        <div class="col text-center">
                            <a href="{{ route('carfix.orders.create') }}" style="text-decoration: none;">
                                <button class="btn btn-success">New Order</button>
                            </a>
                        </div>
                        <div class="col text-center grey active">
                            <a href="{{ route('carfix.orders.history.index') }}" style="text-decoration: none;">History</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding:0;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-center">
                                <i class="fas fa-dollar-sign" style="font-size: 22px;"></i>
                            </div>
                            <div class="col text-center">
                                <i class="fas fa-star" style="font-size: 22px;"></i>
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
                        <div class="row">
                            <div class="col text-center">
                                1
                            </div>
                            <div class="col text-center">
                                1
                            </div>
                            <div class="col text-center">
                                1
                            </div>
                            <div class="col text-center">
                                1
                            </div>
                            <div class="col text-center">
                                1
                            </div>
                            <div class="col text-center">
                                1
                            </div>
                        </div>
                        @empty
                        <h4>You do not have history yet!</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
