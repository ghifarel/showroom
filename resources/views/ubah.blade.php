@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container my-3 w-50" style="min-height: 500px">
    <div class="card text-dark">
        <div class="card-header">
            <h1>Ubah Customer</h1>
        </div>
        <div class="card-body">
            <form action="{{route('customer.update', $customer->id)}}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama <input type="text" name="nama" required value="{{$customer->nama}}">
                    NIK <input type="text" name="nik" required value="{{$customer->nik}}">
                    Alamat <input type="text" name="alamat" required value="{{$customer->alamat}}">
                    Telephone <input type="text" name="telp" required value="{{$customer->telp}}">
                </ul>
                <br>
                <input type="submit" value="Simpan Data" class="btn btn-success">
                <a href="{{route('customer.index')}}" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection