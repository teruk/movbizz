@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Charts</h4>

			<table class="table table-condensed">
				<thead>
					<tr>
						<th>Pos.</th>
						<th>Title</th>
						<th>Income €</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($charts as $chartElement)
						<tr class={{ $chartElement->getBackgroundColorAttribute() }}>
							<td>{{ $chartElement->getCurrentPositionAttribute() }}</td>
							<td>{{ $chartElement->getMovieAttribute()->getTitleAttribute() }}</td>
							<td class="td-costs">{{ $chartElement->getIncomeAttribute() }}</td>
						</tr>
					@endforeach
				</tbody>

				<tfoot>
					<tr>
						<td colspan="3" class="td-footer">
							{{ link_to_route('menu_path', 'Go back', null, ['class' => 'btn btn-sm btn-default'])}}
						</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
@stop