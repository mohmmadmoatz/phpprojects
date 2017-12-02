<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\clnper;

class clnperController extends Controller
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

    public function dis_per($id) {
        // Just one Clinic /// By mOHMMADmOAtz
        $cln = clnper::where("cln_id","=",$id)->get();
        return $cln;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new clnper;
        $add->cln_id = $request->input('cln_id');
        $add->per_from = $request->input('per_from');
        $add->per_to = $request->input('per_to');
        $add->kshf_per = $request->input('kshf_per');
        $add->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return clnper::find($id);

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
        $add = clnper::find($id);
        $add->cln_id = $request->input('cln_id');
        $add->per_from = $request->input('per_from');
        $add->per_to = $request->input('per_to');
        $add->kshf_per = $request->input('kshf_per');
        $add->save();
        return "done  saved" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $per =  clnper::find($id)->delete();
        return "done deleted";
    }
}
