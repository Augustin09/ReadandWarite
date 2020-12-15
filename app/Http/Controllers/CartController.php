<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {

    $this->validate($request, [
        'id' => 'required|exists:products,id',
        'qty' => 'required|integer|min:1',
    ]);

    $carts = json_decode($request->cookie('carts'), true);

    if($carts && array_key_exists($request->id,$carts)){
        $carts[$request->id]['qty'] +=$request->qty;
    }else{
        $products = Product::find($request->id);
        $carts[$request->id] = [
            'id' => $products->id,
            'name' => $products->Name,
            'price' => $products->Price,
            'qty' => $request->qty,

        ];
    }

    $cookie = cookie('carts', json_encode($carts), 2880);
    return redirect('/cart')->cookie($cookie)->with('success','Success Add to Cart');

}


    public function showCart(){
        $carts = json_decode(request()->cookie('carts'), true);
        $subtotal = collect($carts)->sum(function($st) {
            return $st['qty'] * $st['price'];
        });
        return view('/cart',compact('carts','subtotal'));
    }

    public function updateCart(Request $request){

        $carts = json_decode(request()->cookie('carts'), true);
        foreach ($request->id as $key => $row) {

            if ($request->qty[$key] == 0) {

                unset($carts[$row]);
            } else {

                $carts[$row]['qty'] = $request->qty[$key];
            }
        }

        $cookie = cookie('carts', json_encode($carts), 60);


        return redirect('/cart')->cookie($cookie);
    }

    public function edit($name){

        $products = Product::where('products.Name',$name)
        ->join('Stationarys','Stationarys.id', '=','products.id')
        ->first();
        $carts = json_decode(request()->cookie('carts'), true);

        foreach($carts as $key => $cart ){
            if($cart['name'] == $name){
                $new_cart = $key;

            }

        }

        $data = ['products'=> $products,'carts' => $carts[$new_cart]];

        return view('editcart',compact('data'));
    }

    public function destroy(Request $request,$name){

        $carts = json_decode(request()->cookie('carts'), true);

        foreach($carts as $key => $cart ){
            if($cart['name'] == $name){
                $new_cart = $key;

            }

        }


        unset($carts[$new_cart]);
        $cookie = cookie('carts', json_encode($carts), 60);


        return redirect('/cart')->cookie($cookie);



    }
}
