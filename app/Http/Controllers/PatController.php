<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pat;
use App\Http\Requests\PatRequest;

class PatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
       
        
        
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function disAll() {
        $pats = Pat::all();
        return $pats;
    }

    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $patadd = new Pat;
      $patadd->Fnum = 'F-' . substr($request->input('en_fname'),0,2) . '-' . rand();
      $patadd->ar_fname = $request->input('ar_fname');
      $patadd->ar_lname = $request->input('ar_lname');
      $patadd->en_fname = $request->input('en_fname');

      $patadd->en_lname = $request->input('en_lname');
      $patadd->phone1 = $request->input('phone1');
      $patadd->phone2 = $request->input('phone2');
    
      $patadd->fax = $request->input('fax');
      $patadd->email = $request->input('email');
      $patadd->nat = $request->input('nat');
      $patadd->address = $request->input('address');
      $patadd->metrial_st = $request->input('metrial_st');
      $patadd->gendre = $request->input('gendre');
      $patadd->idf_type = $request->input('idf_type');
      $patadd->idf_num = $request->input('idf_num');
      $patadd->more = $request->input('more');
      
      
      
      
      $patadd->save();
      return 'تم الاضافة' . $patadd->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Pat::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pat = Pat::find($id);
        return view("welcome")->with('patdata',$pat);
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
        $patadd = Pat::find($id);
        $patadd->Fnum = $request->input('Fnum');
        $patadd->ar_fname = $request->input('ar_fname');
        $patadd->ar_lname = $request->input('ar_lname');
        $patadd->en_fname = $request->input('en_fname');
  
        $patadd->en_lname = $request->input('en_lname');
        $patadd->phone1 = $request->input('phone1');
        $patadd->phone2 = $request->input('phone2');
      
        $patadd->fax = $request->input('fax');
        $patadd->email = $request->input('email');
        $patadd->nat = $request->input('nat');
        $patadd->address = $request->input('address');
        $patadd->metrial_st = $request->input('metrial_st');
        $patadd->gendre = $request->input('gendre');
        $patadd->idf_type = $request->input('idf_type');
        $patadd->idf_num = $request->input('idf_num');
        $patadd->more = $request->input('more');
        $patadd->save();
        return 'تم الاضافة' . $patadd->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pata = Pat::find($id)->delete();
        return 'done Deleted';

    }
}
