<?php

namespace App\Http\Controllers\Web\Main;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class Main_cont extends Controller
{
    public function index()
    {
        $section=Section::all();
        $arr['sections']=$section;

        return view('Web.Main.Main_view',$arr);
    }
}
