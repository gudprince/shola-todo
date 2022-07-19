<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoGroup;
use App\Models\Todo;

class TodoGroupController extends Controller
{
    //
    public function index()
    {
        $data['todo_groups'] = TodoGroup::OrderBy('id',"DESC")->get();
        return view('group.index',$data);
    }

    public function create()
    {   
        return view('group.create');
    }

    public function save(Request $request)
    {
        try {
            $todo_group = TodoGroup::create($request->all());
            Session()->flash('message','Group Added Successfully');
            return redirect('todo-group'); 
            

        } catch (\Exception $e) {
            Session()->flash('error',$e->getMessage());
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {
        try {
            $group = TodoGroup::find($request->id);

            if(!$group){
                Session()->flash('error','Group Not Found');
                return redirect()->back(); 
            }

            $group->update($request->all());
            Session()->flash('message','Group Updated Successfully');
            return redirect('todo-group'); 
            

        } catch (\Exception $e) {
            Session()->flash('error',$e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['todo_group'] = TodoGroup::find($id);

        return view('group.edit',$data);
    }

    public function delete($id)
    {
        $group = TodoGroup::find($id);
        if(!$group){
            Session()->flash('error','Group Not Found');
            return redirect()->back(); 
        }
        $group->delete();
        Session()->flash('message','Group Deleted Successfully');
        return redirect()->back(); 
    }

    public function todo($id)
    {
        $data['todos'] = Todo::where('todo_group_id',$id)->OrderBy('id',"DESC")->get();     return view('todo.index',$data);
        return view('group.edit',$data);
    }
}
