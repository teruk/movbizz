@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4>Charts</h4>

			<table class="table game-select-table table-condensed">
				<thead>
					<tr>
						<th>Pos.</th>
						<th>Title</th>
						<th>Income €</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($charts as $chartElement)
						@if ($chartElement->belongsToPlayer)
							<tr class="info">
						@else
							<tr>
						@endif
							<td>{{ $chartElement->currentPosition }}</td>
							<td>
								{{ $chartElement->movie->title }}
							</td>
							<td class="td-costs">{{ $chartElement->income }}</td>
						</tr>
					@endforeach
				</tbody>

				<tfoot>
					<tr>
						<td colspan="4" class="td-footer">
							{{ link_to_route('menu_path', 'Go back', null, ['class' => 'btn btn-sm btn-default'])}}
						</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
	</div>
@stop