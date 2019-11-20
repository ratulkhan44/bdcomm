<?php

namespace App\Http\Controllers\Admin;

use App\District;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Upazilla;

class UpazillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upazillas=Upazilla::select()->orderBy('id')->paginate();
        return view('pages.admin.upazilla.index',compact('upazillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts=District::select(['id','name'])->orderBy('id')->get();
        return view('pages.admin.upazilla.create',compact('districts'));
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
            'name'=> 'required|unique:upazillas',
            'district_id'=>'required'
        ]);

        Upazilla::create($request->all());
        Brian2694Toastr::success('Upazilla Created Successfully', 'Success');
        return redirect()->route('admin.upazilla.index');
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
    public function edit(Upazilla $upazilla)
    {
        $districts=District::select(['id','name'])->orderBy('id')->get();
        return view('pages.admin.upazilla.edit',compact('districts','upazilla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upazilla $upazilla)
    {
        $this->validate($request,[
            'name'=> 'required',
            'district_id'=>'required'
        ]);

        $upazilla->update($request->all());
        Brian2694Toastr::success('upazilla Updated Successfully', 'Success');
        return redirect()->route('admin.upazilla.index');
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
