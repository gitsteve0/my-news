@extends('layouts.panel')

@section('title', "News")

@section('content')
	<div class="container">
		<div class="page-inner">
			<div class="card">
				<div class="card-header d-flex justify-content-between">
					<div class="card-title">News</div>
					<a class="btn btn-primary" href="{{ route('panel.news.create') }}">
						<i class="fas fa-plus me-2"></i> Create
					</a>
				</div>
				<div class="card-body overflow-x-scroll">
					<table class="table table-striped mt-3">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Image</th>
							<th scope="col">Author</th>
							<th scope="col">Name</th>
							<th scope="col">Description</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						@foreach($news as $item)
							<tr>
								<td>{{ $item->id }}</td>
								<td>
									<img src="{{ url("uploads/$item->image") }}" alt="image" style="max-width: 100px">
								</td>
								<td class="text-primary">{{ $item->author->name }}</td>
								<td>{{ $item->name }}</td>
								<td class="col-4">{{ $item->description }}</td>
								<td class="text-end">
									<a href="{{ route('panel.news.edit', $item) }}" class="btn btn-icon btn-primary">
										<i class="fas fa-edit"></i>
									</a>
									<form action="{{ route('panel.news.destroy', $item) }}" method="post"
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
