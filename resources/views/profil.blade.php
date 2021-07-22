@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-50 text-dark">
        <div class="card-header">
            <h3>Profil Customer</h3>
        </div>
        <div class="card-body">
            <div class="row ml-2">
                <h4 class="col-4">Nama</h4>
                <h4>: {{$customer->nama}} </h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">NIK</h4>
                <h4>: {{$customer->nik}} </h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Alamat</h4>
                <h4>: {{$customer->alamat}} </h4>
            </div>
            <div class="row ml-2">
                <h4 class="col-4">Telephone</h4>
                <h4>: {{$customer->telp}} </h4>
            </div>
            <br>
            <a href="{{route('customer.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection