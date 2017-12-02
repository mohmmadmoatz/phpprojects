<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use Illuminate\Support\Facades\File;
class BranchController extends Controller
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
        $branchs = Branch::all();
        return $branchs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bradd = new Branch;
        $bradd->br_code =     $request->input('br_code');
        $bradd->branchname = $request->input('branchname');
        $bradd->br_own = $request->input('br_own');
        $bradd->br_email = $request->input('br_email');
  
        $bradd->br_phone = $request->input('br_phone');
        $bradd->br_fax = $request->input('br_fax');
        $bradd->address = $request->input('br_address');
        $bradd->save();
        //return 'جاري تحميل الصورة' . $bradd->id;
        $brimgsave = Branch::find($bradd->id);
        if ($request->has('file')){
            
                    $imgname = $bradd->id . '.' . $request->file('file')->getClientOriginalExtension();
                    $brimgsave->br_img = $imgname;
                    $request->file('file')->move('images/branch',$imgname);
                    $brimgsave->save();
            }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Branch::find($id);
         

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
        $bradd =  Branch::find($id);
        $bradd->br_code =     $request->input('br_code');
        $bradd->branchname = $request->input('branchname');
        $bradd->br_own = $request->input('br_own');
        $bradd->br_email = $request->input('br_email');
  
        $bradd->br_phone = $request->input('br_phone');
        $bradd->br_fax = $request->input('br_fax');
        $bradd->address = $request->input('br_address');
        
        //return 'جاري تحميل الصورة' . $bradd->id;
        
        if ($request->has('file')){
            
                    $imgname = $bradd->id . '.' . $request->file('file')->getClientOriginalExtension();
                    $bradd->br_img = $imgname;
                    $request->file('file')->move('images/branch',$imgname);
                    
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
        File::delete('images/branch/'.$fname);
        $brn->delete();
       
        
        return $fname;
    }
}
