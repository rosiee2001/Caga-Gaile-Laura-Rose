<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">Student Dashboard</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Admin
					</li>

					<li class="sidebar-item{{ request()->routeIs('liststudents.index') ? ' active' : '' }}">
							<a class="sidebar-link" href="{{ route('liststudents.index') }}">
									<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
							</a>
					</li>

					<li class="sidebar-item{{ request()->routeIs('layouts.add') ? ' active' : '' }}">
							<a class="sidebar-link" href="{{ route('layouts.add')}}">
									<i class="align-middle" data-feather="book"></i> <span class="align-middle">Students Schedule</span>
							</a>
					</li>



				
			</div>
		</nav>