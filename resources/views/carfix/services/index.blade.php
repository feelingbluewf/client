@extends('layouts.app')

@section('styles')

<style>
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
		<div class="col" style="height: 100%;">
			<div class="card" style="height: 90%;">      
				<div class="card-body">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d64968.198685018644!2d24.725663548631577!3d59.41212102399297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sauto%20service!5e0!3m2!1sru!2see!4v1603899101994!5m2!1sru!2see" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
