@extends('layouts.panel')

@section('title', "Admins")

@section('content')
	<div class="container">
		<div class="page-inner">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<div class="card-title">Admins</div>
					<a class="btn btn-primary" href="{{ route('panel.admins.create') }}">
						<i class="fas fa-plus me-2"></i> Create
					</a>
				</div>
				<div class="card-body overflow-x-scroll">
					<table class="table table-striped mt-3">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Username</th>
							<th scope="col">Type</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($admins as $admin)
							<tr>
								<td>{{ $admin->id }}</td>
								<td>{{ $admin->name }}</td>
								<td>{{ $admin->username }}</td>
								<td>{{ $admin->type }}</td>
								<td class="text-end">
									<a href="{{ route('panel.admins.edit', $admin) }}" class="btn btn-icon btn-primary">
										<i class="fas fa-edit"></i>
									</a>
										@if($admin->id != auth()->user()->id)
										<form action="{{ route('panel.admins.destroy', $admin) }}" method="post"
													onsubmit="return confirm('Are you sure?');"
													class="d-inline-block ms-2">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-icon">
												<i class="fas fa-trash-alt"></i>
											</button>
										</form>
										@endif
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
