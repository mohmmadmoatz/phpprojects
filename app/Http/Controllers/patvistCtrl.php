<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatVists;
class patvistCtrl extends Controller
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
        //

        $pat = new PatVists;
        $pat->pat_id = $request->input('pat_id');
        $pat->invoice_items = $request->input('invoice_items');
        $pat->Total = $request->input('Total');
        $pat->net_price = $request->input('net_price');
        $pat->cln_id = $request->input('cln_id');
        $pat->doc_id = $request->input('doc_id');
        $pat->save();
        return 'Done Added';
    }

    public function getByCln($clnid) 
    {
        $pats = PatVists::where("cln_id","=",$clnid)->where("paied","=",0)->get();
        return $pats;
    }

    public function updateSt($id) {

        $update = PatVists::find($id);
        $update->paied = 1;
        $update->save();
        
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
