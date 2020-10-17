@extends('layouts.app')

@section('content')
    <h2>Albums</h2>
    <hr>
    @if(count($albums) > 0)
        <div class="container">
            <div class="row text-center">
                @foreach($albums as $album)
                    <div class="col-md-4">
                        <a href="{{ route('show', $album->id) }}">
                            <img class="img-thumbnail img-fluid" src="assets/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
                        </a>
                        <h4>{{$album->name}}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No Albums to display</p>
    @endif


@endsection


