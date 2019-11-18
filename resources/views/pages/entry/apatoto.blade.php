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
                <form action="">
                    <div class="row justify-content-left">
                        <div class="col-lg-6">
                        <div class="p-5">
                          <div class="text-left">
                            <h1 class="h3 mb-1 text-gray-800"><u>Personal Information</u></h1>
                            <br>
                          </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="mobile" placeholder="Mobile number" required="1">
                            </div>
                            <div class="form-group">
                              <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                              <select class="form-control search-select" name="religion">
                                <option value="">--Select Religion--</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddist">Buddist</option>
                                <option value="Christian">Christian</option>
                              </select>
                            </div>
                        </div>
                      </div>
                   
                      <!-- Address -->
                      <div class="col-lg-6">
                        <div class="p-5">
                          <div class="text-left">
                            <h1 class="h3 mb-1 text-gray-800"><u>Address</u></h1>
                            <br>
                          </div>
                          <label class="form-group"><b>Permanent Address</b></label>
                            <div class="form-group">
                            <select class="form-control search-select divisionA" name="division">
                                <option value="">--Select Division--</option>
                                @foreach ($divisions as $division)
                                <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                                    
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control search-select districtA" name="district">
                                <option value="">--Select District--</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control search-select upazillaA" name="upazila">
                              <option value="">--Select Upazila--</option>
                            </select>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" name="union" placeholder="Union/Word">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="village" placeholder="Village/Road/Moholla">
                          </div>
                          <div class="form-group">
                            <select class="form-control search-select pourosavaA" name="pourosava">
                              <option value="">--Select Pourosava--</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <select class="form-control search-select citycorpA" name="city_corporation">
                              <option value="">--Select City Corporation--</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <!-- Address End -->
                
                      
                      
                      <div class="col-lg-4">
                        <div class="p-5">
                          <div class="form-group">
                              <input type="submit" class="btn btn-primary btn-user btn-block" name="submit">
                            </div>
                        </div>
                      </div>
                     
                    </div>
                </form>
               
            </div>
        </div>
    </div>
       
            
   

@endsection
