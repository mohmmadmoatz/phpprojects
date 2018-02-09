<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\appt;
use App\money;
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

     public function getApptbypat ($clnid,$docid,$patid) {
        
                // QueryBuilder Here >>>>>>>>>> MohmmadMoatz
        
                $apptbooked = appt::where("cln_id","=",$clnid)->where("doc_id","=",$docid)->where("pat_id","=",$patid)->where("apptstatus",'=','خروج من العيادة')->where("status","=","كشف جديد")->orderBy("date1","desc")->get();
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
        $add->bankid = $request->input('bankid');
        
        
        $add->save();

        $invid =  $add->id;


        $add = new money;
        $add->date1 = $request->input('date1');

        $add->time1 = $request->input('hour');
        $add->kind = 'قبض';
        $add->invid = $invid;
  
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

     public function changeStatus($id,$status,$times,$what)
    {
        $appt = appt::find($id);
        $appt->apptstatus = $status;
        if ($what === 'IN') {
            $appt->enter_time = $times;
        }else{
            $appt->out_time = $times;
        }
        $appt->save();
        
    }

    public function destroy($id)
    {
        
        $appt = appt::find($id)->delete();
        return 'delete';
        
        

        //

    }
}
