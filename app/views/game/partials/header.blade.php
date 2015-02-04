<!-- header -->
<div class="row">
	<div class="col-sm-5 game-header">

		<div class="col-sm-4">
			{{ $currentPlayer->getNameAttribute() }}
		</div>

		<div class="col-sm-4">
			{{ $currentPlayer->getMoneyAttribute() }} €
		</div>

		<div class="col-sm-4">
			Round: {{ $round }}
		</div>

	</div>
</div>