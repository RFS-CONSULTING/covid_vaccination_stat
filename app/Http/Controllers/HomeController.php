<?php

namespace App\Http\Controllers;

use App\Models\LimitProvince;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $provinces = LimitProvince::all();
        $population = 0;
        foreach ($provinces as $province) {
            $population = $population + $province->pop_totale;
        }
        return view('home.index',['provinces'=>$provinces, 'population'=>$population]);
    }
}
