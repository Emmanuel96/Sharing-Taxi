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

	{{--Jquery  definition --}}
	<script src="{{URL::asset('js/jquery.js')}}"></script>


	<!-- All my functions for request and posts -->
	<script src = "{{URL::asset('js/appPostFunctions.js')}}"></script>
	<script src = "{{URL::asset('js/appRequests.js')}}"></script>

	<!-- Custom Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

	<!-- Plugin CSS -->
	<link rel = "stylesheet" href = "{{URL::asset('css/animate.min.css')}}" type = "text/css">

	<!-- Custom CSS -->
	<link rel = "stylesheet" href = "{{URL::asset('css/creative.css')}}" type = "text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body  id="page-top">

<nav style = "background-color: #000000;" id="mainNav" class="navbar navbar-default navbar-fixed-top">


	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="./home">Sharing Taxi</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a data-toggle="modal" data-target="#postModal" onclick = "postCheck()">Post</a>
			</li>
			<li>
				<a data-toggle = "modal" data-target = "#postModal" onclick = "requestCheck()">Request</a>
			</li>
			<li>
				<a class="page-scroll" href="./registerStudents">Register</a>
			</li>
			<li>
				<a  href="./login">login</a>
			</li>
		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>


@yield('content')


				<!-- Modal -->
<div id="postModal" class="modal fade">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">JOURNEYS</h4>
			</div>

			<div class="modal-body" id= "notifPosts">

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
</body>

</html>