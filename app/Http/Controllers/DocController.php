<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctor;
class DocController extends Controller
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

    public function disAll() {
        $docs = doctor::all();
        return $docs;
    }

    public function store(Request $request)
    {
        $bradd = new doctor;
        $bradd->doc_name =     $request->input('doc_name');
        $bradd->doc_phone = $request->input('doc_phone');
        $bradd->doc_salary = $request->input('doc_salary');
        $bradd->doc_email = $request->input('doc_email');
  
        $bradd->doc_clinic = $request->input('doc_clinic');
        $bradd->doc_mohlat = $request->input('doc_mohlat');
        $bradd->doc_address = $request->input('doc_address');
        $bradd->save();
        //return 'جاري تحميل الصورة' . $bradd->id;
        $brimgsave = doctor::find($bradd->id);
        if ($request->has('file')){
            
                    $imgname = $bradd->id . '-doc.' . $request->file('file')->getClientOriginalExtension();
                    $brimgsave->img_doc = $imgname;
                    $request->file('file')->move('images/doctor',$imgname);
                    
            }

            if ($request->has('file1')){
                
                        $imgname = $bradd->id . '-mohlat.' . $request->file('file1')->getClientOriginalExtension();
                        $brimgsave->img_mohlat = $imgname;
                        $request->file('file1')->move('images/doctor',$imgname);
                       
                }

                $brimgsave->save();

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
        return doctor::find($id);
        //Laravel MohmmadMoatz
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
        $bradd = doctor::find($id);
        $bradd->doc_name =     $request->input('doc_name');
        $bradd->doc_phone = $request->input('doc_phone');
        $bradd->doc_salary = $request->input('doc_salary');
        $bradd->doc_email = $request->input('doc_email');
  
        $bradd->doc_clinic = $request->input('doc_clinic');
        $bradd->doc_mohlat = $request->input('doc_mohlat');
        $bradd->doc_address = $request->input('doc_address');
        //return 'جاري تحميل الصورة' . $bradd->id;
      
        if ($request->has('file')){
            
                    $imgname = $bradd->id . '-doc.' . $request->file('file')->getClientOriginalExtension();
                    $bradd->img_doc = $imgname;
                    $request->file('file')->move('images/doctor',$imgname);
                   
            }

            if ($request->has('file1')){
                
                        $imgname = $bradd->id . '-mohlat.' . $request->file('file1')->getClientOriginalExtension();
                        $bradd->img_mohlat = $imgname;
                        $request->file('file1')->move('images/doctor',$imgname);
               
                }
                $bradd->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brn = Branch::find($id);
        $fname = $brn->br_img;
        File::delete('images/doctor/'.$fname . '-doc');
        File::delete('images/doctor/'.$fname . '-mohlat');
        
        $brn->delete();
       
        
        return $fname;
    }
}
