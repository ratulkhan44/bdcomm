<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PoliticalView;
use Brian2694\Toastr\Facades\Toastr as Brian2694Toastr;

class PoliticalViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $politicalviews=PoliticalView::select()->orderBy('id')->paginate();
        return view('pages.admin.politicalview.index',compact('politicalviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.politicalview.create');
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
            'political_view'=> 'required|unique:political_views'
        ]);

        PoliticalView::create($request->all());
        Brian2694Toastr::success('Political View Created Successfully', 'Success');
        return redirect()->route('admin.politicalview.index');
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
    public function edit(PoliticalView $politicalview)
    {
        return view('pages.admin.politicalview.edit',compact('politicalview'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,PoliticalView $politicalview)
    {
        $this->validate($request,[
            'political_view'=> 'required'
        ]);

        $politicalview->update($request->all());
        Brian2694Toastr::success('Political View Updated Successfully', 'Success');
        return redirect()->route('admin.politicalview.index');
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
