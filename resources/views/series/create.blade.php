@extends('layouts.layout')

@section('main')
<div class="container">
	<div class="row">
		<div class="col-xl-12">
			@if ($errors->any()) 
			<div class="alert alert-danger"> 
				<ul> 
				@foreach ($errors->all() as $error) 
				<li>{{$error}}</li> 
				@endforeach
				</ul>
			</div> 
			@endif
			<form action="{{route('series.store')}}" method="POST">
				@csrf
				@method('POST')
				<div class="form-group">
					<label for="CONTENT_ID">CONTENT_ID:</label>
					<input type="text" name="content_id" value="" id="CONTENT_ID">
				</div>
				<div class="form-group">
					<label for="TITLE">TITLE:</label>
					<input type="text" name="title" value="" id="TITLE">
				</div>
				<div class="form-group">
					<label for="DISTRIBUTOR">DISTRIBUTOR:</label>
					<select multiple class="form-control" name="distributor" id="DISTRIBUTOR">
						<option>NETFLIX</option>
						<option>AMAZON_PRIME_VIDEO</option>
						<option>DISNEY+</option>
						<option>RAKUTEN</option>
						<option>INFINITY</option>
						<option>APPLE_TV+</option>
						<option>CHILI</option>
						<option>TIMVISION</option>
					</select>
				</div>
				<div class="form-group">
					<label for="SYNOPSIS">SYNOPSIS:</label>
					<textarea class="form-control" name="synopsis" id="SYNOPSIS" rows="5"></textarea>
				</div>
				<div class="form-group">
					<label for="RELEASE_YEAR">RELEASE_YEAR:</label>
					<input type="number" name="year" min="1900" max="2099" step="1" value="2020" id="RELEASE_YEAR">
				</div>
				<div class="form-group">
					<label for="TOTAL_SEASON">TOTAL_SEASON:</label>
					<input type="number" min="1" max="99" step="1" value="1" name="season" id="TOTAL_SEASON">
				</div>
				<button class="btn btn-primary" type="submit">INSERT</button>
			</form>
		</div>
	</div>
</div>
@endsection