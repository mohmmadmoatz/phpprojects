<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emp;
class EmpController extends Controller
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

    public function disAll() {
        $emps = Emp::all();
        return $emps;
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
        $empadd = new Emp;
        $empadd->barcode = rand();
        $empadd->ar_fullname = $request->input('ar_fullname');
        $empadd->en_fullname = $request->input('en_fullname');
        $empadd->gendre = $request->input('gendre');
  
        $empadd->phone = $request->input('phone');
        $empadd->email = $request->input('email');
        $empadd->clinic = $request->input('clinic');
      
        $empadd->mohlat = $request->input('mohlat');
      //  $empadd->password = $request->input('password'); We`ll Create Another Method
        $empadd->idf_type = $request->input('idf_type');
        $empadd->idf_num = $request->input('idf_num');
        $empadd->more = $request->input('more');
        
        
        
        
        $empadd->save();
        return 'تم الاضافة' . $empadd->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Emp::find($id);
        
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
        $empadd = Emp::find($id);
        $empadd->barcode = rand();
        $empadd->ar_fullname = $request->input('ar_fullname');
        $empadd->en_fullname = $request->input('en_fullname');
        $empadd->gendre = $request->input('gendre');
  
        $empadd->phone = $request->input('phone');
        $empadd->email = $request->input('email');
        $empadd->clinic = $request->input('clinic');
      
        $empadd->mohlat = $request->input('mohlat');
      //  $empadd->password = $request->input('password'); We`ll Create Another Method
        $empadd->idf_type = $request->input('idf_type');
        $empadd->idf_num = $request->input('idf_num');
        $empadd->more = $request->input('more');
        
        
        
        
        $empadd->save();
        return 'تم الاضافة' . $empadd->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empa = Emp::find($id)->delete();
        return 'done Deleted';
        
    }
}
