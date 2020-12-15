<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stationary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class StationaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stationarys = Stationary::paginate(10);
        return view('stationary.createType',['stationarys' => $stationarys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('stationary.createType');
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
            'Stationary' => 'required',

        ]);

                $Image = $request->file('Image');
                $path = 'img/'.$Image->getClientOriginalName();
                Storage::disk('public')->put($path,file_get_contents($Image->getRealPath()));

                Stationary::create([
                    'Image' =>$Image->getClientOriginalName(),
                    'Name' => $request->get('Stationary'),
                ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $stationarys = Stationary::paginate(10);
        return view('stationary.edit',['stationarys' => $stationarys]);
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
        $validateData = $request->validate([
            'Name' => 'required|min:5',
        ]);
        Stationary::where('id',$id)->update($validateData);

        return redirect('/edit')->with('success','Update Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $stationarys = Stationary::where('id',$id)->delete();
            return redirect('/edit')->with('success','Delete Success');

    }

}
