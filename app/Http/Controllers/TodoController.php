<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\TodoGroup;

class TodoController extends Controller
{
    //
    public function index()
    {
        $data['todos'] = Todo::OrderBy('id',"DESC")->get();
        return view('todo.index',$data);
    }

    public function create()
    {   
        $data['todo_groups'] = TodoGroup::All();
        return view('todo.create',$data);
    }

    public function save(Request $request)
    {
        try {
            $params = $request->all();
            foreach($params['title'] as $title){
                $data = [];
                $data['title'] = $title;
                $data['user_id'] = Auth()->user()->id;
                $data['todo_group_id'] = $request->group_id;
                Todo::create($data);

            }
            
            Session()->flash('message','Todos Added Successfully');
            return redirect('todo'); 
            

        } catch (\Exception $e) {
            Session()->flash('error',$e->getMessage());
            return redirect()->back();
        }
    }


    public function update(Request $request)
    {
        try {
            $todo = Todo::find($request->id);

            if(!$todo){
                Session()->flash('error','Todo Not Found');
                return redirect()->back(); 
            }

            $todo->update($request->all());
            Session()->flash('message','Todos Updated Successfully');
            return redirect('todo'); 
            

        } catch (\Exception $e) {
            Session()->flash('error',$e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $data['todo'] = Todo::find($id);
        $data['todo_groups'] = TodoGroup::All();

        return view('todo.edit',$data);
    }

    public function toggle_complete(Request $request)
    {   
        $data = [];
        $data['is_complete'] = $request->is_complete ? 1 : 0;
        $todo = Todo::find($request->id);
        $todo->update($data);
        
        return response()->json(['status' => 'success', 'message' => 'Status Changed Successfully']);
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        if(!$todo){
            Session()->flash('error','Todo Not Found');
            return redirect()->back(); 
        }
        $todo->delete();
        Session()->flash('message','Todo Deleted Successfully');
        return redirect()->back(); 
    }
}
