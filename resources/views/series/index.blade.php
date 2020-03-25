@extends('layouts.layout')

@section('main')
<div class="container">
	<div class="row">
		@if(!empty($id))
			<div class="col-xl-12">
				<div class="alert alert-danger">
					<p>RECORD {{$id}} DELETED</p>
				</div>
			</div>
		@endif
		@foreach ($series as $serie)
		<div class="col-xl-12">
			<div class="card text-white bg-dark mb-3 rounded-0">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="m-0">{{$serie->title}}</h5>
					<div class="form-group d-flex align-items-center m-0">
						<form action="{{route('series.destroy', $serie->id)}}" method="POST">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger ml-4" type="submit">DELETE</button>
						</form>
					</div>
				</div>
				<div class="card-body">
					<p class="card-title">VOD_SERVICE: {{$serie->distributor}}</p>
					<p class="card-text">CONTENT_ID: {{$serie->content_id}}</p>
					<p class="card-text">ANNO: {{$serie->year}}</p>
					<p class="card-text">STAGIONI: {{$serie->season}}</p>
					<p class="card-text">SINOSSI: {{$serie->synopsis}}</p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection