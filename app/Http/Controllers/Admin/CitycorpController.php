<?php

namespace App\Http\Controllers\Admin;

use App\Citycorp;
use App\Division;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitycorpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citycorps=Citycorp::select()->orderBy('id')->paginate();
        return view('pages.admin.citycorp.index',compact('citycorps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::select(['id','name'])->get();
        return view('pages.admin.citycorp.create',compact('divisions'));
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
            'name'=> 'required|unique:citycorps',
            'division_id'=>'required'
        ]);

        Citycorp::create($request->all());
        Brian2694Toastr::success('City Corporation Created Successfully', 'Success');
        return redirect()->route('admin.citycorp.index');
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
    public function edit(Citycorp $citycorp)
    {
        $divisions=Division::select(['id','name'])->get();
        return view('pages.admin.citycorp.edit',compact('divisions','citycorp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citycorp $citycorp)
    {
        $this->validate($request,[
            'name'=> 'required',
            'division_id'=>'required'
        ]);

        $citycorp->update($request->all());
        Brian2694Toastr::success('City Corporation Updated Successfully', 'Success');
        return redirect()->route('admin.citycorp.index');
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
