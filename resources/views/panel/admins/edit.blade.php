@extends('layouts.panel')

@section('title', "Admin panel")

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
						<a href="{{ route('panel.admins.index') }}">Admins</a>
					</li>
					<li class="separator">
						<i class="icon-arrow-right"></i>
					</li>
					<li class="nav-item">
						<a href="#">Update</a>
					</li>
				</ul>
			</div>

			<div class="card col-4">
				<div class="card-body overflow-x-scroll">
					<form action="{{ route('panel.admins.update', $admin) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="username">Name</label>
							<input class="form-control" type="text" name="name" id="name" value="{{ $admin->name }}">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control" type="text" name="username" id="username" value="{{ $admin->username }}">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" name="password" id="password">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<select class="form-select" name="type" id="type">
								<option @selected($admin->type == 'admin') value="admin">Admin</option>
								<option @selected($admin->type == 'editor') value="editor">Editor</option>
							</select>
						</div>

						<button type="submit" class="btn btn-primary rounded mt-4 ms-2">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('js')
	<script>
		$('#type').select2()
	</script>
@endpush
