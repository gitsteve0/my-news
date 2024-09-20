@extends('layouts.panel')

@section('title', "User create")

@section('content')
	<div class="container">
		<div class="page-inner">
			<div class="mb-3">
				<ul class="breadcrumbs m-0">
					<li class="nav-home">
						<a href="{{ route('panel.dashboard') }}">
							<i class="icon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="icon-arrow-right"></i>
					</li>
					<li class="nav-item">
						<a href="{{ route('panel.users.index') }}">Users</a>
					</li>
					<li class="separator">
						<i class="icon-arrow-right"></i>
					</li>
					<li class="nav-item">
						<a href="#">Create</a>
					</li>
				</ul>
			</div>

			<div class="card col-4">
				<div class="card-body overflow-x-scroll">
					<form action="{{ route('panel.users.store') }}" method="post">
						@csrf
						@method('POST')
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" type="text" name="username" id="username" value="{{ old('username') }}">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>

						<button type="submit" class="btn btn-primary rounded mt-4 ms-2">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
