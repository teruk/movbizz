@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Income / Costs</h4>

			<table class="table-striped game-select-table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Minus</th>
						<th>Plus</th>
					</tr>
				</thead>
				<tbody>
					@if (sizeof($movies) > 0)
						@foreach ($movies as $movie)
							<tr>
								<td>{{ $movie->title }}</td>
								<td class="td-costs">{{ $movie->costs }} €</td>
								<td class="td-costs">{{ $movie->income }} €</td>
							</tr>
						@endforeach
					@endif
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