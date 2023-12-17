<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Laravel Shop :: Administrative Panel</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/css/adminlte.min.css') }}">
		<link rel="stylesheet" href="{{ asset('asset/css/custom.css') }}">
	</head>
	<body class="hold-transition login-page">
		<div class="login-box">
			<div class="card card-outline card-primary">
			  	<div class="card-header text-center">
                    <h1>Registration</h1>
			  	</div>
			  	<div class="card-body">
					<form action="{{ url('/register') }}" method="POST">
                        @csrf
				  		<div class="input-group mb-3">
							<input type="name" class="form-control" placeholder="name" name="name" value="{{ old('name') }}">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-user"></span>
					  			</div>
							</div>
				  		</div>
                          @error('name')
                          <div>
                              <p>{{ $message }}</p>
                            </div>
                        @enderror

				  		<div class="input-group mb-3">
							<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-envelope"></span>
					  			</div>
							</div>
				  		</div>
                          @error('email')
                          <div>
                              <p>{{ $message }}</p>
                            </div>
                        @enderror
				  		<div class="input-group mb-3">
							<input type="password" class="form-control" placeholder="Password" name="password">
							<div class="input-group-append">
					  			<div class="input-group-text">
									<span class="fas fa-lock"></span>
					  			</div>
							</div>
				  		</div>
                          @error('password')
                          <div>
                              <p>{{ $message }}</p>
                            </div>
                        @enderror
				  		<div class="row">
							<div class="col-4">
					  			<button type="submit" class="btn btn-primary btn-block">register</button>
							</div>
				  		</div>
					</form>
			  	</div>
			</div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="{{ asset('asset/plugins/jquery/jquery.min.js') }}"></script>
		<script src="{{ asset('asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
		<!-- Bootstrap 4 -->
		<!-- AdminLTE App -->
		<script src="{{ asset('asset/js/adminlte.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('asset/js/demo.js') }}"></script>
	</body>
</html>

