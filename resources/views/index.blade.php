@extends('layouts.master')
@section('content')
<div class="landing-inner">
  <div class="landing-header">
    <h1>Choose your destiny</h1>
    <p>Be part of something big</p>
  </div>
  <div class="category-slider">
    <div class="category-slide">
      <div class="category-box">
        <div class="cb-img">
          <img class="img-responsive" src="/assets/images/marketer-bg.jpg">
        </div>
        <h2 class="cb-title">Marketing</h2>
        <p class="cb-cap">Inbound, Sales, Lead generation..</p>
        <a class="btn lg-btn orange-btn cb-btn" href="/application/marketer" waves-hover>
          Yup, it's me
        </a>
      </div>
    </div>
    <div class="category-slide">
      <div class="category-box">
        <div class="cb-img">
          <img class="img-responsive" src="/assets/images/designer-bg.jpg">
        </div>
        <h2 class="cb-title">Designer</h2>
        <p class="cb-cap">UI/UX, Photoshop, Illustrator...</p>
        <a class="btn lg-btn green-btn cb-btn" href="/application/designer" waves-hover>
          Yup, it's me
        </a>
      </div>
    </div>
    <div class="category-slide">
      <div class="category-box">
        <div class="cb-img">
          <img class="img-responsive" src="/assets/images/developer-bg.jpg">
        </div>
        <h2 class="cb-title">Developer</h2>
        <p class="cb-cap">Web, PHP, Mysql,Laravel...</p>
        <a class="btn lg-btn cyon-btn cb-btn" href="/application/developer" waves-hover>
          Yup, it's me
        </a>
      </div>
    </div>
  </div>
</div>
@endsection


@section('js')
@if(Session::has('msg'))
  <script type="text/javascript">
    toastr.success({!! json_encode(Session::get('msg')['msg']) !!}, 'Succès')
  </script>
@endif
@endsection
