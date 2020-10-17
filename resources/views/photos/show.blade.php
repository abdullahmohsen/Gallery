@extends('layouts.app')

@section('content')
    <h1>{{ $photo->title }}</h1>
    <p>{{ $photo->description }}</p>
    <a class="" href="{{ route('show', $photo->album_id) }}">Go Back</a>
    <hr>
    <img class="img-fluid" src='{{ asset("assets/photos/$photo->album_id/$photo->photo") }}'
        alt="{{ $photo->title }}">
    <br><br>
    <a href="{{ route('photos.destroy', $photo->id) }}" class="btn btn-danger">Delete</a>
    <hr>
    <small>Size: {{ $photo->size }} Byte</small>
@endsection
