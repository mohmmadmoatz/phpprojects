<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appt;

class apptcontroller extends Controller
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

    public function getAppt ($clnid,$docid,$date1) {

        // QueryBuilder Here >>>>>>>>>> MohmmadMoatz

        $apptbooked = appt::where("cln_id","=",$clnid)->where("doc_id","=",$docid)->wheredate("date1","=",$date1)->get();
        return $apptbooked;


     }


    public function store(Request $request)
    {
        $add = new appt;
        $add->perid = $request->input('perid');

        $add->hour = $request->input('hour');
        $add->date1 = $request->input('date1');
        $add->status = $request->input('status');
  
        $add->apptstatus = $request->input('apptstatus');
        $add->inv_id = $request->input('inv_id');
        $add->pat_id = $request->input('pat_id');
      
        $add->cln_id = $request->input('cln_id');
        $add->doc_id = $request->input('doc_id');

        $add->srvs = $request->input('srvs');
        $add->inv_total = $request->input('inv_total');
        
        $add->inv_discountnsba = $request->input('inv_discountnsba');
        $add->inv_discountvalue = $request->input('inv_discountvalue');
        $add->net_price = $request->input('net_price');
       
        
        
        $add->save();
        return 'Appointment Created :' . $add->id;
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
        return appt::find($id);

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
        $add = appt::find($id);
        $add->perid = $request->input('perid');

        $add->hour = $request->input('hour');
        $add->date1 = $request->input('date1');
        $add->status = $request->input('status');
  
        $add->apptstatus = $request->input('apptstatus');
        $add->inv_id = $request->input('inv_id');
        $add->pat_id = $request->input('pat_id');
      
        $add->cln_id = $request->input('cln_id');
        $add->doc_id = $request->input('doc_id');

        $add->srvs = $request->input('srvs');
        $add->inv_total = $request->input('inv_total');
        
        $add->inv_discountnsba = $request->input('inv_discountnsba');
        $add->inv_discountvalue = $request->input('inv_discountvalue');
        $add->net_price = $request->input('net_price');
       
        
        
        $add->save();
        return 'Appointment Created :' . $add->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $appt = appt::find($id)->delete;


        //

    }
}
