@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-md-5">
			<h4>Start a new game</h4>
			<p>Please type in your name:</p>

			{{ Form::open(['route' => 'startGame_path'])}}

			<div class="form-group">
				{{ Form::label('player_name', 'Name:')}}
				{{ Form::text('player_name', null, ['class' => 'form-control', 'required', 'min' => 2, 'placeholder' => 'Player name']) }}
			</div>

			<div class="form-group div-button-footer">
				{{ Form::submit('Start!', ['class' => 'btn btn-sm btn-success']) }}
			</div>

			{{ Form::close() }}
				
		</div>
	</div>
@stop