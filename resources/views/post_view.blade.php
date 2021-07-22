@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-100">
        <div class="card-header text-dark text-center">
            <h4> {{$posts->title}} </h4>
        </div>
        <div class="card-body text-dark">
            <div class="row">
                <h4> {!!$posts->content!!} </h4>
            </div>
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