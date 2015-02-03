@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4>Step 1: Select movie title!</h4>

			{{ Form::open(['route' => 'storeMovieTitle_path']) }}

			<div class="form-group">
				{{ Form::label('title', 'Movie Title:') }}
				{{ Form::text('title', null, ['class' => 'form-control', 'required', 'min' => 3, 'placeholder' => 'Movie title']) }}
			</div>

			<div class="form-group" style="text-align: right">
				{{ link_to_route('menu_path', 'Cancel', null, ['class' => 'btn btn-danger btn-sm']) }}
				{{ Form::submit('Next Step: Select Actor!', ['class' => 'btn btn-sm btn-primary'])}}
			</div>

			{{ Form::close()}}
		</div>
	</div>

@stop