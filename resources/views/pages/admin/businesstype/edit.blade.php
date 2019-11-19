@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')

    <div class="page-title d-flex justify-content-between">
        <h5> Dashboard </h5>
        <p class="mb-0"><a href="javascript:void(0)">Home</a> | <span>Dashboard</span></p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{route('admin.businesstype.update',$businesstype->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">Business Type</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="business_type" id="name" placeholder="Name" value="{{$businesstype->business_type}}" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-floating">Submit</button>
                    <form>    
                </div>
            </div>
       
        </div>
    </div>
       
            
   

@endsection
