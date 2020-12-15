<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stationary;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        return view('guest.welcome');
    }



//Ambil data berdasarkan type nya
    public function book(){

        $stationarys = Stationary::where('Stationarys.Name','like','Book%')
        ->join('products','products.stationary_id', '=','Stationarys.id')
        ->paginate(9);

        return view('guest.book',['stationarys' => $stationarys]);


    }

    public function pencil()
    {
        $stationarys = Stationary::where('Stationarys.Name','like', 'Pencil%')
        ->join('products','products.stationary_id','=','Stationarys.id')
        ->paginate(9);
        return view('guest.pencil',['stationarys' => $stationarys]);
    }

    public function ruler()
    {
        $stationarys = Stationary::where('Stationarys.Name','like','Ruler%')
        ->join('products','products.stationary_id','=','Stationarys.id')
        ->paginate(9);
        return view('guest.ruler',['stationarys' => $stationarys]);
    }

    public function dictionary()
    {
        $stationarys= Stationary::where('Stationarys.Name','like','Dictionary%')
        ->join('products','products.stationary_id','=','Stationarys.id')
        ->paginate(9);
        return view('guest.dictionary',['stationarys' => $stationarys]);
    }
}
