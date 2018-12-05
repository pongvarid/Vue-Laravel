<?php
// -----------------------NET---------------------------------

namespace App\Http\Controllers\Lead;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lead\Event;
use App\Events\EventsEvent;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::with(['user','lead','account','mbs_choice'])->get();
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
        $data = new Event();
        $data->fill($request->all());
        $save = $data->save();

        //event(new EventsEvent($data));
        if($save) return 'create Lead event';
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
        $data = Event::find($id);
        $data->fill($request->all());
        $save = $data->save();
        if($save) return 'update lead event';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Event::find($id);
        $data->status_id = 3 ;
        $save = $data->save();
        if($save) return 'delete lead event';
    }
}
