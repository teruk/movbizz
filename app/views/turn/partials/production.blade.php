@if (sizeOf($inProductionMovies) > 0)
	<p><b>Production:</b></p>
	
	<table class="table table-condensed">
		<tbody>
			@foreach ($inProductionMovies as $movie)
				<tr class={{ $movie['backgroundColor'] }}>
					@if ($movie['movie']->hasStatusInProduction())
						<td>{{ $movie['movie']->title }} - Running Costs: {{ $movie['movie']->getRunningCostsAttribute() }} €</td>
					@else
						<td>{{ $movie['movie']->title }} - Running Costs: {{ $movie['movie']->getRunningCostsAttribute() }} € - <b>{{ $movie['movie']->present()->rating}}</b></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@endif