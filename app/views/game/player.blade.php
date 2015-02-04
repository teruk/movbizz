@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-5">
			<h4>Start a new game</h4>
			<p>Choose the number players!</p>

			@for ($i = 1; $i <= 5; $i++)
				<div class="col-md-1">
					{{ Form::open(['route' => 'chooseNumberOfPlayers_path'])}}

					<div class="form-group">
						{{ Form::hidden('numberOfPlayers', $i) }}
						{{ Form::submit($i, ['class' => 'btn btn btn-default']) }}
					</div>

					{{ Form::close() }}
				</div>
			@endfor
				
		</div>
	</div>
@stop