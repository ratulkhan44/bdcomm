<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wing;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;

class WingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wings=Wing::select()->orderBy('id')->paginate();
        return view('pages.admin.wing.index',compact('wings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.wing.create');
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
            'wing'=> 'required|unique:wings'
        ]);

        Wing::create($request->all());
        Brian2694Toastr::success('Wing Created Successfully', 'Success');
        return redirect()->route('admin.wing.index');
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
    public function edit(Wing $wing)
    {
        return view('pages.admin.wing.edit',compact('wing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wing $wing)
    {
        $this->validate($request,[
            'wing'=> 'required'
        ]);

        $wing->update($request->all());
        Brian2694Toastr::success('Wing Updated Successfully', 'Success');
        return redirect()->route('admin.wing.index');
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
