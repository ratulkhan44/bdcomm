<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;
use App\Http\Controllers\Controller;
use App\Pourosava;
use App\District;

class PourosavaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pourosavas=Pourosava::select()->orderBy('id')->paginate();
        return view('pages.admin.pourosava.index',compact('pourosavas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::select(['id','name'])->orderBy('id')->get();
        return view('pages.admin.pourosava.create',compact('districts'));
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
            'name'=> 'required|unique:pourosavas',
            'district_id'=>'required'
        ]);

        Pourosava::create($request->all());
        Brian2694Toastr::success('Pourosava Created Successfully', 'Success');
        return redirect()->route('admin.pourosava.index');
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
    public function edit(Pourosava $pourosava)
    {
        $districts=District::select(['id','name'])->orderBy('id')->get();
        return view('pages.admin.pourosava.edit',compact('districts','pourosava'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pourosava $pourosava)
    {
        $this->validate($request,[
            'name'=> 'required',
            'district_id'=>'required'
        ]);

        $pourosava->update($request->all());
        Brian2694Toastr::success('Pourosava Update Successfully', 'Success');
        return redirect()->route('admin.pourosava.index');
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
