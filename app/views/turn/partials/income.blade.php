<p><b>Income:</b></p>

<table class="table table-condensed">
	<tbody>
		@foreach ($income as $player)
			<tr class={{ $player['player']->getBgColorAttribute() }}>
				<td>{{ $player['player']->getNameAttribute() }}</td>
				<td>{{ $player['income'] }} €</td>
			</tr>
		@endforeach
	</tbody>
</table>
