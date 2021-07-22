@extends('layouts.app')

@section('content')

  <div class="row judul">
    <div class="col-md-12 text-center">
        <h1>NEWS FROM  SHOWROOM</h1>
    </div>
</div>
<br>
<br>
<div class="container">
  <div class="row">
      @foreach($news as $nws)
      <div class="col-lg-4">
      <img src="{{ Storage::url('public/news/').$nws->image }}" alt="" style="height: 250px; object-fit:contain; width:100%">
      </div>
      <div class="col-lg-8">
        <h3 align="center">{{$nws->title}}</h3>
        <br>
        <h5 align="justify">{!!$nws->content!!}</h5>
      </div>
      @endforeach
  </div>
</div>
@endsection