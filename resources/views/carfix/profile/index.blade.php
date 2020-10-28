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
					{{ Auth::user()->email }}

				</div>
				<div class="card-body" style="padding:0; align-items: center; vertical-align: middle;">
					<div class="col pb-2 pt-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
						<a href="#">Check personal information</a>
					</div>
					<div class="col pt-2 pb-2 mb-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125); vertical-align: middle;">
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						Log out<i class="fas fa-sign-out-alt" style="font-size: 16px; color: #000; padding-left: 5px;"></i>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection
