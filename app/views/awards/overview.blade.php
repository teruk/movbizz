@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production awards">
			<h4><u>Award winners:</u></h4>
			
			@if (sizeof($winners) > 0)
				<ul class="list-unstyled">
					@foreach ($winners as $winner)
						<li>{{ $winner->title }}</li>
					@endforeach
				</ul>
			@else
				<p><i>No movie was good enough!</i></p>
			@endif

			<div class="form-group div-button-footer">
				{{ link_to_route('showTurnSummary_path', 'Go to turn summary', null, ['class' => 'btn btn-sm btn-default']) }}
			</div>
		</div>
	</div>

@stop