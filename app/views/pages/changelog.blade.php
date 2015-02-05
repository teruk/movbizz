@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<h3>Update 04. February 2015</h3>

			<p><b>Game:</b></p>
			<ul>
				<li>Added local multiplayer feature: play with up to 5 people</li>
			</ul>

			<p><b>Technical:</b></p>
			<ul>
				<li>Adapted game to local multiplayer; for detail information see <a href="https://github.com/teruk/movbizz">Github</a></li>
				<li>Fixed bug: Movie round were increased twice at the end of each turn</li>
				<li>Added MovBizz\Players\Player and MovBizz\Players\PlayerRepository class</li>
			</ul>
		</div>

		<div class="col-sm-12">
			<h3>Update 02. February 2015</h3>

			<p><b>Game:</b></p>
			<ul>
				<li>Added award feature: every 12 round you have a chance to win price money</li>
				<li>Added random events: at the end of every round, there is a slight chance that something happens</li>
			</ul>

			<p><b>Technical:</b></p>
			<ul>
				<li>Added getter to MovBizz\Movies\Movie.php model</li>
				<li>Included an oberserver for events(observer.php)</li>
				<li>Added an interface MovBizz\Interfaces\RandomEventsInterface and a handler MovBizz\Handlers\RandomEvents</li>
				<li>Added folder MovBizz\RandomEvents, four random events and a repository MovBizz\RandomEventsRepository</li>
				<li>Some code cleanup</li>
			</ul>

			<p><b>Page:</b></p>
			<ul>
				<li>Added footer</li>
				<li>Added <a href="https://disqus.com">Disqus-Widget</a> to the main page</li>
				<li>Added changelog</li>
			</ul>
		</div>
	</div>
@stop