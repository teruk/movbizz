<div class="row">
	<nav class="navbar navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				{{ link_to_route('index_path', 'MovBizz', null, ['class' => 'navbar-brand']) }}
			</div>


			<ul class="nav navbar-nav">
				<li>{{ link_to_route('index_path', 'Home') }}</li>
				@if ($game)
					<li>{{ link_to_route('menu_path', 'Game') }}</li>
				@else
					<li>{{ link_to_route('selectNumberOfPlayers_path', 'New Game') }}
				@endif
				<li>{{ link_to_route('changelog_path', 'Changelog')}}
			</ul>
		</div>
	</nav>
</div>