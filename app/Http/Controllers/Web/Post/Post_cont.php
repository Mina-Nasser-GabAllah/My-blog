<?php

namespace App\Http\Controllers\Web\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Policies;
use App\Models\Post;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post_cont extends Controller
{
    public function index(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->isMethod('post')) {
            $post->Comments()->create([
                'content' => $request->input('content'),
                'user_id' => Auth::user()->id
            ]);
            return redirect()->back();
        } else {
            $arr['post'] = $post;
            $arr['comments'] = $post->comments;
            return view('Web.Post.Index_view', $arr);
        }
    }

    public function editComment(Request $request, $id)
    {
        $comment = Comment::find($id);
        $post = Post::find($comment->post_id);
        $user = Auth::user();
        $section = Section::find($comment->user_id);


        if ($comment->user_id == $user->id or $user->role == 'admin' or $user->id == $section->admin) {
            if ($request->isMethod('post')) {
                $comment->update($request->all());
                return redirect(route('Web.Post.Index', ['id' => $post]));
            } else {
                $arr['comment'] = $comment;
                $arr['post'] = $post;
                return view('Web.Post.Edit_Comment_view', $arr);
            }

        } else {
            dd('Error no permission');
        }
    }

    public  function deleteComment(Request $request,$id){
        $comment = Comment::find($id);
        $user = Auth::user();
        $section = Section::find($comment->user_id);

        if ($comment->user_id == $user->id or $user->role == 'admin' or $user->id == $section->admin) {
             $comment->delete();
//            echo("<script>console.log('PHP: " . $comment->delete() . "');</script>");
            return redirect()->back();
        }else{
            dd('Error ');
        }
    }
}
