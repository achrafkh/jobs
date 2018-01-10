<div class="job-post">
	<!-- <div class="form-cap">
		<h2>Choisir un post</h2>
	</div> -->
	<div class="row nm-10">
		@foreach(config('details')[$type]['jobs'] as $index => $value )
		<div class="col-md-4 col-sm-4 p-h-10">
			<div class="radiobox">
				<input id="post-{{$index}}" name="post" type="radio" value="DA Senior" data-collapse="job-specs-{{$index}}">
				<label for="post-{{$index}}">{{ $value['title'] }}</label>
			</div>
		</div>
		@endforeach
		<div class="col-md-12">
			@foreach(config('details')[$type]['jobs'] as $index => $value)
			<div id="job-specs-{{$index}}" class="job-specs panel-collapse collapse" role="tabpanel">
				<div class="well">
					{!! $value['desc'] !!}
				</div>
			</div>
		@endforeach
		</div>
	</div>
</div>
