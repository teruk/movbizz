@extends('layouts.default')

@section('content')
	
	@include('game.partials.header')

	<!-- game menu -->
	<div class="row">
		<div class="col-sm-5 movie-production">
			<p>Current loan: {{ $currentLoan }} € (max. 2000000 €)</p>

			{{ Form::open(['route' => 'takeLoan_path']) }}

			<div class="form-group">
				{{ Form::label('amount', 'Loan:') }}
				{{ Form::input('number', 'amount', 0, ['class' => 'input-sm form-control', 'max' => (2000000 - $currentLoan), 'min' => 0, 'step' => 100000]) }}
			</div>

			<div class="form-group div-button-footer">
				{{ link_to_route('menu_path', 'Go back', null, ['class' => 'btn btn-sm btn-default']) }}
				{{ Form::submit('Take loan!', ['class' => 'btn btn-sm btn-success']) }}
			</div>
			{{ Form::close() }}
		</div>
	</div>
@stop