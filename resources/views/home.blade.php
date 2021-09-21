@extends('layouts.default')

@section('title')
    Users
@endsection

@section('content')
<div class="container-fluid">
	<div class="row my-3">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<h5 class="card-header">
							Users
						</h5>
						<div class="card-body">
							<p class="card-text ">
								<h1 class="text-center">{{count($users)}}</h1>
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<h5 class="card-header">
							Message
						</h5>
						<div class="card-body">
							<p class="card-text ">
								<h1 class="text-center">{{count($messages)}}</h1>
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<h5 class="card-header">
							Assignments
						</h5>
						<div class="card-body">
							<p class="card-text ">
								<h1 class="text-center">{{count($assignments)}}</h1>
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<h5 class="card-header">
							Challenges
						</h5>
						<div class="card-body">
							<p class="card-text ">
								<h1 class="text-center">{{count($challenges)}}</h1>
							</p>
						</div>
						<div class="card-footer">
							Card footer
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
