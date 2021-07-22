@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <a href="{{ route('customer.create') }}" class="btn btn-md btn-success mb-3">TAMBAH CUSTOMER</a>  
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">NAMA</th>
                                <th scope="col">NIK</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">TELEPHONE</th>
                                <th scope="col">AKSI</th>
                            </tr>
                            </thead>
                        <tbody>
                        @forelse ($customer as $c)
                        <tr>
                            <td class="text-center">{{$c->nama}}</td>
                            <td class="text-center">{{$c->nik}}</td>
                            <td class="text-center">{{$c->alamat}}</td>
                            <td class="text-center">{{$c->telp}}</td>
                            <td>
                                <ul class="nav">
                                <a href="{{route('customer.show', $c->id)}}" class="btn btn-primary m-1">Detail</a>
                                <a href="{{route('customer.edit', $c->id)}}" class="btn btn-warning m-1">Ubah</a>
                                {{-- @role('admin') --}}
                                <form action="{{route('customer.destroy', $c->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger m-1">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">Data Customer belum Tersedia.</div>
                        @endforelse
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection