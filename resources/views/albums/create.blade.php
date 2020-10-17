@extends('layouts.app')

@section('content')
    <h3>Create Albums</h3>
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            {{--  <label>Album Name</label>  --}}
            <input type="text" class="form-control" name="name" placeholder="Album Name">
        </div>
        <div class="form-group">
            {{--  <label>Album Name</label>  --}}
            {{--  <input type="text" class="form-control" name="description" placeholder="Album Description">  --}}
            <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Album Description"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="cover_image">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
