<?php

namespace App\Http\Controllers;

use App\Models\LimitProvince;
use Illuminate\Http\Request;

class LimitprovincesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rdc_layer_data = LimitProvince::allAsGeojson();
        $rdc_json_data = json_decode($rdc_layer_data[0]->row_to_json);
      //  dd($rdc_json_data->features);
        foreach ($rdc_json_data->features as $feature) {
            $feature->properties->date_debut =  \Carbon\Carbon::parse($feature->properties->date_debut)->diffInDays();
        }
        return response()->json(['province_layer_data' => $rdc_layer_data[0]->row_to_json,
                                 'province_attrib'=>$rdc_json_data->features]);
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
        //
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
