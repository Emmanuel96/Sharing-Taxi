<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SHARING TAXI</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">


	<!-- All my functions for request and posts -->
	<script src = "{{URL::asset('js/appPostFunctions.js')}}"></script>
	<script src = "{{URL::asset('js/appRequests.js')}}"></script>

	<!-- All functions involved with posting a journey -->
	<script src = "{{URL::asset('js/journeyPostFunctions.js')}}"></script>

	{{--Jquery  definition --}}
	<script src="js/jquery.js"></script>


	<!-- Custom Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

	<!-- Plugin CSS -->
	<link rel="stylesheet" href="css/animate.min.css" type="text/css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/creative.css" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand page-scroll" href="#page-top">Sharing Taxi</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a data-toggle="modal" data-target="#postModal" href = "" onclick = "postCheck()">Post</a>
				</li>
				<li>
					<a data-toggle = "modal" data-target = "#postModal" href = "" onclick = "requestCheck()">Request</a>
				</li>
				<li>
					<a href="./login">login</a>
				</li>
				<li>
					<a href = "./registerStudents">Register</a>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<header>
	@if(Session::has('flash_message'))
		<div style = " position:absolute; top:140px; width: 400px; left:800px;"  class = "alert alert-success">
			<button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>
			{{Session::get('flash_message')}}
		</div>
	@endif
	<div class="header-content">
		<div class="header-content-inner">
			<form action = "{{url("/searchResults")}}" class = "form">
				<input style = "height:50px; width: 500px;"  name = "destination" id = "destination"  type = "text" placeholder = "Destination">
						<br/><br/>
				<input class = "btn btn-primary" type = "submit" value="search">

				<a class = "btn btn-primary" data-toggle="modal" data-target="#postJourney" onclick="postJourney()">POST JOURNEY </a>
			</form>
		</div>
	</div>
</header>



{{--My modal section --}}


<!-- Modal -->
<div id="postModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">JOURNEYS</h4>
			</div>

			<div class="modal-body" id="notifPosts">

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

		</div>

	</div>

</div>

<!-- Journey Modal -->
<div  id="postJourney" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">JOURNEYS</h4>
			</div>
			<div class="modal-body" id="postJourneyBody">
				<input class = "form-control" style='height: 50px; width: 80%;' type='text' id='post-journey-destination' placeholder='Destination'>
				<br/>
				<input style='height: 50px; width: 80%;' class = 'form-control datetimepicker' id='post-journey-date'  placeholder='Date/Time'>
				<br/>
				<input type='button' id='post-journey-submit' class='btn btn-primary' onclick='postJourneySubmit()' value='Submit'>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>

</div>

<div  id="registerModal" class="modal fadeOutLeft" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div  style = "height: 400px;" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">REGISTRATION</h3>
			</div>
			<div class="modal-body" id="postJourneyBody">
				@if (count($errors) > 0)
					<div class = "row" style = "position:relative; top:10px;">
						<div class = "col-lg-12">
							<div class="alert alert-danger" style = "width: 600px; margin-left:auto; margin-right:auto;">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				@endif
				<form class = "form">
					<input class = "form-control" type = "text" name = "firstName" id = "firstName" placeholder = "First Name"/>
					<br/>
					<input class = "form-control" type = "text" name ="studentId" id = "studentId" placeholder="StudentId"/>
					<br/>
					<input class = "form-control" type = "text" name = "campus" id = "campus" placeholder = "Campus"/>
					<br/>
					<input class = "form-control" type = "password" name = "password" placeholder = "password"/>
					<br/>
					<input class = "form-control" type = "password" name = "password_confirmation" placeholder = "Confirm Password"/>
					<br/>
					<input type = "submit" class = "btn btn-primary center-block" value = "REGISTER"/>
				</form>
			</div>
		</div>

	</div>

</div>




<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/jquery.fittext.js"></script>
<script src="js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/creative.js"></script>

<link href="{{URL::asset("plugins/bootstrap-datetimepicker/css/datetimepicker.css")}}" rel="stylesheet" type="text/css">
<script src="{{URL::asset("plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js")}}"></script>
<script src="{{URL::asset("plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")}}"></script>

<script>
	$(function() {
		$( "#dateTimepicker" ).datetimepicker();
		$( "#post-journey-date" ).datetimepicker();
	});
</script>

</body>

</html>
