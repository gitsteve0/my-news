<div class="sidebar" data-background-color="dark">
	<div class="sidebar-logo">
		<!-- Logo Header -->
		<div class="logo-header" data-background-color="dark">
			<a href="{{ route('panel.dashboard') }}" class="fs-4 text-white">
				News Web App
			</a>
			<div class="nav-toggle">
				<button class="btn btn-toggle toggle-sidebar">
					<i class="gg-menu-right"></i>
				</button>
				<button class="btn btn-toggle sidenav-toggler">
					<i class="gg-menu-left"></i>
				</button>
			</div>
			<button class="topbar-toggler more">
				<i class="gg-more-vertical-alt"></i>
			</button>
		</div>
		<!-- End Logo Header -->
	</div>
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-secondary">
				<li class="nav-item {{ request()->routeIs('panel.dashboard') ? 'active' : '' }}">
					<a href="{{ route('panel.dashboard') }}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
					<h4 class="text-section">Components</h4>
				</li>
				<li class="nav-item {{ request()->routeIs('panel.admins.index') ? 'active' : '' }}">
					<a href="{{ route('panel.admins.index') }}">
						<i class="fas fa-user-cog"></i>
						<p>Admins</p>
					</a>
				</li>
				<li class="nav-item {{ request()->routeIs('panel.news.index') ? 'active' : '' }}">
					<a href="{{ route('panel.news.index') }}">
						<i class="fas fa-newspaper"></i>
						<p>News</p>
					</a>
				</li>
				<li class="nav-item {{ request()->routeIs('panel.users.index') ? 'active' : '' }}">
					<a href="{{ route('panel.users.index') }}">
						<i class="fas fa-user-friends"></i>
						<p>Users</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
