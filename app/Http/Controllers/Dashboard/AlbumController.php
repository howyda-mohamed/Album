<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Album;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index(){
        $albums=Album::selection()->paginate(PAGINATION_COUNT);
        return view('dashboard.album.index',compact('albums'));
    }
    public function create()
    {
        return view('dashboard.album.create');
    }
    public function store(AlbumRequest $request)
    {
        try{
            if($request->has('avatar'))
            {
                $file=$request->file('avatar');
                $ext=$file->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path="assets/images/".$file_name;
                $file->move('assets/images',$file_name);
            }
            $albums=Album::create([
                'name'=>$request->name,
                'avatar'=>$path,
                'user_id'=>Auth::user()->id,

            ]);
            if($albums)
            {
                return redirect()->route('Get_Album')->with(['status'=>'Data Inserted Sucessfully']);
            }
            else
            {
                return redirect()->route('Get_Album')->with(['error'=>'Please Try Again']);
            }

        }catch(Exception $ex)
        {
            return redirect()->route('Get_Album')->with(['error'=>'something went wrong']);
        }
    }
    public function edit($id)
    {
        try{
            $albums=Album::select()->find($id);
            if(!$albums)
            {
                return redirect()->route('Get_Album')->with(['error'=>'Data Not Found']);
            }
            return view('dashboard.album.update',compact('albums'));
        }catch(Exception $ex)
        {
            return redirect()->route('Get_Album')->with(['error'=>'something went wrong']);
        }
    }
    public function update($id, AlbumRequest $request)
    {
        try{
            $albums=Album::select()->find($id);
            if(!$albums)
            {
                return redirect()->route('Get_Album')->with(['error'=>'Data Not Found']);
            }
                $path=$albums->avatar;
                if($request->has('avatar'))
                {
                    if(File::exists($path))
                    {
                        File::delete($path);
                    }
                    $file=$request->file('avatar');
                    $ext=$file->getClientOriginalExtension();
                    $file_name=time().'.'.$ext;
                    $path="assets/images/".$file_name;
                    $file->move('assets/images',$file_name);
                }
            $updates=$albums->update([
                'name'=>$request->name,
                'avatar'=>$path
            ]);
            if($updates)
            {
                return redirect()->route('Get_Album')->with(['status'=>'Data Updateds Sucessfully']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('Get_Album')->with(['error'=>'something went wrong']);
        }
    }
    public function delete($id)
    {
            $albums=Album::find($id);
            if(!$albums)
            {
                return redirect()->route('Get_Album')->with(['error'=>'Some thing Went Wrong']);
            }
            $path=$albums->avatar;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $albums->image()->delete();
            $albums->delete();
            return redirect()->route('Get_Album')->with(['status'=>'Data Deleted Sucessfully']);
    }
    public function change($id)
    {
        try{
            $album=Album::all();
            $albums=Album::select()->find($id);
            if(!$albums)
            {
                return redirect()->route('Get_Album')->with(['error'=>'Data Not Found']);
            }
            return view('dashboard.album.move',compact('albums','album'));
        }catch(Exception $ex)
        {
            return redirect()->route('Get_Album')->with(['error'=>'something went wrong']);
        }
    }
    public function move($id, AlbumRequest $request)
    {
            $albums=Album::select()->find($id);
            if(!$albums)
            {
                return redirect()->route('Get_Album')->with(['error'=>'Data Not Found']);
            }
            $albums->image()->update([
                'album_id'=>$request->name,
            ]);
            $albums->delete();
            return redirect()->route('Get_Album')->with(['status'=>'Data Moved Sucessfully']);

    }
}
