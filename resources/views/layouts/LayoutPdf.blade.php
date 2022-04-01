<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" / -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- link rel="stylesheet" href="{{asset('assets/styles/simple.css')}}" / -->
		<title>Liste Staffs Affecté au projet</title>
		<style type="text/css">
			td{
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<!-- div class="container-fluidM mt-5">
			<header>
				<h1>My header</h1>
			</header>
		</div -->
		<main class="container-fluid bg-successM text-center">
			<div class="row bg-dangerM">
				<div class="col-sm-12 bg-primaryM">
					@yield('content')	
				</div>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</body>
</html>