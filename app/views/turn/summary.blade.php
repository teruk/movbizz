@extends('layouts.default')

@section('content')
	@include('game.partials.header')

	<div class="row">
		<div class="col-md-5 movie-production">
			<h4><u>Turn summary</u></h4>

			<p><b>Events:</b></p>
				<ul class="list-unstyled">
					@foreach ($events as $event)
						<li>{{ $event }}</li>
					@endforeach
				</ul>				
				

			@if (sizeOf($inProductionMovies) > 0)
				<p><b>Production:</b></p>
				<ul class="list-unstyled">
					@foreach ($inProductionMovies as $movie)
						@if ($movie->status == 0)
							<li>{{ $movie->title }} - Running costs: {{ $movie->runningCosts }} €</li>
						@else
							<li>{{ $movie->title }} - Running costs: {{ $movie->runningCosts }} € - {{ $movie->present()->rating }}</li>
						@endif
					@endforeach
				</ul>
			@endif

			@if (sizeof($inChartsMovies) > 0)
				<p><b>Income:</b></p>
				<ul class="list-unstyled">
					@foreach ($inChartsMovies as $movie)
						<li>{{ $movie->title }} - Income: {{ $movie->roundIncome }}</li>
					@endforeach
				</ul>
			@endif

			@if ($loan > 0)
				<p><b>Loan:</b></p>
				<article>You have to pay {{ $interest }} € interest ({{ Session::get('game.credit_rate') }} % of {{ $loan }} €)</article>
			@endif


			<div class="form-group div-button-footer">
				{{ link_to_route('charts_path', 'Go to charts', null, ['class' => 'btn btn-sm btn-default']) }}
				{{ link_to_route('menu_path', 'Go to next turn', null, ['class' => 'btn btn-sm btn-default']) }}
			</div>
		</div>
	</div>
@stop