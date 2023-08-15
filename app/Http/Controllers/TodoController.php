<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();
        return view ('todo', compact('todos'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = validator::make ($request->all(),
        [
            'title' =>'required',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('todos.index')->withErrors($validator);
        }

        Todo::create([
            'title'=>$request->get('title')
        ]);

            return redirect()->route('todos.index')->with('success','Inserted successfully');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $todo = Todo::where ('id', $id)->first();
        return view ('edit-todo', compact('todo'));

    }


    public function update(Request $request, $id)
    {
        $validator = validator::make ($request->all(),
        [
            'title' =>'required',

        ]);

        if ($validator->fails())
        {
            return redirect()->route('todos.edit', ['todo' => $id])->withErrors($validator);
        }

        $todo = Todo::where('id', $id)->first();
        $todo-> is_completed = $request->get('is_completed');
        $todo-> title = $request->get('title');
        $todo-> save();



            return redirect()->route('todos.index')->with('success','Updated Todo');
    }


    public function destroy($id)
    {
        $todo = Todo::where('id', $id)->delete();

        return redirect()->route('todos.index')->with('success','Deleted Todo');
    }
}
