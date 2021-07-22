@extends('layouts.app')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">NAMA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ROLE</th>
                                <th scope="col">AKSI</th>
                            </tr>
                            </thead>
                        <tbody>
                        @forelse ($users as $us)
                        <tr>
                            <td class="text-center">{{$us->name}}</td>
                            <td class="text-center">{{$us->email}}</td>
                            <td class="text-center">{{$us->role}}</td>
                            <td>
                                <ul class="nav">
                                <a href="{{route('users.show', $us->id)}}" class="btn btn-primary m-1">Detail</a>
                                {{-- @role('admin') --}}
                                <form action="{{route('users.destroy', $us->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">Data User belum Tersedia.</div>
                        @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection