@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('galeris.create') }}" class="btn btn-md btn-success mb-3">TAMBAH GALERI</a>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body text-dark">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                              <tr align="center">
                                <th scope="col">GAMBAR</th>
                                <th scope="col">JUDUL</th>
                                <th scope="col">CONTENT</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($galeris as $galeri)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/galeris/').$galeri->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">{{ $galeri->title }}</td>
                                    <td class="text-justify">{!! $galeri->content !!}</td>
                                    <td class="text-center">
                                            <ul class="nav">
                                            <a href="{{route('galeris.show', $galeri->id)}}" class="btn btn-primary m-1">SHOW</a>
                                            <a href="{{route('galeris.edit', $galeri->id) }}" class="btn btn-warning m-1">UBAH</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('galeris.destroy', $galeri->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Galeri belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $galeris->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
@endsection