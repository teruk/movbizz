@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Step 3: Select director!</h4>

			@unless($directors->isEmpty())
				{{ Form::open(['route' => 'storeDirector_path']) }}

					<div class="form-group">
						<table class="table-striped game-select-table">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Wage</th>
								</tr>
							</thead>
							<tbody>
								@foreach($directors as $director)
									<tr>
										<td>{{ Form::radio('director', $director->id, true) }}</td>
										<td>{{ $director->present()->name }}</td>
										<td class="td-costs">{{ $director->wage }} €</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="3">{{ $directors->links() }}</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="td-costs">
										{{ link_to_route('menu_path', 'Cancel', null, ['class' => 'btn btn-danger btn-sm']) }}
										{{ Form::submit('Next Step: Select Location!', ['class' => 'btn btn-sm btn-primary'])}}
									</td>
								</tr>
							</tfoot>
						</table>
					</div>

					{{ Form::close() }}
			@endunless
		</div>
	</div>
@stop