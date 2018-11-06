<?php

namespace App\Http\Controllers\Root\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Mbs\Choice; 
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Choice::where('type','09')->get();
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
        $permission = new Choice();
        $permission->fill($request->all());
        $permission->save();
        
        $this->getValue($request->name);
       
        
    }

    public function getId($params){
      return  Choice::where('type','09')->where('name',$params)->first();
    }

    public function getValue($name){
        $tmp = $this->getId($name);
        $id = $tmp->id;
        $type = $tmp->type;
        $per = '00';
        if($id < 9){
            $per=$id;
        }else{
            $per='0'.$id;
        }
        $per = $type.$per;
        $per_val = array('value' => $per); 
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
        return Choice::find($id);
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
        $permission = Choice::find($id);
        $permission->fill($request->all());
        $permission->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission =  Choice::find($id);
        return $permission->destroy($id);
    }
}
