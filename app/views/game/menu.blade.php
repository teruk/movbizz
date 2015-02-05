@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<!-- game menu -->
	<div class="row">
		<div class="col-sm-5 movie-production" style="text-align: center">
			<div class="btn-group-vertical">
				
				<ul class="list-unstyled game-menu btn-block">
					<li>{{ link_to_route('selectMovieTitle_path', 'New Movie', null, ['class' => 'btn-block btn btn-link']) }}</li>
					<li>{{ link_to_route('charts_path', 'Cinema Charts', null, ['class' => 'btn-block btn btn-link'])}}</li>
					<li>{{ link_to_route('showMovies_path', 'Overview your movies', null, ['class' => 'btn-block btn btn-link']) }}</li>
					<li>{{ link_to_route('showIncomeCosts_path', 'Income / Costs', null, ['class' => 'btn-block btn btn-link']) }}</li>
					<li>{{ link_to_route('loan_path', 'Take a credit', null, ['class' => 'btn btn-link']) }} / {{ link_to_route('payback_path', 'pay back', null, ['class' => 'btn btn-link']) }}</li>
					<li>{{ link_to_route('advertisement_path', 'Advertisement', null, ['class' => 'btn-block btn btn-link']) }}</li>
					<li>{{ link_to_route('restart_path', 'Restart game', null, ['class' => 'btn-block btn btn-link']) }}</li>

					@if ($playersLeft > 0)
						{{ Form::open(['route' => 'nextPlayer_path'])}}
							<li>{{ Form::submit('Next Player', ['class' => 'btn btn-block btn-warning']) }}</li>
						{{ Form::close() }}
					@else
						{{ Form::open(['route' => 'turnSummary_path']) }}
							<li>{{ Form::submit('End Turn', ['class' => 'btn btn-block btn-info']) }}</li>
						{{ Form::close() }}
					@endif
				</ul>
			</div>
		</div>
	</div>

@stop