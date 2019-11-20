
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
                        @foreach ($campaigns as $index => $campaign)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><a href="{{  url('/entry/pending-campaigns', ['id' => $campaign->id]) }}">{{$campaign->name}}</a></td>
                                <td>{{$campaign->text["message"]}}</td>
                                <td>{{($campaign->status == 0) ? "Pending" : "Completed"}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
