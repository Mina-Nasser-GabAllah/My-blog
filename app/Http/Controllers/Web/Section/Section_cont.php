<?php

namespace App\Http\Controllers\Web\Section;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class Section_cont extends Controller
{
    public function index($id){
        $section=Section::find($id);
        $posts=$section->Posts;
        $arr['posts']=$posts;
        return view('Web.Section.Index_view',$arr);
    }
}
