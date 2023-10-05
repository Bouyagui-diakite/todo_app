<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('tasks.index', ['tasks' => Task::orderBy('updated_at', 'desc')->simplePaginate(5)
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $validatedData['user_id'] = auth()->id();

        Task::create($validatedData);
         toast('Votre tache a bien ete cree','success');
       return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('tasks.show', [
            'task' => Task::findOrFail($id)
        
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tasks.edit', [
            'task' => Task::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //only user owner can update their tasks

        if($task->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
         }

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $task->whereId($task->id)->update($validatedData);
        toast('Votre tache a ete mis a jour ','info');
        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Task $task)
    {
        
        //only user owner can delete their tasks
        if($task->user_id != auth()->id()){
            abort(403, 'Sorry you can\'t delete a task you don\'t own!!');
         }
        $task->delete();

        toast('Votre tache a bien ete supprime','error');
        return redirect('/home');
    }
}
