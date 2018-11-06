<?php

namespace App\Http\Controllers\MbsController\Choice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Mbs\Choice;

class ChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Choice::get();
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
        $choice = new Choice();
        $choice->fill($request->all());
        $choice->save();

        $this->getValue($request->name);
    }

    public function getId($params){
        return  Choice::where('name',$params)->first();
      }
      
    public function getValue($name){
        $tmp = $this->getId($name);
        $id = $tmp->id;
        $type = $tmp->type;
        $per = '0';
        if($id < 9){
            $per=$id;
        }else{
            $per=$id;
        }
        $per = $type.$per;
        $per_val = array('type' => $per); 
        $permission = Choice::find($id);
        $permission->fill($per_val);
        $permission->save();
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Choice::where('name',$name)->get();
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
        $choice = Choice::find($id);
        $choice->fill($request->all());
        $choice->save();

        
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $choice =  Choice::find($id);
        return $choice->destroy($id);
    }
}
