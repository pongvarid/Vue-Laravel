<?php
// -----------------------NET---------------------------------

namespace App\Http\Controllers\Lead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lead\Task;
use App\Events\TasksEvent;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Task::with(['user','lead','account'])->get();
        return $data;
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
        $data = new Task();
        $data->fill($request->all());
        $save = $data->save();

        //event(new TasksEvent);
        if($save) return 'create lead task';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = Task::find($id);
        $data->fill($request->all());
        $save = $data->save();
        if($save) return 'update lead task';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Task::find($id);
        $data->status_id = 3 ;
        $save = $data->save();
        if($save) return 'delete lead task';
    }
}
