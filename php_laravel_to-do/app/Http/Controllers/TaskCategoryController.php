<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskCategory;

class TaskCategoryController extends Controller
{
    public function showData()
    {
        $data = TaskCategory::all();

        return view('taskcategories', compact('data'));
    }

    public function showTasks(TaskCategory $category)
    {        
        $tasks = $category->tasks;

        return view('showTasks', compact('tasks', 'category'));
    
    }

    public function create()
    {
        $input = request()->validate([
            'textbox' => 'required|string|max:255',
        ]);
    
        \App\Models\TaskCategory::create([
            'name'=> request("textbox")
        ]);
        return redirect('/taskcategories')->with('success', 'Formulier succesvol verwerkt');
    }

    public function delete(TaskCategory $category)
    {
        $category->delete();

    return redirect('/taskcategories');
    }

    public function update($id){
        $input = request()->validate([
            'upbox' => 'required|string|max:255',
        ]);

        $item = \App\Models\TaskCategory::find($id);

        $item->update([
            'name' => request('upbox'),]);

        return redirect('/taskcategories');
    }
}