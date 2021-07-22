@extends('layouts.app')

@section('content')

  <div class="row judul">
    <div class="col-md-12 text-center">
        <h1>SHOWROOM GALLERY</h1>
    </div>
</div>
<br>
<br>
<div class="container d-flex justify-content-center">
  <div class="card w-150 bg-dark text-light">
  <div class="row">
      @foreach($galeris as $galeri)
      <div class="col-lg-4">
      <img src="{{ Storage::url('public/galeris/').$galeri->image }}" alt="" style="height: 250px; object-fit:contain; width:100%">
      <p>{!!$galeri->content!!}<p>
      </div>
      @endforeach
  </div>
</div>
@endsection