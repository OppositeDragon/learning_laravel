<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>OurApp</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
	<script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"
		integrity="sha384-GqVMZRt5Gn7tB9D9q7ONtcp4gtHIUEW/yG7h98J7IpE3kpi+srfFyyB/04OV6pG0" crossorigin="anonymous">
	</script>
	<link href="https://fonts.googleapis.com" rel="preconnect" />
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap"
		rel="stylesheet" />
	<link href="/main.css" rel="stylesheet" />
</head>

<body>
	<header class="header-bar mb-3">
		<div class="container d-flex flex-column flex-md-row align-items-center p-3">
			<h4 class="my-0 mr-md-auto font-weight-normal"><a class="text-white" href="/">OurApp</a></h4>
			@auth
				<div class="flex-row my-3 my-md-0">
					<a class="text-white mr-2 header-search-icon" data-toggle="tooltip" data-placement="bottom" href="#"
						title="Search"><i class="fas fa-search"></i></a>
					<span class="text-white mr-2 header-chat-icon" data-toggle="tooltip" data-placement="bottom" title="Chat"><i
							class="fas fa-comment"></i></span>
					<a class="mr-2" href="/profile/{{ auth()->user()->username }}"><img data-toggle="tooltip" data-placement="bottom"
							src="{{ auth()->user()->avatar }}" title="My Profile"
							style="width: 32px; height: 32px; border-radius: 16px" /></a>
					<a class="btn btn-sm btn-success mr-2" href="/create-post">Create Post</a>
					<form class="d-inline" action="/logout" method="POST">
						@csrf
						<button class="btn btn-sm btn-secondary">Sign Out</button>
					</form>
				</div>
			@else
				<form class="mb-0 pt-2 pt-md-0" action="/login" method="POST">
					@csrf
					<div class="row align-items-center">
						<div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
							<input class="form-control form-control-sm input-dark" name="loginusername" type="text" placeholder="Username"
								autocomplete="off" />
						</div>
						<div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
							<input class="form-control form-control-sm input-dark" name="loginpassword" type="password"
								placeholder="Password" />
						</div>
						<div class="col-md-auto">
							<button class="btn btn-primary btn-sm">Sign In</button>
						</div>
					</div>
				</form>

			@endauth

		</div>
	</header>
	<!-- header ends here -->
	@if (session()->has('success'))
		<div class="container container-narrow">
			<div class="alert alert-success text-center">
				{{ session('success') }}
			</div>
		</div>
	@endif
	@if (session()->has('faillogin'))
		<div class="container container-narrow">
			<div class="alert alert-danger text-center">
				{{ session('faillogin') }}
			</div>
		</div>
	@endif
	@if (session()->has('fail'))
		<div class="container container-narrow">
			<div class="alert alert-danger text-center">
				{{ session('fail') }}
			</div>
		</div>
	@endif

	{{ $slot }}

	<!-- footer begins -->
	<footer class="border-top text-center small text-muted py-3">
		<p class="m-0">Copyright &copy; {{ date('Y') }} <a class="text-muted" href="/">OurApp</a>. All
			rights reserved.
		</p>
	</footer>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
	<script>
		$('[data-toggle="tooltip"]').tooltip()
	</script>
</body>

</html>
