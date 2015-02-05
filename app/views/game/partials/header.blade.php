<!-- header -->
<div class="row">
	<div class="col-sm-5 game-header">

		<div class="col-xs-4"  style="background-color: #808080">
			<span class="{{ 'label label-'.$currentPlayer->getBgColorAttribute().''}}">Player:</span> {{ $currentPlayer->getNameAttribute() }}
		</div>

		<div class="col-xs-4" style="background-color: #808080">
			{{ $currentPlayer->getMoneyAttribute() }} €
		</div>

		<div class="col-xs-4" style="background-color: #808080">
			Round: {{ $round }}
		</div>

	</div>
</div>