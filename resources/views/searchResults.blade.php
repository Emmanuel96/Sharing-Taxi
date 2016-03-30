@extends('app')

@section('content')
	<div class = "center">
		<h1 class = "center">JOURNEYS</h1>
	</div>
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
						<hr style = "width:89%; margin-top:150px; border:2px solid lightgrey;">
					</div>
				</div>
			@endforeach
			<?php echo $searchResults->render(); ?>
		@endif
	</div>
</div>

@endsection