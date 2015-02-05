<div class="row">
	<div class="navbar navigation" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				{{ link_to_route('index_path', 'MovBizz', null, ['class' => 'navbar-brand']) }}
			</div>
			<div id="navbar" class="navbar-collapse collapse">
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
		</div>
	</div>
</div>