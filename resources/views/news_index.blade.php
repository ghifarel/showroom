@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('news.create') }}" class="btn btn-md btn-success mb-3">TAMBAH NEWS</a>
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
                              @forelse ($news as $nws)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/news/').$nws->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">{{ $nws->title }}</td>
                                    <td class="text-justify">{!! $nws->content !!}</td>
                                    <td class="text-center">
                                            <ul class="nav">
                                            <a href="{{route('news.show', $nws->id)}}" class="btn btn-primary m-1">SHOW</a>
                                            <a href="{{route('news.edit', $nws->id) }}" class="btn btn-warning m-1">UBAH</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('news.destroy', $nws->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data News belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $news->links() }}
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