<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search= $request->get('search');

        if ($search) {
            $products = Product::where('Name','like',$search.'%')->paginate(9);
        }else{
            $products = Product::paginate(9);
         }
        return view('home',['products' => $products]);
    }
}
