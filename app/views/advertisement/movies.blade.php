@extends('layouts.default')

@section('content')

	@include('game.partials.header')

	<div class="row">
		<div class="col-sm-5 movie-production">
			<h4>Select Movie!</h4>

			{{ Form::open(['route' => 'selectAdvertisement_path']) }}
			<div class="form-group">
				<ul class="list-unstyled">
					@foreach($movies as $movie)
						<li>{{ Form::radio('round', $movie->round, true) }} {{ $movie->title }}</li>
					@endforeach
				</ul>
			</div>

			<div class="form-group div-button-footer">
				{{ link_to_route('menu_path', 'Go back', null, ['class' => 'btn btn-sm btn-default']) }}

				@if (sizeof($movies) > 0)
					{{ Form::submit('Select Movie!', ['class' => 'btn btn-sm btn-primary']) }}
				@endif
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop