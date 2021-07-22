@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Edit Data User</h1>
        </div>
        <div class="card-body">
            <form action="{{route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <ul class="list-group">
                    Nama <input type="text" name="name" required value="{{$user->name}}">
                    Email <input type="text" name="email" required value="{{$user->email}}" >
                    Role 
                        <select name="role" id="">
                        <option value="petugas" {{($user->role == "petugas") ? "selected" : ""}}>Petugas</option>
                        <option value="pendaftar" {{($user->role == "pendaftar") ? "selected" : ""}}>Pendaftar</option>
                    </select>
                </ul>
                <hr>
                <a href="{{route('user.index')}}" class="btn btn-primary">Kembali</a>
                <input type="submit" value="Simpan" class="btn btn-success">
            </form>
        </div>
    </div>
</div>
@endsection