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
					<table class="table table-striped mt-3" id="admins-table">
						<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Username</th>
							<th scope="col">Type</th>
							<th></th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection


@push('js')
	<script>
		$(document).ready(function () {
			$(function () {
				$('#admins-table').DataTable({
					searching: false,
					ordering: false,
					serverSide: true,
					processing: true,
					ajax: {
						url: "{{ route('panel.admins.index') }}",
						data: function (d) {
							delete d['columns'];
							return d;
						}
					},
				});
			});
		});
	</script>
@endpush
