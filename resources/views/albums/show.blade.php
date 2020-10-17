@extends('layouts.app')

@section('content')
    <h1>{{ $album->name }}</h1>
    <a class="btn btn-secondary" href="{{ route('home') }}">Go Back</a>
    <a class="btn btn-primary" href="{{ route('photos.create', $album->id) }}">Upload Photo To Album</a>
    <a class="btn btn-danger float-right" href="{{ route('destroy', $album->id) }}">Delete Album</a>
    <hr>
    @if(count($album->photos) > 0)
        <div class="container">
            <div class="row text-center">
                @foreach($album->photos as $photo)
                <div class="col-md-4">
                    <a href="{{ route('photos.show', $photo->id) }}">
                        <img class="img-thumbnail img-fluid" src='{{ asset("assets/photos/$photo->album_id/$photo->photo") }}'
                        alt="{{$photo->title}}">
                    </a>
                    <h4>{{$photo->title}}</h4>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No Photos to display</p>
    @endif
@endsection
