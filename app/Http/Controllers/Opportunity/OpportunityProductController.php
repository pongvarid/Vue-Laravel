<?php
// -----------------------NET---------------------------------

namespace App\Http\Controllers\Opportunity;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Opportunity\Opportunity_Product;

class OpportunityProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Opportunity_Product::with(['opportunity','product'])->get();
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
        $data = new Opportunity_Product();
        $data->fill($request->all());
        $save = $data->save();
        if($save) return 'create opportunity_product';
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
        $data = Opportunity_Product::find($id);
        $data->fill($request->all());
        $save = $data->save();
        if($save) return 'update opportunity_product';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Opportunity_Product::find($id);
        $data->status_id = 3 ;
        $save = $data->save();
        if($save) return 'delete opportunity_product';
    }
}
