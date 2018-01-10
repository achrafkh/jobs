@component('mail::message')
# Application Kpeiz
<ul class="list-group">
  <li class="list-group-item">Post : {{ $data['post'] }} </li>
  <li class="list-group-item">Nom : {{ $data['firstname'] .' '. $data['lastname'] }}</li>
  <li class="list-group-item">Email : {{ $data['email'] }}</li>
  <li class="list-group-item">Region : {{ $data['region'] }}</li>
</ul>

<h3>Message :</h3>
<p>
	{{ $data['message'] }}
</p>
<br>
<h3>Sites : </h3>
@if(count($data['site']))
<ul class="list-group">
	@foreach($data['site'] as $site)
  		<li class="list-group-item">Site : {{  $site }} </li>
  	@endforeach
</ul>
@endif
<h3>Date : </h3><p>{{ Carbon\Carbon::now() }} </p>
<br>
{{ config('app.name') }}
@endcomponent
