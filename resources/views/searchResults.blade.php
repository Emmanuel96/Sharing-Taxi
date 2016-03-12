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

<body id="page-top" onload = "onloadFunction">

<div style = "position: relative; top: 200px;" class = "row">
	<div class = "col-lg-12">
		@if(isset($searchResults))
			@foreach($searchResults as $results)
				<div class ="container " >
					<div class = "row">
						<div class = "col-lg-12" style = "font-size:12px;">
							<p>{{$results->firstName}} {{$results->lastName}}</p>
							<p>{{$results->studentId}}</p>
							<p>{{$results->destination}}</p>
							<p>{{$results->campus}}</p>
							<?php
							//so this partial is simply meant to update the controller button when the view is opened depending on the user that visits that page
							$class = "btn btn-primary";
							$text = "Request";

							if($studentsRequests != null)
							{
								foreach($studentsRequests as $request)
								{
									if($request->postId == $results->postId)
									{
										if($request ->requestStatus == 0)
										{
											$class = "btn btn-warning";
											$text = "Requested";
										}
										if($request->requestStatus == 1){
											$class = "btn btn-success";
											$text = "Accepted";
										}
										else if($request->requestStatus == 2){
											$class = "btn btn-danger";
											$text = "Rejected";
										}
									}
								}
							}
							?>
							<a class = "{{$class}}" onclick = "requestButton('{{$results->postId}}', 1600425)" id = "requestButton">{{$text}}</a>
						</div>
					</div>
				</div>
				<hr style = "width:100%; border:2px solid lightgrey;;">
			@endforeach
			<?php echo $searchResults->render(); ?>
		@endif
	</div>
</div>

<script src="{{URL::asset('js/jquery.js')}}"></script>

<script>
	function requestButton(postId,studentId)
	{
		var btn = document.getElementById('requestButton');
		if(btn.className == "btn btn-primary")
		{
			$.ajax({
				type: "POST",
			    data: {postId: postId, studentId: studentId, _token: '{{csrf_token()}}' },
				url: '{{url("/ajaxState")}}',
				success: function(output) {
					alert(output);
				}
			});
			btn.innerHTML = "Requested";
			btn.className = "btn btn-danger";
		}
		else
		{
			//alright if the user has already made a request, it should be cancelled

			btn.innerHTML = "Request";
			btn.className = "btn btn-primary"
		}
	}
</script>

</body>

</html>
