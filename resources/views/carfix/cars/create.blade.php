@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: 600">
                    {{ __('Add a car') }}
                </div>
                <form action="{{ route('carfix.cars.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group has-feedback">
                            <label for="vin">VIN</label>
                            <input type="text" name="vin" class="form-control" id="vin" placeholder="VIN" value="{{ old('vin') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="car_number">Car Number</label>
                            <input type="text" name="car_number" class="form-control" id="car_number" placeholder="Car Number" value="{{ old('car_number') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="brand">Brand</label>
                            <input type="text" name="brand" class="form-control" id="brand" placeholder="Brand" value="{{ old('brand') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="brand">Model</label>
                            <input type="text" name="model" class="form-control" id="model" placeholder="Model" value="{{ old('model') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="year">Year</label>
                            <input type="text" name="year" class="form-control" id="year" placeholder="Year" value="{{ old('year') }}" required>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px; width: 100%;">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
