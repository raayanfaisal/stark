<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\materialsModel;
use Illuminate\Support\Facades\DB; 

use App\Models\inventoriesModel;

class inventoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'itmCode'=>'required',
            'itmDetails'=>'required',
            'itmValue'=>'required'
        ]);

        $query = DB::table('materials_models')->insert([
            'itmCode'=>$request->input('itmCode'),
            'itmDescription'=>$request->input('itmDetails'),
            'itmValue'=>$request->input('itmValue')
        ]);

        if($query) {
            return back()->with('success', 'Data has been updated to database');
        }else {
            return back()->with('fail','Sorry something went wrong, please try again');
        }


        
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

    public function search()
    {

        $itms = DB::select('select * from materials_models');
        return view('invoice')->with('itms',$itms);
    }

    public function entries(Request $request)
    {
        $q = $request->search_itm;
        if($q != " "){
            $enty = \DB::table('materials_models')->where("itmCode","LIKE", "%" . $q . "%")
            ->orWhere("itmDescription","LIKE", "%" . $q . "%")
            ->get();
        } 
        return view('search')->with('enty', $enty);
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
