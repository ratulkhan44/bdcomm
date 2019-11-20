
@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')
<div class="card ">
        <div class="card-header">
            <h5 class="text-uppercase">Basic Tables</h5>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table" id="clientList">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Text</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $index => $client)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{$client->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
