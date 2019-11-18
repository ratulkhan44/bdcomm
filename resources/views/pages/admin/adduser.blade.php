@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')

       
       <div class="card">
           <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('admin.adduser') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="usertype" class="col-sm-3 col-form-label">User Type</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="usertype" name="user_type" required>
                                <option value="Office Staff">Office Staff</option>
                                <option value="Data Entry">Data Entry</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="userid" class="col-sm-3 col-form-label">User Id</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_id" id="userid" placeholder="User ID" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact" class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="contact" id="contact" placeholder="Contact" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" 
                            name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-floating">Submit</button>
                </form>
           </div>
       </div>
   

@endsection
