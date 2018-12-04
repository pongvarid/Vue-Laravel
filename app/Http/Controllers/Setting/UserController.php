<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Events\NotificationEvent;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with(['branch'])->get();
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
        $image = $request->img_user;  
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $request->username.'.'.'png';
        \File::put(public_path(). '/images/Users/' . $imageName, base64_decode($image));
        $request->img_user =  $imageName;

        
        $request_data = $request->all();
        $request_data['img_user'] = '/images/Users/'.$imageName;
        $request_data['password'] = Hash::make($request->get('password'));

        $data = new User();
        $data->fill($request_data);
        $save = $data->save();

        // --------------------------------------------------
        // $user = '1';
        // $message = 'create user success';
        event(new NotificationEvent);

        if($save){
           return 'create success'; 
        }else{
           return 'create error'; 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        $image = $request->img_user;  
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $request->username.'.'.'png';
        \File::put(public_path(). '/images/Users/' . $imageName, base64_decode($image));
        $request->img_user =  $imageName;


        $request_data = $request->all();
        $request_data['img_user'] = '/images/Users/'.$imageName;
        $request_data['password'] = Hash::make($request->get('password'));
        $data =  User::find($id);
        $data->fill($request_data);
        $save = $data->save();
        if($save){
           return 'create success'; 
        }else{
           return 'create error'; 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  User::find($id);
        $data->status_id = 3 ;
        $save = $data->save();
        if($save) return 'delete success';
    }
}
