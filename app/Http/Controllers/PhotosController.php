<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\PhotosRequest;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    public function create($album_id)
    {
        return view('photos.create')->with('album_id', $album_id);
    }

    public function store(PhotosRequest $request)
    {
        $image = $request->file('photo');
        $imageNameWithExt = $image->getClientOriginalName();
        $imageNameWithoutExt = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        $newImageName = $imageNameWithoutExt . '_' . time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/assets/photos/'.$request->album_id);
        $image->move($destinationPath, $newImageName);
        $imageName = $newImageName;

        $photo = new Photo();
        $photo->album_id = $request->album_id;
        $photo->title = $request->title;
        $photo->description = $request->description;
        // $photo->size = $request->file('photo')->getSize();
        $photo->size = $_FILES['photo']['size'];
        $photo->photo = $imageName;
        $photo->save();
        return redirect(route('show', $request->album_id))->with('success', 'Photo Created');
        // return back()->with('success', 'Photo Uploaded');
    }

    public function show($id)
    {
        $photo = Photo::findOrFail($id);
        return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        if(unlink( public_path("assets/photos/$photo->album_id/$photo->photo") )) {
            $photo->delete();
        };
        return redirect(route('show', $photo->album_id))->with('success', 'Photo Deleted');
    }
}
