<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\task as ModelsTask;
use Illuminate\Http\Request;

class Task extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $tasks = ModelsTask::all();
            if(isset($tasks)){
                echo json_encode($tasks);
            } else {
                echo json_encode(['message' => 'Sem tarefas Cadastradas']);
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $taskForm = $request->input('task');
        //$status = $request->input('status');
        $doneForm = $request->input('done');

        $task = new ModelsTask();
        $task->task = $taskForm;
        //$task->status = $status;
        $task->done = $doneForm;
        $task->save();

        if(isset($task)){
            echo response()->json(['message' => 'Tarefa inserida com sucesso.']);
        }
        else {
            echo response()->json(['message' => 'Não foi inserido.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->query('id');
        $task = ModelsTask::find($id);

        if(isset($task)){
             echo json_encode($task);
        } else {
             echo response()->json(['message' => 'Tarefa não encontrada']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
