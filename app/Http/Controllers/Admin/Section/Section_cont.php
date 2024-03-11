<?php

namespace App\Http\Controllers\Admin\Section;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

class Section_cont extends Controller
{
    public function add(Request $request){
        if($request->isMethod('post')){
            $section=Section::create($request->all());
            if(!is_null($request->input('admin'))){
                $user=User::find($request->input('admin'));
                $user->role='editor';
                $user->update();
            }
            return redirect()->back();
        }else{
            $users=User::select('id','name')->where('role','user')->get();
            $arr['users']=$users;
            return view('Admin.Section.Add_view',$arr);
        }

    }
    public function update(Request $request,$id){
        $section=Section::find($id);
        if($request->isMethod('post')){
            $section->name=$request->input('name');
            if(is_null($request->input('admin')) or $section->admin!=$request->input('admin') ){
                if(!is_null($section->admin)){
                    $old_admin=User::find($section->admin);
                    $old_admin->role='user';
                    $old_admin->update();
                }
                $section->admin=$request->input('admin');
                if(!is_null($request->input('admin'))){
                    $admin=User::find($request->input('admin'));
                    $admin->role='editor';
                    $admin->update();
                }
            }
            $section->update();
            return redirect()->back();
        }else{
            $users=User::select('id','name')->where('role','user')->get();
            $arr['users']=$users;
            $arr['section']=$section;
            return view('Admin.section.Update_view',$arr);
        }
    }
    public function index(Request $request){
        $sections=Section::select('id','name','admin')->get();
        $arr['sections']=$sections;

        return view('Admin.Section.Index_view',$arr);
    }
    public function delete(Request $request,$id){
        $section=Section::find($id);
        if($request->isMethod('post')){
            $admin=User::find($section->admin);
           if(is_null($section->admin)){
               $section->delete();
           }else{
               $admin->role='user';
               $admin->update();
               $section->delete();
           }

        }else{
            $arr['section']=$section;
            return view('Admin.Section.Delete_view',$arr);
        }
        return redirect(route('Section.Index'));
    }
}
