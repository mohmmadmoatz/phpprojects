<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\money;
class moneyCtrl extends Controller
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
    public function store(Request $request )
    {
        
        $add = new money;
        $add->date1 = $request->input('date1');

        $add->time1 = $request->input('hour');
        $add->kind = $request->input('kind');
        $add->invid = $request->input('invid');
  
        $add->price = $request->input('inv_total');
        $add->discount = $request->input('inv_discountvalue');
        $add->net_price = $request->input('net_price');
      
        $add->user_created = $request->input('user_created');
        $add->account = $request->input('pat_id');

        $add->branch = $request->input('branch');
        $add->clinic = $request->input('cln_id');
        
        $add->doctor = $request->input('doc_id');
        $add->bankid = $request->input('bankid');
       // $add->deleted = $request->input('deleted');
        $add->save();

      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kind,$clnid,$docid,$bankid)
    {
        if ($kind ==='الجميع'){
            $kind = '';
        }
        if ($clnid ==='الجميع'){
            $clnid = '';
        }
        if ($docid === 'الجميع') {
            $docid = '';
        }
        if ($bankid ==='الجميع'){
            $bankid = '';
        }

        $result = money::where('kind','like','%'. $kind . '%')
        ->where('clinic','like','%' . $clnid . '%')
        ->where('doctor','like','%' . $docid . '%')
        ->where('bankid','like','%' . $bankid . '%')
        
        ->get();

        return $result;

    
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
