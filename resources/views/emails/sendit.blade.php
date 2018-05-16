@component('mail::message')
# Application Kpeiz
<ul class="list-group">
  <li class="list-group-item">Post : {{ $data['post'] }} </li>
  <li class="list-group-item">Nom : {{ $data['firstname'] .' '. $data['lastname'] }}</li>
  <li class="list-group-item">Email : {{ $data['email'] }}</li>
  <li class="list-group-item">Region : {{ $data['region'] }}</li>
  <li class="list-group-item">Salaire : {{ $data['salery'] or '' }}</li>
  <li class="list-group-item">Disponibilité : {{ $data['disp'] or '' }}</li>
</ul>
@if(isset($data['site']))
<br>
<h3>Sites : </h3>
@if(count($data['site']))
@foreach($data['site'] as $site)
-{{  $site }} <br>
@endforeach
@endif
@endif
<h3>Date : </h3><p>{{ Carbon\Carbon::now() }} </p>
<br>
{{ config('app.name') }}
@endcomponent
