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
        $pays = LimitPays::all();
        return view('home.index',['pays'=>$pays[0]]);
    }
}
