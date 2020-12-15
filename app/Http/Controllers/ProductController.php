<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stationary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stationarys = Stationary::where('Name','like','%'.'%')
        ->get();

        return view('insert',['stationarys' => $stationarys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'Image' => 'required|image|mimes:png,jpg,jpeg',
                'Name' => 'required|min:5',
                'Description' => 'required|min:10',
                'Stationary' => 'required',
                'Stock'=> 'required|min:1',
                'Price'=> 'required|integer|min:5000',
            ]);

                $Image = $request->file('Image');
                $path = 'img/'.$Image->getClientOriginalName();
                Storage::disk('public')->put($path,file_get_contents($Image->getRealPath()));

                Product::create([
                    'Image' =>$Image->getClientOriginalName(),
                    'Name' => Str::slug($request->get('Name'),'-'),
                    'Description' => $request->get('Description'),
                    'stationary_id' =>$request->get('Stationary'),
                    'Stock' => $request->get('Stock'),
                    'Price'=> $request->get('Price'),
                ]);


            return redirect('/home')->with('success','Input Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $products = Product::where('Name',$name)->first();
        $stationarys = Stationary::where('id',$products->stationary_id)->first();
        return view('detail',['products' => $products],['stationarys' => $stationarys]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {

        $products = Product::where('Name',$name)->first();

        return view('update',['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $validateData = $request->validate([
            'Name' => 'required|min:5',
            'Description' => 'required|min:10',
            'Stock'=> 'required|integer|min:1',
            'Price'=> 'required|integer|min:5000',
        ]);
        Product::where('Name',$name)->update($validateData);
        return redirect('/home')->with('success','Update Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        $products = Product::where('Name',$name)->delete();
        return redirect('/detail')->with('success','Delete Success');
    }
}
