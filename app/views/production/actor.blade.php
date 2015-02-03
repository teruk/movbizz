@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4>Step 2: Select actor!</h4>

			@unless($actors->isEmpty())
				{{ Form::open(['route' => 'storeActor_path']) }}

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
								@foreach($actors as $actor)
									<tr>
										<td>{{ Form::radio('actor', $actor->id, true) }}</td>
										<td>{{ $actor->present()->name }}</td>
										<td class="td-costs">{{ $actor->wage }} €</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="3">{{ $actors->links() }}</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="td-costs">
										{{ link_to_route('menu_path', 'Cancel', null, ['class' => 'btn btn-danger btn-sm']) }}
										{{ Form::submit('Next Step: Select Director!', ['class' => 'btn btn-sm btn-primary'])}}
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