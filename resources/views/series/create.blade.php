<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>INSERT_VOD</title>
</head>
	<body>
		<form action="{{route('series.store')}}" method="post">
			@csrf
			@method('POST')
			<input type="number" name="content_id" value="" placeholder="CONTENT_ID">
			<input type="text" name="distributor" value="" placeholder="DISTRIBUTOR">
			<input type="text" name="title" value="" placeholder="TITLE">
			<input type="text" name="type" value="show" placeholder="TYPE">
			<input type="text" name="synopsis" value="" placeholder="SYNOPSIS">
			<input type="number" name="year" min="1900" max="2099" step="1" value="2020" value="" placeholder="RELEASE_YEAR">
			<input type="number" min="1" max="100" step="1" value="" name="season" value="" placeholder="TOTAL_SEASON">
			<button type="submit">[SAVE]</button>
		</form>
	</body>
</html>