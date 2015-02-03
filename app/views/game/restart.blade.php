@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<p>Would you like to restart the game?</p>

			{{ Form::open(['route' => 'restart_path']) }}
				<div class="form-group div-button-footer">
					{{ link_to_route('menu_path', 'Back', null, ['class' => 'btn btn-sm btn-danger']) }}
					{{ Form::submit('Restart!', ['class' => 'btn btn-sm btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>

@stop