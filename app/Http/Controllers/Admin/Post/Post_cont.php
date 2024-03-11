<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Post_cont extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', 'like', $this->getFlag())->get();
        $arr['posts'] = $posts;
        return view('Admin.Post.Index_view', $arr);
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $section = Section::find($request->input('section_id'));
            if ($user->id == $section->admin or $user->role == 'admin') {
                $post = $user->Posts()->create($request->all());
                $post->Photos()->attach($request->input('photos'));
                return redirect()->back();
            } else {
                dd("Error No permission");
            }
        } else {

            $sections = Section::where('admin', 'like', $this->getFlag())->get();
            $arr['sections'] = $sections;
            $photos = Photo::all();
            $arr['photos'] = $photos;
            return view('Admin.Post.Add_view', $arr);
        }
    }

    public function delete(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
//        $section=$post->section;
//        if($user->can('control_post',$section)){
        if ($post->user_id == $user->id or $user->role=='admin') {
            if ($request->isMethod('post')) {
                $post->delete();
            } else {
                $arr['post'] = $post;
                return view('Admin.Post.Delete_view', $arr);
            }
            return redirect(route('Post.Index'));
        }else{
            dd('Error No permission');
        }
    }



    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        if ($post->user->id==$post->section->admin or $post->User->role=='admin') {
            if ($request->isMethod('post')) {
                $post->update($request->all());
                $post->Photos()->detach();
                $post->Photos()->attach($request->input('photos'));
                return redirect()->back();
            } else {
                $arr['post'] = $post;
                $section = Section::where('admin', 'like', $this->getFlag())->get();
                $arr['sections'] = $section;
                $photos = Photo::all();
                $arr['photos'] = $photos;
                return view('Admin.Post.Update_view', $arr);
            }
        }else{
            dd('Error No permission');
        }
    }


    public function getFlag(){
        $user=Auth::user();
        $flag='%';
        if($user->role=='editor'){
            $flag=$user->section->admin;
        }
        return $flag;
    }
}
