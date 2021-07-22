@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-header text-dark text-center">
            <h2>{{$user->role}}</h2>
        </div>
        <div class="card-body text-dark">
            <div class="row ">
                <h4 class="col font-weight-bold text-center">{{$user->name}} </h4>
            </div>
            <div class="row ">
                <h4 class="col font-weight-bold text-center"> {{$user->email}} </h4>
            <hr>
        </div>
        <br>
        <a href="{{route('users.index')}}" class="btn btn-primary" >Back</a>
    </div>
</div>
@endsection