<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskCategory;

class TaskController extends Controller
{
    public function showData()
    {
        $data = Task::all();

        return view('task', compact('data'));
    }

    public function delete($id)
    {
    
    $memo = \App\Models\Task::find($id);    
    $categoryid = $memo->task_category_id;
    $memo->delete();
    return redirect("/taskcategory/$categoryid");
    }

    public function create(Request $request)
{
    $input = $request->validate([
        'textbox' => 'required|string|max:255',
        'category_id' => 'required|integer',
    ]);

    \App\Models\Task::create([
        'description' => $request->input('textbox'),
        'task_category_id' => $request->input('category_id'),
        'category_id' => $request->input('category_id'),
    ]);

    return redirect("/taskcategory/{$request->input('category_id')}")->with('success', 'Formulier succesvol verwerkt');
}

   public function update($id){
    $input = request()->validate([
        'upbox' => 'required|string|max:255',
    ]);

    $item = \App\Models\Task::findOrFail($id);

    $item->update([
        'description' => request('upbox'),]);

    return redirect("/taskcategory/{$item->task_category_id}");

   }
}