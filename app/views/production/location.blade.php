@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4>Step 4: Select location!</h4>

			@unless($locations->isEmpty())
				{{ Form::open(['route' => 'storeLocation_path']) }}

					<div class="form-group">
						<table class="table-striped game-select-table">
							<thead>
								<tr>
									<th></th>
									<th>Name</th>
									<th>Rent</th>
								</tr>
							</thead>
							<tbody>
								@foreach($locations as $location)
									<tr>
										<td>{{ Form::radio('location', $location->id, true) }}</td>
										<td>{{ $location->name }}</td>
										<td class="td-costs">{{ $location->rent }} €</td>
									</tr>
								@endforeach
								<tr>
									<td colspan="3">{{ $locations->links() }}</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3" class="td-costs">
										{{ link_to_route('menu_path', 'Cancel', null, ['class' => 'btn btn-danger btn-sm']) }}
										{{ Form::submit('Next Step: Summary!', ['class' => 'btn btn-sm btn-primary'])}}
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