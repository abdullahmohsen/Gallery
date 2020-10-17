@extends('layouts.app')

@section('content')
    <h3>Upload Photo</h3>
    <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="album_id" value="{{ $album_id }}">
        <div class="form-group">
            <input type="text" class="form-control" name="title" placeholder="Photo Title">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Photo Description"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
