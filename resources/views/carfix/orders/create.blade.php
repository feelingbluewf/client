@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-weight: 600">
                    {{ __('Create An order') }}
                </div>
                <form action="{{ route('carfix.orders.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        @if(count($cars) == '0')
                        <a href="{{ route('carfix.cars.create') }}">
                            <button type="button" class="btn btn-danger">
                                Register your car!
                            </button>
                        </a>
                        @else
                        <div class="form-group has-feedback">
                            @if(count($cars) != '1')
                            <label for="car">Car</label>
                            <select class="form-control" name="car" id="car" required>
                                <option value="" selected hidden>Choose a car</option>
                                @foreach($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->brand . ', ' . $car->model }}</option>
                                @endforeach
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                            @else
                            <label for="car">Car</label>
                            <select class="form-control" name="car" id="car" required>
                                @foreach($cars as $car)
                                <option value="{{ $car->id }}">{{ $car->brand . ', ' . $car->model }}</option>
                                @endforeach
                            </select>
                            <span class="glyphicon form-control-feedback"></span>
                            @endif
                        </div>
                        <div id="fixes">
                            <div class="form-group has-feedback mb-0">
                                <label class="switch">
                                    <input type="checkbox" id="diagnostics" name='service_type'>
                                    <span class="slider round"></span>
                                </label>
                                <span style="font-size: 11.4px;">I need diagnostics first, i don't know what exactly is wrong</span>
                            </div>
                            <div class="form-group has-feedback" id="service_type">
                                <label for="service_type">Type of fix</label>
                                <select name="service_type" class="form-control" id="type_of_fix" placeholder="Type of fix" required>
                                    <option value="" disabled selected hidden>Choose type of fix</option>
                                    <option value="Regular maintenance">Regular maintenance</option>
                                    <option value="Lights">Lights</option>
                                    <option value="Tyres">Tyres</option>
                                    <option value="Suspension">Suspension</option>
                                    <option value="Brakes">Brakes</option>
                                    <option value="Steering">Steering</option>
                                    <option value="Body">Body</option>
                                </select>
                                <span class="glyphicon form-control-feedback"></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="additional_info">Additional information</label>
                            <textarea name="additional_info" class="form-control" placeholder="Add more information, if needed"></textarea>
                            <span class="glyphicon form-control-feedback"></span>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <a href="#"><i class="fas fa-camera" style="font-size: 18px;">
                                    <span style="font-size: 16px; font-weight: normal;"> 
                                        Add photos
                                    </span>
                                </i>
                            </a>
                        </div>
                        <div class="col text-right">
                            <a href="#">
                                <i class="fas fa-microphone" style="font-size: 18px;">
                                    <span style="font-size: 16px; font-weight: normal;">
                                        Add voice clip
                                    </span>
                                </i>
                            </a>
                        </div>
                    </div>
                    <button type="submit" id="submitForm" class="btn btn-success" style="margin-bottom: 10px; width: 100%;">Submit</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#diagnostics', function() {
        var service_type = $('#service_type');
        var diagnostics = $('#diagnostics');

        if(diagnostics.is(':checked')) {
            service_type.remove();
        }
        else {
            var el = '<div class="form-group has-feedback" id="service_type"><label for="service_type">Type of fix</label><select name="service_type" class="form-control" placeholder="Type of fix" required><option value="" disabled selected hidden>Choose type of fix</option><option value="Regular maintenance">Regular maintenance</option><option value="Lights">Lights</option><option value="Tyres">Tyres</option><option value="Suspension">Suspension</option><option value="Brakes">Brakes</option><option value="Steering">Steering</option><option value="Body">Body</option></select><span class="glyphicon form-control-feedback"></span></div>';
            $('#fixes').append(el);
        }
    });
    $(document).ready(function() {
        var requested_service_type = "<?php echo $service_type ?>";

        $('#type_of_fix option').each(function() {
            if($(this).val() == requested_service_type) {
                $(this).prop('selected', true);
            }
        });
    });
</script>

@endsection
