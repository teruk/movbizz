@extends('layouts.default')

@section('content')

	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4>Select Advertisement for {{ $movie->title }}!</h4>

			{{ Form::open(['route' => 'placeAdvertisement_path']) }}

				<div class="form-group">
					{{ Form::label('tv', 'TV advertisement ('.$prices['tv'].' €):') }}
					{{ Form::input('number', 'tv', 0, ['class' => 'input-sm form-control', 'max' => (9), 'min' => 0, 'step' => 1]) }}
				</div>

				<div class="form-group">
					{{ Form::label('radio', 'Radio advertisement ('.$prices['radio'].' €):') }}
					{{ Form::input('number', 'radio', 0, ['class' => 'input-sm form-control', 'max' => (9), 'min' => 0, 'step' => 1]) }}
				</div>

				<div class="form-group">
					{{ Form::label('poster', 'Poster \ Billboard advertisement ('.$prices['poster'].' €):') }}
					{{ Form::input('number', 'poster', 0, ['class' => 'input-sm form-control', 'max' => (9), 'min' => 0, 'step' => 1]) }}
				</div>

				<div class="form-group div-button-footer">
					{{ link_to_route('menu_path', 'Go back', null, ['class' => 'btn btn-sm btn-default']) }}
					{{ Form::submit('Advertise!', ['class' => 'btn btn-sm btn-success']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@stop