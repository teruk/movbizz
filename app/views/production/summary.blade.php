@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Production summary:</h4>

			<table class="game-select-table">
				<tbody>
					<tr>
						<th>Movie Title:</th>
						<td colspan=2>{{ $production['title']}}
					</tr>

					<tr>
						<th>Actor:</th>
						@if (array_key_exists('actor', $production))
							<td>{{ $production['actor']['name'] }}</td>
							<td class="td-costs">{{ $production['actor']['wage'] }} €</td>
						@else
							<td colspan="2">{{ link_to_route('selectActor_path', 'Select Actor!') }}</td>
						@endif
					</tr>

					<tr>
						<th>Director:</th>
						@if (array_key_exists('director', $production))
							<td>{{ $production['director']['name'] }}</td>
							<td class="td-costs">{{ $production['director']['wage'] }} €</td>
						@else
							<td colspan="2">{{ link_to_route('selectDirector_path', 'Select Director!') }}</td>
						@endif
					</tr>

					<tr>
						<th>Location:</th>
						@if (array_key_exists('location', $production))
							<td>{{ $production['location']['name'] }}</td>
							<td class="td-costs">{{ $production['location']['rent'] }} €</td>
						@else
							<td colspan="2">{{ link_to_route('selectLocation_path', 'Select Location!') }}</td>
						@endif
					</tr>

					<tr class="tr-total-cost">
						<th>Total cost:</th>
						<td></td>
						<td class="td-costs">{{ $production['total_cost'] }} €</td>
					</tr>
				</tbody>

				<tfoot>
					<tr>
						@if (array_key_exists('actor', $production) AND array_key_exists('director', $production) AND array_key_exists('location', $production))
							@if ($affordable)
								{{ Form::open(['route' => 'startProduction_path']) }}
									<td colspan=3  class="td-footer">
										{{ Form::submit('Begin Production!', ['class' => 'btn btn-sm btn-success'])}}
									</td>
								{{ Form::close() }}
							@else
								<td colspan="3" class="td-footer">
									You can't afford it! {{ link_to_route('menu_path', 'Back to menu!')}}
								</td>
							@endif
						@else
							<td colspan="3" class="td-footer">
								<!-- Your movie isn't ready for production yet! -->
								Your movie is incomplete!
							</td>
						@endif
					</tr>
				</tfoot>
			</table>	
		</div>
	</div>
@stop