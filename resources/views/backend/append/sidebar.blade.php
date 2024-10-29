<nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" id="sidebarToggle" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown">
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<li class="nav-item">
					<a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<p> <i class="nav-icon fas fa-sign-out-alt"></i> Logout</p>
					</a>
					<form id="logout-form" action="{{ route('backend.logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
				<form id="logout-form" action="" method="POST" style="display: none;">
					<input type="hidden" name="_token" value="iWOuijeQtOOVWZZRHBw2Oo27hvDktRcrHXtqOdrk">
				</form>
			</div>
		</li>
	</ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4 fixed-left" id="mainSidebar" style="overflow: auto;">
	<a href="{{ url('/') }}" class="navbar-brand d-flex align-items-start">
		@if ($siteLogo)
		<img src="{{ asset($siteLogo) }}" alt="Site Logo" class="img-fluid logo p-1" style="height: 3rem; width:7rem !important; padding-left: 15px !important;">
		@else
		<span class="navbar-brand">Site Name</span>
		@endif
	</a>
	<nav class="mt-2">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item">
				<a href="{{ route('backend.dashboard') }}" class="nav-link {{ request()->is('backend/dashboard') ? 'active' : '' }}">
					<i class="nav-icon fas fa-th"></i> <p>Dashboard</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.home.image-slider') }}" class="nav-link {{ request()->is('backend/home/image-slider') ? 'active' : '' }}">
					<i class="fas fa-home nav-icon"></i> <p>home page</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.home.partner') }}" class="nav-link {{ request()->is('backend/home/partner') ? 'active' : '' }}">
					<i class="fas fa-handshake nav-icon"></i> <p>Partner</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.home.review') }}" class="nav-link {{ request()->is('backend/home/review') ? 'active' : '' }}">
					<i class="fas fa-star nav-icon"></i> <p>Review</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.home.languages') }}" class="nav-link {{ request()->is('backend/home/languages') ? 'active' : '' }}">
					<i class="fas fa-language nav-icon"></i> <p>Languages</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="{{ route('backend.blogs.index') }}" class="nav-link {{ request()->is('backend/blog') ? 'active' : '' }}">
					<i class="nav-icon fas fa-concierge-bell"></i><p>Blog</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.media.images.index') }}" class="nav-link {{ request()->is('backend/media/image*') ? 'active' : '' }}">
					<i class="fas fa-image nav-icon"></i> <p>Images</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.media.videos.index') }}" class="nav-link {{ request()->is('backend/media/video*') ? 'active' : '' }}">
					<i class="fas fa-video nav-icon"></i> <p>Videos</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.media.links.index') }}" class="nav-link {{ request()->is('backend/media/link*') ? 'active' : '' }}">
					<i class="fas fa-link nav-icon"></i> <p>Media Links</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="{{ route('backend.statistics.index') }}" class="nav-link {{ request()->is('backend/statistics') ? 'active' : '' }}">
					<i class="fas fa-chart-bar nav-icon"></i> <p>Statistics</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.about.index') }}" class="nav-link {{ request()->is('backend/about') ? 'active' : '' }}">
					<i class="nav-icon fas fa-question-circle"></i> <p>About Us</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.new_products.index') }}" class="nav-link {{ request()->is('backend/new_products') ? 'active' : '' }}">
					<i class="nav-icon fas fa-boxes"></i> <p>Manage Products</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.career') }}" class="nav-link {{ request()->is('backend/career') ? 'active' : '' }}">
					<i class="nav-icon fas fa-info-circle"></i> <p>Career</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.job') }}" class="nav-link {{ request()->is('backend/job') ? 'active' : '' }}">
					<i class="nav-icon fas fa-users"></i> <p>Jobs</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.contacts') }}" class="nav-link {{ request()->is('backend/contacts') ? 'active' : '' }}">
					<i class="nav-icon fas fa-shopping-cart"></i> <p>Contracts</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.settings') }}" class="nav-link {{ request()->is('backend/settings') ? 'active' : '' }}">
					<i class="nav-icon fas fa-cog"></i> <p>Bannaer settings</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="{{ route('backend.main_settings.index') }}" class="nav-link">
					<i class="nav-icon fas fa-cogs"></i> <p>Main Settings</p>
				</a>
			</li>
		</ul>
	</nav>
</aside>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const sidebarToggle = document.getElementById('sidebarToggle');
		const mainSidebar = document.getElementById('mainSidebar');
		const body = document.body;
		if (localStorage.getItem('sidebarVisible') === 'true') {
			body.classList.add('sidebar-visible');
			body.classList.remove('sidebar-hidden');
			mainSidebar.style.transform = 'translateX(0)';
		} else {
			body.classList.add('sidebar-hidden');
			body.classList.remove('sidebar-visible');
			mainSidebar.style.transform = 'translateX(-100%)';
		}
		window.addEventListener('load', function() {
			document.body.classList.add('sidebar-visible');
			document.body.classList.remove('sidebar-hidden');
			document.getElementById('mainSidebar').style.transform = 'translateX(0)';
			localStorage.setItem('sidebarVisible', 'true');
		});

		function toggleSidebar() {
			const isVisible = body.classList.toggle('sidebar-visible');
			body.classList.toggle('sidebar-hidden', !isVisible);
			mainSidebar.style.transform = isVisible ? 'translateX(0)' : 'translateX(-100%)';
			localStorage.setItem('sidebarVisible', true);
		}

		sidebarToggle.addEventListener('click', function(event) {
			toggleSidebar();
			event.stopPropagation();
		});
		document.addEventListener('click', function(event) {
			if (window.innerWidth <= 768 &&
			    !mainSidebar.contains(event.target) &&
			    !sidebarToggle.contains(event.target)) {
				body.classList.add('sidebar-hidden');
			body.classList.remove('sidebar-visible');
			mainSidebar.style.transform = 'translateX(-100%)';
			localStorage.setItem('sidebarVisible', 'false');
		}
	});

		mainSidebar.addEventListener('click', function(event) {
			event.stopPropagation();
		});
	});
</script>
