<div class="job-post" >
	<div class="form-cap">
		<h2>Choisir un poste</h2>
	</div>
	<div class="posts-wrap" >
		@foreach(config('details')[$type]['jobs'] as $index => $value )
		<div class="post">
			<div class="radiobox">
				<input id="post-{{$index}}" name="post" type="radio" value="{{ $value['title'] }}" data-collapse="job-specs-{{$index}}">
				<label for="post-{{$index}}">{{ $value['title'] }}</label>
			</div>
		</div>
		@endforeach
	</div>
	<div class="job-specs-wrap">
		@foreach(config('details')[$type]['jobs'] as $index => $value)
		<div id="job-specs-{{$index}}" class="job-specs panel-collapse collapse" role="tabpanel">
			<div class="well">
				{!! $value['desc'] !!}
			</div>
		</div>
		@endforeach
	</div>
</div>
