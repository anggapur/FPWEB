<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css')}}" >
  <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css')}}">
  	<!-- <link rel="stylesheet" href="css/bootstrap-style.css"> -->
</head>
<body class="body-style">
	<section class="container-fluid">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-container">
					<img src=" {{ asset('public/img/icon-login.png')}}" class="bg">
					<h4 class="text-center font-weight-bold">Login Form</h4>
					<div class="form-group">
					    <input type="text" class="form-control" id="username" placeholder="Username">
				  	</div>
				  	<div class="form-group">
					    <input type="password" class="form-control" id="password" placeholder="Password">
				  	</div>
				  	<div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" id="exampleCheck1">
					    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
				  	</div>
				  	<button type="submit" class="btn btn-primary btn-block">Submit</button>
				</form>
			</section>
		</section>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<!--   <script src="js/jquery.min.js"></script>
  	<script src="js/tether.min.js"></script>
  	<script src="js/bootstrap.min.js"></script> -->
</body>
</html>