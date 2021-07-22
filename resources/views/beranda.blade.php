@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active bg-dark text-white">
        <img class="d-block w-100" src="{{asset('storage/slider1.jpg')}}" alt="First slide">
      </div>
      <div class="carousel-item bg-dark text-white">
        <img class="d-block w-100" src="{{asset('storage/slider2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('storage/sliderlx.jpg')}}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <br>
  <div class="row judul">
    <div class="col-md-12 text-center">
        <h1>WELCOME TO SHOWROOM</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @foreach($posts as $post)
      <div class="col-lg-4">
          <img src="{{ Storage::url('public/posts/').$post->image }}" alt="" style="height: 250px; object-fit:contain; width:100%">
          <h3 align="center">{{$post->title}}</h3>
          <center><a href="{{route('lihat.show', $post->id)}}" class="btn btn-outline-light m-2">Lihat</a>
      </div>
      @endforeach
    </div>
  </div>
  <br>
  <br>
  <br>
  <div class="row judul">
    <div class="col-md-12 text-center">
        <h1>NEWS & EVENT</h1>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="row">
      @foreach($news as $nws)
      <div class="col-lg-4">
          <img src="{{ Storage::url('public/news/').$nws->image }}" alt="" style="height: 200px; object-fit:contain; width:100%">
          <h3 align="center">{{$nws->title}}</h3>
          <center><a href="{{route('lihatnews.show', $nws->id)}}" class="btn btn-outline-light m-2">Lihat</a>
      </div>
      @endforeach
    </div>
  </div>
<br>
  <div class="card bg-dark text-white">
    <img class="card-img" src="storage/lf-z.jpg" alt="Card image">
    <div class="card-img-overlay">
      <h1 class="display-3">LF-Z ELECTRIFIED</h1>
      <h1 class="display-3">CONCEPT WORLD PREMIERE</h1>
      <p class="lead">Lexus unveils a concept born of an all-new EV platform for seamless performance.</p>
      <p class="lead">
        <a class="btn btn-outline-light btn-lg" href="news_event" role="button">Explore More</a>
      </p>
    </div>
  </div>
@endsection