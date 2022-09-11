<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoGalleryController extends Controller
{
    public function photo_gallery(){
        $photo = Photo::paginate(8);
        return view('font.gallery_photo',compact('photo'));
    }
}
