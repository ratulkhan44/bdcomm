<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Division;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts=District::select()->orderBy('id')->paginate();
        return view('pages.admin.district.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::select(['id','name'])->get();
        return view('pages.admin.district.create',compact('divisions'));
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
            'name'=> 'required|unique:districts',
            'division_id'=>'required'
        ]);

        District::create($request->all());
        Brian2694Toastr::success('District Created Successfully', 'Success');
        return redirect()->route('admin.district.index');

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
    public function edit(District $district)
    {
        $divisions=Division::select(['id','name'])->get();
        return view('pages.admin.district.edit',compact('divisions','district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {

        $this->validate($request,[
            'name'=> 'required',
            'division_id'=>'required'
        ]);

        $district->update($request->all());
        Brian2694Toastr::success('District Updated Successfully', 'Success');
        return redirect()->route('admin.district.index');
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
