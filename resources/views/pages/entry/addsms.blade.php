
@extends('layouts.master')
@push('token')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('title','Madol | Dashboard')
@section('content')
<div class="card ">
    <div class="card-body">
    <form action="">
                <div class="form-group">
                        <select class="form-control search-select division" name="division">
                            <option value="">--Select Division--</option>
                            @foreach ($divisions as $division)
                            <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                                
                            @endforeach
                        </select>
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
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientList as $client)
                            
                       
                        <tr>
                        <td>1</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->contact}}</td>
                        <td><button class="btn btn-primary" data-toggle="modal" data-target="#addSmsModal" id={{$client->id}}>Send SMS</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
                            <textarea class="form-control" name="text" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit">Send message</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.division').on('change',function(){

            var divisionID = $('option:selected',this).attr('data-id');
            var divisionURL = 'getdivisionalclients/' + divisionID;

            $('#clientList tbody tr').remove();
            
            $.ajax({
                type: 'GET',
                url: divisionURL,
                dataType: 'json',
                success: function(data){

                    $(data).each(function(index, value) {

                    if(data.length) {
                        $('#clientList').append(`<tr>
                            <td>1</td>
                            <td>`+value.email+`</td>
                            <td>`+value.name+`</td>
                            <td>`+value.contact+`</td>
                            <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addSmsModal'>Send SMS</button></td></tr>`);
                        }
                    });
                }
            });
        });

        $('.submit').on('click',function(){

        var divisionID = $('option:selected',this).attr('data-id');
        var divisionURL = 'collectsmsrequest';
            var text= $('#message-text').val();

        $.ajax({
                type: 'POST',
                url: divisionURL,
                data:{text:text},
                headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                },
                success: function(data){
                        console.log(data);
                        
                }
            });
        });
    </script>
@endpush
