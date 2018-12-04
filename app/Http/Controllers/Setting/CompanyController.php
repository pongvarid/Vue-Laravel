<?php
// -----------------------NET---------------------------------

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Model\Setting\Company;
use App\Http\Controllers\Controller;
//use App\User;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Company::all();
        $data = Company::first();
        return  $data;
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
        $image = $request->img_company;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = 'logo'.'.'.'png';
        \File::put(public_path(). '\\images/' . $imageName, base64_decode($image));
       

        $requestData = $request->all();
        $requestData['img_company'] = './images/'.$imageName;
        
        $data = new Company();
        $data->fill($requestData);
        $save = $data->save();
        if($save) return 'create success'; 
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
        $imageName = 'logo.png';
        if($request->img_company){
        $image = $request->img_company;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image); 
        \File::put(public_path(). '\\images/' . $imageName, base64_decode($image));
        } 
        $requestData = $request->all();
        $requestData['img_company'] = './images/'.$imageName;
        $data = Company::find($id);
        $data->fill($requestData);
        $save = $data->save();
        if($save) return 'update success';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Company::find($id);
        $save = $data->destroy($id);
        if($save) return 'delete success';
    }

}
