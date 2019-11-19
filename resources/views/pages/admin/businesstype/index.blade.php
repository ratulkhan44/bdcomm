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
                <div class="card-header">Business Type</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($businesstypes as $key=>$businesstype)
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$businesstype->business_type}}</td>
                                    <td>
                                        <a href="{{route('admin.businesstype.edit',$businesstype->id)}}" class="btn btn-primary">Edit</a>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
       
        </div>
    </div>
       
            
   

@endsection
