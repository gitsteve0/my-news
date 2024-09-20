@extends('layouts.panel')

@section('title', "News panel")

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
						<a href="{{ route('panel.news.index') }}">newss</a>
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
					<form action="{{ route('panel.news.update', $news) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="username">Name</label>
							<input class="form-control" type="text" name="name" id="name" value="{{ $news->name }}">
						</div>
						<div class="form-group">
							<label for="description">Description</label>
							<input class="form-control" type="text" name="description" id="description" value="{{ $news->description }}">
						</div>
						<div class="form-group">
							<label for="admin_id">Username</label>
							<select class="form-select" name="admin_id" id="admin_id">
								@foreach($admins as $admin)
									<option @selected($admin->id == $news->admin_id) value="{{ $admin->id }}">{{ $admin->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="image">Image</label>
							<input class="form-control" type="file" name="image" id="image" accept="image/png,image/jpg,image/jpeg">
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
