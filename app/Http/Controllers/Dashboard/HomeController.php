<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $albums=Album::all();
        return view('dashboard.dashboard',compact('albums'));
    }
    public function Get_album($id)
    {
        $images=Image::all()->where('album_id',$id);
        return view('dashboard.albums',compact('images'));
    }
}
