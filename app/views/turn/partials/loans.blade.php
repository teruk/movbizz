@if ($hasLoans)
	<p><b>Loans:</b></p>
	<table class="table table-condensed">
		<tbody>
			@foreach ($players as $player)
				@if ($player->getLoanAttribute() > 0)
					<tr class={{ $player->getBgColorAttribute()}}>
						<td>{{ $player->getNameAttribute() }}</td>
						<td>has to pay {{ floor( $player->getLoanAttribute() * $interestRate / 100 ) }} € interest ({{ $interestRate }} % of {{ $player->getLoanAttribute() }} €)</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
@endif