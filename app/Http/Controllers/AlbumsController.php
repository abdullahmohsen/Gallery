<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use Illuminate\Support\Facades\Validator;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(AlbumRequest $request)
    {
        $image = $request->file('cover_image');
        $imageNameWithExt = $image->getClientOriginalName();
        $imageNameWithoutExt = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        $newImageName = $imageNameWithoutExt . '_' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/album_covers');
        $image->move($destinationPath, $newImageName);
        $imageName = $newImageName;

        $album = new Album();
        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $imageName;
        $album->save();
        return redirect(route('home'))->with('success', 'Album Created');
    }

    public function show($id)
    {
        $album = Album::with('Photos')->findOrFail($id);
        return view('albums.show')->with('album', $album);
    }

    public function destroy($id)
    {
        //$album = Album::findOrFail($id);
        $album = Album::with('Photos')->findOrFail($id);

        if(count($album->photos) > 0) {
            // unlink( public_path("assets/photos/$album->id/$album->photos"));
            return back()->with('error', 'Delete the photos first');
        };
        unlink( public_path("assets/album_covers/$album->cover_image") );

        $album->delete();
        return redirect(route('home'))->with('success', 'Album Deleted');
    }
}
