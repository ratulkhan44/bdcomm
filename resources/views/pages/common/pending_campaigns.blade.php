
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
                            <th>Username</th>
                            <th>Number of clients</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $iterator = 0
                        @endphp
                        @foreach ($campaigns as $index => $campaign)
                            <tr>
                                <td>{{ $iterator + 1 }}</td>
                                <td><a href="{{  url('/pending-campaigns', ['id' => $campaign->id]) }}">{{ $campaign->name }}</a></td>
                                <td>{{ $campaign->text["message"] }}</td>
                                <td>{{ $campaign->user->name }}</td>
                                <td>{{ $counts[$iterator++] }}</td>
                                <td>{{ $campaign->created_at->format('d-m-Y') }}</td>
                                <td>{{ ($campaign->status == 0) ? "Pending" : "Completed" }}</td>
                                <td>
                                    <a href="{{  url('/send-campaigns-sms', ['id' => $campaign->id]) }}">
                                        <button class="btn btn-primary">Send All</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
