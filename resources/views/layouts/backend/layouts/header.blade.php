<nav class="navbar">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
				data-target="#navbar-collapse" aria-expanded="false"></a>
			<a href="javascript:void(0);" class="bars"></a>
			<a class="navbar-brand" href="@if (Auth::user()->role == 'admin')
				{{ route('admin.dashboard') }}
			@elseif (Auth::user()->role == 'author')
				{{ route('author.dashboard') }}
			@endif">WikiCulTurE</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<!-- Call Search -->
				<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a>
				</li>
				<!-- #END# Call Search -->
				<!-- Notifications -->
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
						<i class="material-icons">notifications</i>
					</a>
					<ul class="dropdown-menu">
						<li class="header">NOTIFICATIONS</li>

						<li class="footer">
							<a href="javascript:void(0);">View All Notifications</a>
						</li>
					</ul>
				</li>
				<!-- #END# Notifications -->
				<!-- Tasks -->
				<li class="dropdown">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
						<i class="material-icons">flag</i>
					</a>
					<ul class="dropdown-menu">
						<li class="header">TASKS</li>
						<li class="footer">
							<a href="javascript:void(0);">View All Tasks</a>
						</li>
					</ul>
				</li>
				<!-- #END# Tasks -->
			</ul>
		</div>
	</div>
</nav>
