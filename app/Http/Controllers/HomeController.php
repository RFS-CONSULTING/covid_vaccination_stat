<?php

namespace App\Http\Controllers;

use App\Models\LimitPays;
use App\Models\LimitProvince;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $provinces = LimitProvince::all();
        $pays = LimitPays::all();
       // dd($pays);
        // $population = 0;
        // foreach ($provinces as $province) {
        //     $population = $population + $province->pop_totale;
        // }
        return view('home.index',['pays'=>$pays[0]]);
    }
}
