@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="form-group">
                <input type="search" class="form-control" id="search" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col">
            <a href="{{ asset('orders/create/Regular maintenance') }}"><img src="{{ asset('pictures/maintenance.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Regular maintenance</strong></a>
        </div>
        <div class="col">
            <a href="{{ asset('orders/create/Lights') }}"><img src="{{ asset('pictures/light.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Lights</strong></a>
        </div>
        <div class="col">
            <a href="{{ asset('orders/create/Diagnostics') }}"><img src="{{ asset('pictures/diagnostic.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Diagnostics</strong></a>
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col">
            <a href="{{ asset('orders/create/Tyres') }}"><img src="{{ asset('pictures/tyres.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Tyres</strong></a>
        </div>
        <div class="col">
            <a href="{{ asset('orders/create/Suspension') }}"><img src="{{ asset('pictures/suspension.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Suspension</strong></a>
        </div>
        <div class="col">
            <a href="{{ asset('orders/create') }}"><img src="{{ asset('pictures/other.png') }}" width="100%" {{-- style="border: 2px solid #000; background-color: white;" --}}>
            <strong>Other</strong></a>
        </div>
    </div>
</div>
@endsection
