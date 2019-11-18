@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')

{{-- @push('scripts')
<script>
    $('.divisionA').on('change',function(){

        var divisionID = $('option:selected',this).attr('data-id');
        var divisionURL = 'getdistricts/' + divisionID;
        
        $.ajax({
            type: 'GET',
            url: divisionURL,
            dataType: 'json',
            success: function(data){
              $('.districtA option').remove();
              $('.districtA').append("<option>Select District</option>");
                $(data).each(function(index, value){
                    $('.districtA').append("<option data-id="+ value.id +">"+ value.name +"</option>")
                });
            }
        });
    });
   

    $('.districtA').on('change',function(){

        var districtID = $('option:selected',this).attr('data-id');
        var districtURL = 'getupazillas/' + districtID;

        $.ajax({
            type: 'GET',
            url: districtURL,
            dataType: 'json',
            success: function(data){
              $('.upazillaA option').remove();
              $('.upazillaA').append("<option>Select Upazilla</option>");
                $(data).each(function(index, value){
                    $('.upazillaA').append("<option data-id="+ value.id +">"+ value.name +"</option>")
                });
            }
        });
      });

      $('.districtA').on('change',function(){

      var districtID = $('option:selected',this).attr('data-id');
      var districtURL = 'getpourosavas/' + districtID;

      $.ajax({
          type: 'GET',
          url: districtURL,
          dataType: 'json',
          success: function(data){
            $('.pourosavaA option').remove();
            $('.pourosavaA').append("<option>Select Pourosava</option>");
              $(data).each(function(index, value){
                  $('.pourosavaA').append("<option data-id="+ value.id +">"+ value.name +"</option>")
              });
          }
      });
      });

      $('.divisionA').on('change',function(){

      var divisionID = $('option:selected',this).attr('data-id');
      var divisionURL = 'getcitycorps/' + divisionID;

      $.ajax({
          type: 'GET',
          url: divisionURL,
          dataType: 'json',
          success: function(data){
            $('.citycorpA option').remove();
            $('.citycorpA').append("<option>Select City Corporation</option>");
              $(data).each(function(index, value){
                  $('.citycorpA').append("<option data-id="+ value.id +">"+ value.name +"</option>")
              });
          }
      });
      });
</script>
@endpush --}}
       
<form  method="post" action="{{route('entry.store')}}">
    @csrf
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
      <div class="col-lg-6">
        <div class="p-5">
          <div class="text-left">
            <h1 class="h3 mb-1 text-gray-800"><br></h1>
            <br>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="gender">
              <option value="">--Select Gender--</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="education">
              <option value="">--Select Last Education--</option>
              <option value="Masters">Masters</option>
              <option value="Honors">Honors</option>
              <option value="HSC">HSC</option>
              <option value="SSC">SSC</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="blood_group">
              <option value="">--Select Blood Group--</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
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
                <option value="1">Dhaka</option>
                {{-- @foreach ($divisions as $division)
                <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                    
                @endforeach --}}
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select districtA" name="district">
                <option value="">--Select District--</option>
                <option value="1">Narayongonj</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select upazillaA" name="upazila">
              <option value="1">Dohar</option>
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
              <option value="1">gsdgsds</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select citycorpA" name="city_corporation">
              <option value="">--Select City Corporation--</option>
              <option value="1">Dhaka Uttor</option>
            </select>
          </div>
        </div>
      </div>
      <!-- Address End -->

      <div class="col-lg-6">
        <div class="p-5">
          <div class="text-left">
            <h1 class="h3 mb-1 text-gray-800"><br></h1>
            <br>
          </div>
          <label class="form-group"><b>Present Address</b></label>
            <div class="form-group">
            <select class="form-control search-select" name="division1">
              <option value="">--Select Division--</option>
              <option value="1">Dhaka</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="district1">
              <option value="">--Select District--</option>
              <option value="1">Narayangonj</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="upazila1">
              <option value="">--Select Upazila--</option>
              <option value="1">Basari</option>
            </select>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="union1" placeholder="Union/Word">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="village1" placeholder="Village/Road/Moholla">
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="pourosava1">
              <option value="">--Select Pourosava--</option>
              <option value="1">xxxx</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="city_corporation1">
              <option value="1">south</option>
            </select>
          </div>
        </div>
      </div>
      <!-- Profession Start -->
      <div class="col-lg-6">
        <div class="p-5">
          <div class="text-left">
            <h1 class="h3 mb-1 text-gray-800"><u>Profession</u></h1>
            <br>
          </div>
            <div class="form-group">
            <select class="form-control search-select" name="profession_type">
              <option value="">--Select Profession Type--</option>
              <option value="Ex-Service">Ex-Service</option>
              <option value="Business">Business</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="professional">
              <option value="">--Select Professional--</option>
              <option value="Ex-Doctor">Ex-Doctor</option>
              <option value="Engineer">Engineer</option>
              <option value="professional">Not professional</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="business_type">
              <option value="">--Select Business Type--</option>
              <option value="Government">Ex-Government</option>
              <option value="Bank">Bank</option>
              <option value="Multinational">Multinational</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="org_name" placeholder="Organization name">
          </div>
        </div>
      </div>
      <!-- Profession End -->

      <!-- Political Info Start -->
      <div class="col-lg-6">
        <div class="p-5">
          <div class="text-left">
            <h1 class="h3 mb-1 text-gray-800"><u>Political Info</u></h1>
            <br>
          </div>
            <div class="form-group">
            <select class="form-control search-select" name="political_view">
              <option value="">--Select Political view--</option>
              <option value="Ex- BNP">Ex- BNP</option>
              <option value="AL">AL</option>
              <option value="Neutral">Neutral</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="wing_name">
              <option value="">--Select Wing name--</option>
              <option value="Chatrodol">Chatrodol</option>
              <option value="Chatrolig">Chatrolig</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="unit_name">
              <option value="">--Select Unit name--</option>
              <option value="Zilla committee">Zilla committee</option>
              <option value="Thana Committee">Thana Committee</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="post_name">
              <option value="">--Select Post name--</option>
              <option value="President">President</option>
              <option value="Member">Member</option>
              <option value="Supporter">Supporter</option>
            </select>
          </div>
        </div>
      </div>
      <!-- Political Info End -->
      <div class="col-lg-4">
        <div class="p-5">
          <div class="form-group">
              
            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="p-5">
          <div class="form-group">
              <input type="submit" class="btn btn-primary btn-user btn-block" name="submit">
            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="p-5">
          <div class="form-group">
            </div>
        </div>
      </div>
    </div>
  </form>

@endsection
