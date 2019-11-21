
@extends('layouts.master')
@push('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('title','Madol | Dashboard')
@section('content')
<div class="card ">
    <div class="card-body">
        <form action="" method="post" class="filter-form" id="filter-form">
            <div class="row">
                <div class="form-group col-md-4">
                    <select class="filter-input form-control search-select division" name="division">
                        <option value="">--Select Division--</option>
                        @foreach ($divisions as $division)
                        <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="filter-input form-control search-select district" name="district">
                        <option value="">--Select District--</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="filter-input form-control search-select upazilla" name="upazilla">
                        <option value="">--Select Upazilla--</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="filter-input form-control search-select citycorp" name="citycorp">
                        <option value="">--Select City Corporation--</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="filter-input form-control search-select pourosava" name="pourosava">
                        <option value="">--Select Pourosavas--</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <input class="filter-input form-control search-select union" type="text" name="union" placeholder="Union">
                </div>
                <div class="form-group col-md-4">
                    <input class="filter-input form-control search-select village" type="text" name="village" placeholder="Village">
                </div>
                <div class="form-group col-md-4">
                    <input class="form-control btn btn-primary" type="Submit" name="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
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
                            <th>Email</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client_list as $index => $client)
                            <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->contact }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary" data-toggle="modal" data-target="#addSmsModal" id="">Send SMS</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSmsModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="text" id="message_text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Campaign name:</label>
                        <input type="text" class="form-control" name="campaign_name" placeholder="Campaign name" id="campaign_name">
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit_sms_req" type="button" class="btn btn-primary">Send request</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Get select options
        $('.division').on('change',function(){

            var divisionID = $('option:selected', this).attr('data-id');
            var divisionURL = 'getdistricts/' + divisionID;

            $.ajax({
                type: 'GET',
                url: divisionURL,
                dataType: 'json',
                success: function(data){
                  $('.district option').remove();
                  $('.district').append("<option>Select District</option>");
                    $(data).each(function(index, value){
                        $('.district').append("<option value="+ value.name +" data-id="+ value.id +">"+ value.name +"</option>")
                    });
                }
            });
        });

        $('.district').on('change',function(){

            var districtID = $('option:selected',this).attr('data-id');
            var districtURL = 'getupazillas/' + districtID;

            $.ajax({
                type: 'GET',
                url: districtURL,
                dataType: 'json',
                success: function(data){
                  $('.upazilla option').remove();
                  $('.upazilla').append("<option>Select Upazilla</option>");
                    $(data).each(function(index, value){
                        $('.upazilla').append("<option value="+ value.name +" data-id="+ value.id +">"+ value.name +"</option>")
                    });
                }
            });
        });

        // Get cleints
        $("#filter-form").on('submit', function(e) {
            e.preventDefault();
            var divisionName = $('.division').attr('name');
            var divisionID = $('.division option:selected').data('id');
            var districtName = $('.district').attr('name');
            var districtID = $('.district option:selected').data('id');
            var upazillaName = $('.upazilla').attr('name');
            var upazillaID = $('.upazilla option:selected').data('id');
            var citycorpName = $('.citycorp').attr('name');
            var citycorpID = $('.citycorp option:selected').data('id');
            var pourosavaName = $('.pourosava').attr('name');
            var pourosavaID = $('.pourosava option:selected').data('id');
            var unionName = $('.union').attr('name');
            var unionValue = $('.union').val();
            var villageName = $('.village').attr('name');
            var villageValue = $('.village').val();

            var filters = {};

            if(divisionID) {
                filters[divisionName] = divisionID;
            }
            if(districtID) {
                filters[districtName] = districtID;
            }
            if(upazillaID) {
                filters[upazillaName] = upazillaID;
            }
            if(citycorpID) {
                filters[citycorpName] = citycorpID;
            }
            if(unionValue) {
                filters[unionName] = unionValue;
            }
            if(villageValue) {
                filters[villageName] = villageValue;
            }

            var divisionURL = 'getfilteredclients';

            $('#clientList tbody tr').remove();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: divisionURL,
                data: filters,
                dataType: 'json',
                success: function(data){

                    var clientSerial = 1;
                    $(data).each(function(index, value) {
                        if(data.length) {
                            $('#clientList').append(`<tr class="clientsInfo">
                                <td data-id=`+value.id+`>`+clientSerial+`</td>
                                <td>`+value.email+`</td>
                                <td>`+value.name+`</td>
                                <td>`+value.contact+`</td>`);
                        }
                        clientSerial++;
                    });
                }
            });

        });

        $('#submit_sms_req').on('click',function(){

        var clientsToText = []

        var clientsToText = $('.clientsInfo td:first-child').map(function() {
            return $(this).data('id');
        }).get();

        console.log(clientsToText);

        var message_text = $('#message_text').val();
        var campaign_name = $('#campaign_name').val();

        var reqData = {
            message: message_text,
            name: campaign_name,
            clientsToText: clientsToText
        }

        console.log(reqData);

        var divisionURL = 'collectsmsrequest';

        $.ajax({
                type: 'POST',
                url: divisionURL,
                data: reqData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data){
                        console.log(data);
                }
            });
        });






        /*
        $('.filter-form').on('change', '.filter-input', function(evt){

            var filters = {};

            // console.log(evt.target.type);

            $.each($('.filter-input'), function(idx, elem) {

                if(evt.target.type == "select-one") {
                    var inputID = $('option:selected', this).data('id');
                    var inputName = $(this).attr('name');

                    console.log(filters);
                    filters[inputName] = inputID;
                }

                if(evt.target.type == "text") {
                    var inputID = $(this).val();
                    var inputName = $(this).attr('name');

                    console.log(filters);
                    filters[inputName] = inputID;
                }

            });


            var divisionURL = 'getfilteredclients';

            $('#clientList tbody tr').remove();

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: divisionURL,
                data: filters,
                dataType: 'json',
                success: function(data){

                    $(data).each(function(index, value) {
                    if(data.length) {
                        $('#clientList').append(`<tr>
                            <td>1</td>
                            <td>`+value.email+`</td>
                            <td>`+value.name+`</td>
                            <td>`+value.contact+`</td>`);
                        }
                    });
                }
            });
        });
        */
























        // $('.division').on('change', function(){
        //
        //     var divisionID = $('option:selected',this).attr('data-id');
        //     var divisionURL = 'getfilteredclients/' + divisionID;
        //
        //     $('#clientList tbody tr').remove();
        //
        //     $.ajax({
        //         type: 'GET',
        //         url: divisionURL,
        //         dataType: 'json',
        //         success: function(data){
        //
        //             $(data).each(function(index, value) {
        //
        //             if(data.length) {
        //                 $('#clientList').append(`<tr>
        //                     <td>1</td>
        //                     <td>`+value.email+`</td>
        //                     <td>`+value.name+`</td>
        //                     <td>`+value.contact+`</td>
        //                     <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addSmsModal'>Send SMS</button></td></tr>`);
        //                 }
        //             });
        //         }
        //     });
        // });


    </script>
@endpush
