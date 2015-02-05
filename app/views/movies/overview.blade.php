@extends('layouts.default')

@section('content')
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Overview</h4>

			<table class="table-striped game-select-table">
				<thead>
					<tr>
						<th>Title</th>
						<th>Round</th>
						<th>Critics</th>
					</tr>
				</thead>
				<tbody>
					@if (sizeof($movies) > 0)
						@foreach ($movies as $movie)
							<tr>
								<td>{{ $movie->title }}</td>
								<td>{{ $movie->round }}</td>
								<td>{{ $movie->present()->quality }}</td>
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