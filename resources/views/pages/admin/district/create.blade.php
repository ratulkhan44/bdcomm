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
                <form method="POST" action="{{route('admin.district.store')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="divison_id" class="col-sm-4 col-form-label">Division</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="divison_id" name="division_id" required>
                                    <option value="">Select Division</option>
                                        @foreach ($divisions as $division)
                                            <option value="{{$division->id}}">{{$division->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 col-form-label">District</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-floating">Submit</button>
                    <form>    
                </div>
            </div>
       
        </div>
    </div>
       
            
   

@endsection
