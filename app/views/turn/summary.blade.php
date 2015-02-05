@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4><u>Turn summary</u></h4>

			@include('turn.partials.events')
				
			@include('turn.partials.production')

			<h4>
				<u>Player summary</u>
			</h4>

			@include('turn.partials.players')

			<div class="form-group div-button-footer">
				{{ link_to_route('charts_path', 'Go to charts', null, ['class' => 'btn btn-sm btn-default']) }}
				{{ link_to_route('menu_path', 'Go to next turn', null, ['class' => 'btn btn-sm btn-default']) }}
			</div>
		</div>
	</div>
@stop