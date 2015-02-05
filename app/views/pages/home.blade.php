@extends('layouts.default')

@section('content')
	<div class="row">
		<h3>Welcome to MovBizz!</h3>
		<article>This game is a remake of the C64 game Movie Business. It is a text based game where you choose an actor, a director and a location for your movie. You can advertise your movie in the paper, in the radio or on tv. Create a movie that wins awards and fills your moneybag! But be careful random events can influence your movie production in both, a positive and a negative, way.</article>

		<br>
		<p><i>Be aware that the current version of the game is an early version and many features are missing!</i></p>
		{{ link_to_route('selectNumberOfPlayers_path', 'Start a new game!', null, ['class' => 'btn btn-success']) }}

		<br><br>
		<div class="col-md-6">
			<p><b>Current features:</b></p>
			<ul>
				<li>Produce a movie by selecting: actor, director, location and title</li>
				<li>Taking and paying back loans</li>
				<li>Advertise your movie</li>
				<li>Dynamic cinema charts</li>
				<li>Awards every 12 rounds</li>
				<li>Random events during production, e.g. drug use, lottery win</li>
				<li>Local multiplayer</li>
			</ul>
		</div>

		<div class="col-md-6">
			<p><b>ToDo list:</b></p>
			<ul>
				<li>Adjust movie income, advertise impact on movie and movie quality calculation</li>
				<li>Adjust long-term development of actor, director and location costs</li>
				<li>Point system</li>
				<li>Localisation</li>
			</ul>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<br><b>Share your thoughts about MovBizz:</b>
			@include('pages.partials.disqus')
		</div>
	</div>
@stop