<?php

namespace App\Http\Controllers\Admin;

use App\BusinessType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;

class BusinessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesstypes=BusinessType::select()->orderBy('id')->paginate();
        return view('pages.admin.businesstype.index',compact('businesstypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.businesstype.create');
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
            'business_type'=> 'required|unique:business_types'
        ]);

        BusinessType::create($request->all());
        Brian2694Toastr::success('Professional Created Successfully', 'Success');
        return redirect()->route('admin.businesstype.index');
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
    public function edit(BusinessType $businesstype)
    {
        return view('pages.admin.businesstype.edit',compact('businesstype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessType $businesstype)
    {
        $this->validate($request,[
            'business_type'=> 'required'
        ]);

        $businesstype->update($request->all());
        Brian2694Toastr::success('Professional Updated Successfully', 'Success');
        return redirect()->route('admin.businesstype.index');
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
