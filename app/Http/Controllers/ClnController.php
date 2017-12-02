<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cln;
class ClnController extends Controller
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

    public function disAll() {
        $clns = Cln::all();
        return $clns;
    }

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
        $clnadd = new Cln;
        $clnadd->br_id = $request->input('br_id');

        $clnadd->cln_code = $request->input('cln_code');
        $clnadd->cln_arname = $request->input('cln_arname');
        $clnadd->cln_enname = $request->input('cln_enname');
  
        $clnadd->cln_type = $request->input('cln_type');
        $clnadd->cln_phone = $request->input('cln_phone');
        $clnadd->cln_phone2 = $request->input('cln_phone2');
      
        $clnadd->cln_phone3 = $request->input('cln_phone3');
        $clnadd->cln_phone4 = $request->input('cln_phone4');

        $clnadd->cln_fax = $request->input('cln_fax');
        $clnadd->cln_fax2 = $request->input('cln_fax2');
        
        $clnadd->cln_email = $request->input('cln_email');
        $clnadd->cln_kshfvalue = $request->input('cln_kshfvalue');
        $clnadd->cln_refvale = $request->input('cln_refvale');
        $clnadd->cln_refdays = $request->input('cln_refdays');
        
        
        $clnadd->save();
        return 'تم الاضافة' . $clnadd->id;
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
        return Cln::find($id);
        
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
        $clnadd = Cln::find($id);
        $clnadd->br_id = $request->input('br_id');

        $clnadd->cln_code = $request->input('cln_code');
        $clnadd->cln_arname = $request->input('cln_arname');
        $clnadd->cln_enname = $request->input('cln_enname');
  
        $clnadd->cln_type = $request->input('cln_type');
        $clnadd->cln_phone = $request->input('cln_phone');
        $clnadd->cln_phone2 = $request->input('cln_phone2');
      
        $clnadd->cln_phone3 = $request->input('cln_phone3');
        $clnadd->cln_phone4 = $request->input('cln_phone4');

        $clnadd->cln_fax = $request->input('cln_fax');
        $clnadd->cln_fax2 = $request->input('cln_fax2');
        
        $clnadd->cln_email = $request->input('cln_email');
        $clnadd->cln_kshfvalue = $request->input('cln_kshfvalue');
        $clnadd->cln_refvale = $request->input('cln_refvale');
        $clnadd->cln_refdays = $request->input('cln_refdays');
        
        
        $clnadd->save();
        return 'تم الاضافة' . $clnadd->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cln = Cln::find($id)->delete();
    }
}
