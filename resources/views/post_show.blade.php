@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-100">
        <div class="card-header text-dark text-center">
            <h4> {{$posts->title}} </h4>
        </div>
        <div class="card-body text-dark">
            <div class="row">
                <h4><img src="{{ Storage::url('public/posts/').$posts->image }}" class="rounded" style="width: 500px"></h4>
            </div>
            <div class="row">
                <h4> {!!$posts->content!!} </h4>
            </div>
            <br>
            <a href="{{route('posts.index')}}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush