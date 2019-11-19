<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Professional;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;

class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professionals=Professional::select()->orderBy('id')->paginate();
        return view('pages.admin.professional.index',compact('professionals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.professional.create');
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
            'professional'=> 'required|unique:professionals'
        ]);

        Professional::create($request->all());
        Brian2694Toastr::success('Professional Created Successfully', 'Success');
        return redirect()->route('admin.professional.index');
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
    public function edit(Professional $professional)
    {
        return view('pages.admin.professional.edit',compact('professional'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professional $professional)
    {
        $this->validate($request,[
            'professional'=> 'required'
        ]);

        $professional->update($request->all());
        Brian2694Toastr::success('Professional Updated Successfully', 'Success');
        return redirect()->route('admin.professional.index');
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
