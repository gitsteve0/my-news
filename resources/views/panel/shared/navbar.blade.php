<div class="main-header">
	<nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
		<div class="container-fluid">
			<nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-search pe-1">
							<i class="fa fa-search search-icon"></i>
						</button>
					</div>
					<input
						type="text"
						placeholder="Search ..."
						class="form-control"
					/>
				</div>
			</nav>
			<div class="d-flex align-items-center">
				<span class="fs-5 fw-bold me-3">
				@if(auth()->user())
						{{ auth()->user()->name }}
					@else
						Batyr Muhammetnyyazow
					@endif
			</span>
				<form action="{{ route('panel.logout') }}" method="post">
					@csrf
					@method('POST')
					<button class="btn btn-dark fw-bold" type="submit">Logout</button>
				</form>
			</div>
		</div>
	</nav>
</div>
