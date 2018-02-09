<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banks;
class BankController extends Controller
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

    public function disAll() {
        $banks = Banks::all();
        return $banks;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add = new Banks;
        
        $add->bankname = $request->input('bankname');
        $add->banktype = $request->input('banktype');
        $add->bankmore = $request->input('bankmore');
  
        
        $add->save();
        return 'تم الاضافة' . $add->id;
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
        return Banks::find($id);
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
        $add = Banks::find($id);
        
        $add->bankname = $request->input('bankname');
        $add->banktype = $request->input('banktype');
        $add->bankmore = $request->input('bankmore');
  
        
        $add->save();
        return 'تم الاضافة' . $add->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Banks::find($id)->delete();
        return 'done Deleted';
    }
}
