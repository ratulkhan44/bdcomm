@extends('layouts.master')
@section('title','Madol | Dashboard')

@push('scripts')
    <script type="text/javascript">

    $('#sendSMSS').on('click',function(){
    var reqData = {
        "authentication": {
            "username": "Rupy",
            "password": "Kht@123!"
        },
        "messages": [
            {
                "sender": "044XXXXXXXX",
                "text": "Hello",
                "recipients": [
                    {
                        "gsm": "8801793724391"
                    }
                ],
                "type": "longSMS",
                "datacoding": 8,
                "fbclid": "IwAR0dRYxd--Taz7eXXaFvx6chzjia1UPnDNkrzp3ms9xwL7p6cbqxyUmYYT8"
            }
        ]
    };

    $.ajax({
            type: 'POST',
            url: 'http://api.rankstelecom.com/api/v3/sendsms/json',
            data: reqData,
            headers: {
                'Host': 'http://api.rankstelecom.com',
                'Content-Type': 'application/json',
                'Accept': '*/*'
            },
            success: function(data){
                    console.log(data);
            }
        });
    });
    </script>
@endpush

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
                <a href="{{ route('sendsms') }}" type="button" class="btn btn-primary" name="button" id="sendSMS">Send</a>
           </div>
       </div>
        </div>
    </div>




@endsection
