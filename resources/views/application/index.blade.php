@extends('layouts.master')
@section('content')
<!-- <style type="text/css">
	.error{
		border : 1px solid red !important;
	}
</style> -->
<div class="application-inner" id="apInner">
	@include('application.partials.page_header',[ 'type' => $type ])
	<form id="application" class="application-form" method="POST" action="/application/submit/{{ $type }}" enctype="multipart/form-data">
		@include('application.partials.job_post',[ 'type' => $type ])
		<div class="basic-informations">
			<div class="form-cap">
				<h2>Informations de base</h2>
				<p>Parlez nous de vous</p>
			</div>

			<input type="hidden" name="type" value="{{ $type }}">

			<div class="row nm-10">
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="firstname">Prénom</label>
						<input id="firstname" name="firstname" class="form-control @if($errors->has('firstname')) error  @endif" type="text" value="{{ old('firstname') }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="lastname">Nom</label>
						<input id="lastname" name="lastname" class="form-control @if($errors->has('lastname')) error  @endif" type="text" value="{{ old('lastname') }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="email">E-mail</label>
						<input value="{{ old('email') }}" id="email" name="email" class="form-control @if($errors->has('email')) error  @endif" type="text">
					</div>
				</div>
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="region">Région</label>
						<select id="region" name="region" class="selectpicker @if($errors->has('region')) error  @endif">
							@foreach($regions as $key => $region)
							<option value="{{ $region }}" @if($key == 'TU') selected @endif>{{ $region }}</option>
							@endforeach
						</select>
					</div>
				</div>

				@if($type == 'developer')
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="salery">Prétentions salariale</label>
						<input id="salery" name="salery" class="form-control @if($errors->has('salery')) error  @endif" type="text" value="{{ old('salery') }}">
					</div>
				</div>
				<div class="col-md-6 col-sm-6 p-h-10">
					<div class="input-wrap">
						<label for="disp">Disponibilité</label>
						<select id="disp" name="disp" class="selectpicker @if($errors->has('disp')) error  @endif">
							<option value="immediate">immédiate</option>
							<option value="1week">Dans une semaine</option>
							<option value="2week">Dans deux semaine</option>
							<option value="1month">Dans trois semaine</option>
						</select>
					</div>
				</div>
				@endif



			</div>
		</div>
		<div class="additional-informations">
			<div class="form-cap">
				<h2>Informations additionnelles</h2>
				<p>Parlez nous de vos compétences</p>
			</div>
			<div class="row">
				<!-- <div class="col-md-12">
						<div class="input-wrap">
								<label for="message">Message</label>
								<textarea id="message" name="message" class="form-control @if($errors->has('message')) error  @endif" rows="7">{{ old('message') }}</textarea>
						</div>
				</div> -->
				<div class="col-md-12">
					<div class="files">
						<h3>Resumé</h3>
						<div class="files-wrap">
							<label class="file-upload @if($errors->has('file'))  error  @endif" for="file-1">
								<input class="file" id="file-1" name="file[]" type="file" >
								<span class="file-name">Parcourir</span>
								<span class="file-btn">
									<i class="ico-upload"></i>
									<span>Upload</span>
								</span>
							</label>
						</div>
						<div class="add-btn-wrap">
							<button id="add-file" class="btn add-btn" type="button">
							<i class="ico-plus"></i>
							<span>Autres fichiers</span>
							</button>
						</div>
					</div>
				</div>
				@if($type != 'marketer')
				<div class="col-md-12">
					<div class="sites">
						<h3>Site/Portfolio</h3>
						<div class="sites-wrap">
							<div class="input-wrap">
								<div class="input-icon">
									<input  id="site-1" accept=".pdf, .doc, .docx" name="site[]" class="form-control @if($errors->has('site')) error  @endif" type="text" placeholder="http://exemple">
									<i class="ico-link"></i>
								</div>
							</div>
						</div>
						<div class="add-btn-wrap">
							<button id="add-site" class="btn add-btn" type="button">
							<i class="ico-plus"></i>
							<span>Autre URLs</span>
							</button>
						</div>
					</div>
				</div>
				@endif
			</div>
		</div>
		<div class="application-sub-wrap" id="wrapp">
			<button  id="submit" type="button" class="btn lg-btn white-shadow application-sub" waves-hover>
			Submit Application
			</button>
			<button type="submit" style="display:none" id="hiddenSub"></button>
		</div>
	</form>
</div>
@endsection


@section('js')
<script type="text/javascript">
$('#submit').click(function(event){
	var postInput = $("input[name='post']:checked").val();

	if(postInput == '' || postInput == undefined){
		toastr.error('Vous devez choisir un poste.', 'Oops!');

	    $('html, body').animate({
	        scrollTop: $("#apInner").offset().top
	    }, 1000);
		return false;
	}
	if($(".file").eq(0).val() == ''){
		toastr.error('Le CV est requis.', 'Oops!');
		return false;
	}
	var newUser = sessionStorage.getItem('newUser');
	if(newUser == null || newUser != "true"){
		fbq('trackCustom', 'SubmitClick');
		sessionStorage.setItem('newUser',true);
	}
	$('#hiddenSub').click();
});


</script>
@endsection
