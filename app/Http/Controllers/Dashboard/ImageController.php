<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Album;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        $images=Image::selection()->paginate(PAGINATION_COUNT);
        return view('dashboard.images.index',compact('images'));
    }
    public function create()
    {
        $albums=Album::all();
        return view('dashboard.images.create',compact('albums'));
    }
    public function store(ImageRequest $request)
    {
        try{
            if($request->has('name'))
            {
                $file=$request->file('name');
                $ext=$file->getClientOriginalExtension();
                $file_name=time().'.'.$ext;
                $path="assets/images/".$file_name;
                $file->move('assets/images',$file_name);
            }
            $images=Image::create([
                'name'=>$path,
                'album_id'=>$request->album_id,
            ]);
            if($images)
            {
                return redirect()->route('Get_Image')->with(['status'=>'Data Inserted Sucessfully']);
            }
            else
            {
                return redirect()->route('Get_Image')->with(['error'=>'Please Try Again']);
            }

        }catch(Exception $ex)
        {
            return redirect()->route('Get_Image')->with(['error'=>'something went wrong']);
        }
    }
    public function edit($id)
    {
        try{
            $albums=Album::all();
            $images=Image::select()->find($id);
            if(!$images)
            {
                return redirect()->route('Get_Image')->with(['error'=>'Data Not Found']);
            }
            return view('dashboard.images.update',compact('images','albums'));
        }catch(Exception $ex)
        {
            return redirect()->route('Get_Image')->with(['error'=>'something went wrong']);
        }
    }
    public function update($id, ImageRequest $request)
    {
        try{
            $images=Image::select()->find($id);
            if(!$images)
            {
                return redirect()->route('Get_Image')->with(['error'=>'Data Not Found']);
            }
                $path=$images->name;
                if($request->has('name'))
                {
                    if(File::exists($path))
                    {
                        File::delete($path);
                    }
                    $file=$request->file('name');
                    $ext=$file->getClientOriginalExtension();
                    $file_name=time().'.'.$ext;
                    $path="assets/images/".$file_name;
                    $file->move('assets/images',$file_name);
                }
            $updates=$images->update([
                'name'=>$path,
                'album_id'=>$request->album_id
            ]);
            if($updates)
            {
                return redirect()->route('Get_Image')->with(['status'=>'Data Updateds Sucessfully']);
            }
        }catch(Exception $ex)
        {
            return redirect()->route('Get_Image')->with(['error'=>'something went wrong']);
        }
    }
    public function delete($id)
    {
        try{
            $images=Image::find($id);
            $path=$images->name;
            if(!$images)
            {
                return redirect()->route('Get_Image')->with(['error'=>'Some thing Went Wrong']);
            }
            if(File::exists($path))
            {
                File::delete($path);
            }
            $images->delete();
            return redirect()->route('Get_Image')->with(['status'=>'Data Deleted Sucessfully']);
        }
        catch(Exception $ex)
        {
            return redirect()->route('Get_Image')->with(['error'=>'Some thing Went Wrong']);
        }

    }
}
