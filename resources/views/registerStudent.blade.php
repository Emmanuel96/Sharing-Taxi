@extends('app')

@section('content')
	<div style = "position: relative; top: 100px;" class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><b>STUDENT REGISTRATION</b></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="./registerStudents">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstName" value="{{ old('firstName') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Student ID Number </label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="studentId" value="{{ old('studentId') }}">
							</div>
						</div>

						<div class = "form-group">
							<label class = "col-md-4 control-label">Campus</label>
							<div class = "col-md-6">
								<input type = "text" class = "form-control" name = "campus" value = "{{old('campus')}}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div style = "position: relative; top: 100px;">

@endsection