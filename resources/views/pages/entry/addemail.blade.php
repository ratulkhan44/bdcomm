
@extends('layouts.master')
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
                        <td><button class="btn btn-primary" id={{$client->id}}>Send SMS</button></td>
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
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
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

    </script>
@endpush
