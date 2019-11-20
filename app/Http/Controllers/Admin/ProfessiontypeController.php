<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProfessionType;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;

class ProfessiontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professiontypes=ProfessionType::select()->orderBy('id')->paginate();
        return view('pages.admin.professiontype.index',compact('professiontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.professiontype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'profession_type'=> 'required|unique:profession_types'
        ]);

        ProfessionType::create($request->all());
        Brian2694Toastr::success('Profession Type Created Successfully', 'Success');
        return redirect()->route('admin.professiontype.index');
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
    public function edit(ProfessionType $professiontype)
    {
        return view('pages.admin.professiontype.edit',compact('professiontype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfessionType $professiontype)
    {
        $this->validate($request,[
            'profession_type'=> 'required'
        ]);

        $professiontype->update($request->all());
        Brian2694Toastr::success('Profession Type Updated Successfully', 'Success');
        return redirect()->route('admin.professiontype.index');
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
