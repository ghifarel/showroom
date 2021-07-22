@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
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
                              @forelse ($posts as $post)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ Storage::url('public/posts/').$post->image }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td class="text-center">{{ $post->title }}</td>
                                    <td class="text-justify">{!! $post->content !!}</td>
                                    <td class="text-center">
                                            <ul class="nav">
                                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary m-1">SHOW</a>
                                            <a href="{{route('posts.edit', $post->id) }}" class="btn btn-warning m-1">UBAH</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $posts->links() }}
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