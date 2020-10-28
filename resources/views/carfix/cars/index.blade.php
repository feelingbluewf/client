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
				<div class="card-header" style="font-weight: 600">
					<div class="row" style="align-items: center;">
						<div class="col">
							{{ __('Your cars') }}
						</div>
						<div class="col text-right">
							<a href="{{ route('carfix.cars.create') }}"><button class="btn btn-success">Add Car</button></a>
						</div>
					</div>
				</div>
				<div class="card-body" style="padding:0;">
					@if(!empty($cars[0]))
					<div class="card-header">
						<div class="row">
							<div class="col text-center">
								<span>Model</span>
							</div>
							<div class="col text-center">
								<span>Number</span>
							</div>
							<div class="col text-center">
								<span>Action</span>
							</div>
						</div>
					</div>
					@endif
				</div>
				@forelse($cars as $car)
				<div class="card-body">
					@if($loop->last)
					<div class="row mb-5" style="align-items: center;">
						@else
						<div class="row" style="align-items: center;">
							@endif
							<div class="col text-center">
								{{ $car->brand . ' ' . $car->model }}
							</div>
							<div class="col text-center">
								{{ $car->car_number }}
							</div>
							<div class="col text-center">
								<a href="#" style="text-decoration: none;">
									<button class="btn btn-success">Edit</button>
								</a>
							</div>
						</div>
					</div>
					@empty
					<h4 style="margin: 10px;">You haven't added any cars yet!</h4>
					@endforelse
				</div>
			</div>
		</div>
	</div>
	@endsection
