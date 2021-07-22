@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container my-3 w-50" style="min-height: 500px">
    <div class="card text-dark">
        <div class="card-header">
            <h1>Tambah Customer</h1>
        </div>
        <div class="card-body">
            <form action="{{route('customer.index')}}" method="POST">
                @csrf
                <ul class="list-group">
                    Nama <input type="text" name="nama" required>
                    NIK <input type="text" name="nik" required>
                    Alamat <input type="text" name="alamat" required>
                    Telephone <input type="number" name="telp" required>
                </ul>
                <br>
                <input type="submit" value="Simpan Data" class="btn btn-success">
                <a href="{{route('customer.index')}}" class="btn btn-primary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection