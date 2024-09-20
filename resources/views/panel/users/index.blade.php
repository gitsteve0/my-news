@extends('layouts.panel')

@section('title', "Users")

@section('content')
	<div class="container">
		<div class="page-inner">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<div class="card-title">Users</div>
					<a class="btn btn-primary" href="{{ route('panel.users.create') }}">
						<i class="fas fa-plus me-2"></i> Create
					</a>
				</div>
				<div class="card-body overflow-x-scroll">
					<table class="table table-striped mt-3">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Username</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->username }}</td>
								<td class="text-end">
									<a href="{{ route('panel.users.edit', $user) }}" class="btn btn-icon btn-primary">
										<i class="fas fa-edit"></i>
									</a>
									<form action="{{ route('panel.users.destroy', $user) }}" method="post"
												onsubmit="return confirm('Are you sure?');"
												class="d-inline-block ms-2">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-icon">
											<i class="fas fa-trash-alt"></i>
										</button>
									</form>
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
