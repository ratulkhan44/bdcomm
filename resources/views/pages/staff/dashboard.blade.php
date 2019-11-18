
@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')


       
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>{{Auth::user()->name}}</strong>
                </div>
            </div>
       <div class="card">
           <div class="card-body">
                Hello
           </div>
       </div>
   

@endsection
