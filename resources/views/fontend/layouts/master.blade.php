<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title','Laravel Ecommerce Site')</title>
	<!--alatify -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="{{asset('fontend/style.css')}}" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<div class="wrapper">
@include('fontend.partials.navbar')	




<!--- Image Slider -->


<!--- Jumbotron -->


<!--- Welcome Section -->


<!--- Three Column Section -->


<!--- Two Column Section -->


<!--- Fixed background -->


<!--- Emoji Section -->

  
<!--- Meet the team -->


<!--- Cards -->

@yield('content')

<!--- Two Column Section -->


<!--- Connect -->

@include('fontend.partials.footer')


<!--- Footer -->


</div>
@include('fontend.partials.scripts')
@yield('script');
@yield('scripts')
</body>
</html>