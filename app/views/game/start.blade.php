@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-sm-5">
			<h4>Start a new game</h4>
			<p>Please type in your {{ Lang::choice('name|names', $numberOfPlayers) }}:</p>

			{{ Form::open(['route' => 'startGame_path', 'class' => "form-horizontal"])}}

			@for ($i=1; $i<=$numberOfPlayers; ++$i)
				<div class="form-group">
					{{ Form::label('playerName'.$i, 'Player '.$i.':', ['class' => 'col-md-3 control-label']) }}
					<div class="col-md-9">
						{{ Form::text('playerName'.$i, null, ['class' => 'form-control input-sm', 'required', 'min' => 2, 'placeholder' => 'Player name']) }}
					</div>
				</div>
			@endfor

			<div class="form-group">
				<div class="div-button-footer col-md-8 col-md-offset-4">
					{{ link_to_route('selectNumberOfPlayers_path', 'Go back', null, ['class' => 'btn btn-sm btn-default']) }}
					{{ Form::submit('Start!', ['class' => 'btn btn-sm btn-success']) }}
				</div>
			</div>

			{{ Form::close() }}
				
		</div>
	</div>
@stop