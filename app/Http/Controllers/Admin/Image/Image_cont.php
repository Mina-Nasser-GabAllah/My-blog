<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;

class Image_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $photo=$request->file('photo');
            $path= $photo->storeAs('post',$photo->getClientOriginalName(),'images');
            Photo::create([
                'path'=>$path
            ]);
            return redirect()->back();
        }else{
            return view('Admin.Image.Add_view');
        }
    }
    public function update(Request $request,$id){
        $post=Post::find($id);
        if($request->isMethod('post')){
//            delete($post->);
            $photo=$request->file('photo');
            $path= $photo->storeAs('post',$photo->getClientOriginalName(),'images');
            Photo::create([
                'path'=>$path
            ]);
            return redirect()->back();
        }else{
            return view('Admin.Image.Update_view');
        }
    }
    public function index(){
        $photos=Photo::all();
        $arr['photos']=$photos;
        return view('Admin.Image.index_view',$arr);
    }
    public function delete(Request $request,$id){
        $photo=Photo::find($id);
        if($request->isMethod('post')){
            try {
                unlink(public_path('/images/'.$photo->path));
                $photo->delete();
            }catch (\Exception $exception){
            }

            return redirect(route('Image.Index'));

        }else{
            $arr['photo']=$photo;
            return view('Admin.Image.Delete_view',$arr);
        }
        return redirect(route('Image.Index'));
    }

}
