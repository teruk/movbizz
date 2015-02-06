<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>MovBizz - Simple Movie Business Management Game</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
	

	<div class="container">
		@include('layouts.partials.navigation')

		<div class="row">
			<div class="col-md-5">
				@include('flash::message')	
			</div>
		</div>
		@yield('content')

		@include('layouts.partials.footer')
	</div>

	<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

</body>
</html>