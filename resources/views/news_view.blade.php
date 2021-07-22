@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card w-150">
        <div class="card-body text-dark">
            <div class="row">
                <h4><img src="{{ Storage::url('public/news/').$news->image }}" style="width: 100%"></h4>
            </div>
            <div class="row">
                <h4> {!!$news->content!!} </h4>
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