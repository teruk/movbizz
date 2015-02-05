<table class="table table-condensed">
	<tbody>
		@foreach ($income as $player)
			<tr class={{ $player['player']->getBgColorAttribute() }}>
				<td colspan="4"><b>{{ $player['player']->getNameAttribute() }}</b></td>
			</tr>
			<tr class={{ $player['player']->getBgColorAttribute() }}>
				<td>Round income:</td>
				<td class="td-costs">{{ $player['income'] }} €</td>
				<td>Total points:</td>
				<td class="td-costs">{{ $player['player']->getPointsAttribute() }}</td>
			</tr>
			<tr class={{ $player['player']->getBgColorAttribute() }}>
				<td>Loan:</td>
				<td class="td-costs" colspan="3">{{ $player['player']->getLoanAttribute() }}</td>
			</tr>
			@if ($player['player']->getLoanAttribute() > 0)
				<tr class={{ $player['player']->getBgColorAttribute() }}>
					<td colspan="4">{{ $player['player']->getNameAttribute() }} has to pay {{ floor( $player['player']->getLoanAttribute() * $interestRate / 100 ) }} € interest ({{ $interestRate }} % of {{ $player['player']->getLoanAttribute() }} €)</td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>