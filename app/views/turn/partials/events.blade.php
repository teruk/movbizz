<p><b>Events:</b></p>
<table class="table table-condensed">
	<tbody>
		@foreach ($players as $player)
		<tr class={{ $player->getBgColorAttribute() }}>
			<td>{{ $player->getNameAttribute() }}:</td>
			<td>{{ $player->getEventAttribute() }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
