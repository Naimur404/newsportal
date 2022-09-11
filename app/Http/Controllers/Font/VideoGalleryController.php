<?php

namespace App\Http\Controllers\Font;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function video_gallery(){
        $video = Video::paginate(8);
        return view('font.gallery_video',compact('video'));
    }
}
