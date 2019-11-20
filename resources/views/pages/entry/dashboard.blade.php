@extends('layouts.master')
@section('title','Madol | Dashboard')
@section('content')

@push('scripts')
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

    $('.divisionA').on('change',function(){

        var divisionID = $('option:selected',this).attr('data-id');
        var divisionURL = 'getdistricts/' + divisionID;

        $.ajax({
            type: 'GET',
            url: divisionURL,
            dataType: 'json',
            success: function(data){
              $('.citycorpA option').remove();
              $('.citycorpA').append("<option>Select District</option>");
                $(data).each(function(index, value){
                    $('.citycorpA').append("<option data-id="+ value.id +">"+ value.name +"</option>")
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

<script type="text/javascript">
$('.divisionB').on('change',function(){

    var divisionID = $('option:selected',this).attr('data-id');
    var divisionURL = 'getdistricts/' + divisionID;

    $.ajax({
        type: 'GET',
        url: divisionURL,
        dataType: 'json',
        success: function(data){
          $('.districtB option').remove();
          $('.districtB').append("<option>Select District</option>");
            $(data).each(function(index, value){
                $('.districtB').append("<option data-id="+ value.id +">"+ value.name +"</option>")
            });
        }
    });
});

$('.divisionB').on('change',function(){

    var divisionID = $('option:selected',this).attr('data-id');
    var divisionURL = 'getdistricts/' + divisionID;

    $.ajax({
        type: 'GET',
        url: divisionURL,
        dataType: 'json',
        success: function(data){
          $('.citycorpB option').remove();
          $('.citycorpB').append("<option>Select District</option>");
            $(data).each(function(index, value){
                $('.citycorpB').append("<option data-id="+ value.id +">"+ value.name +"</option>")
            });
        }
    });
});

$('.districtB').on('change',function(){

    var districtID = $('option:selected',this).attr('data-id');
    var districtURL = 'getupazillas/' + districtID;

    $.ajax({
        type: 'GET',
        url: districtURL,
        dataType: 'json',
        success: function(data){
          $('.upazillaB option').remove();
          $('.upazillaB').append("<option>Select Upazilla</option>");
            $(data).each(function(index, value){
                $('.upazillaB').append("<option data-id="+ value.id +">"+ value.name +"</option>")
            });
        }
    });
  });

  $('.districtB').on('change',function(){

  var districtID = $('option:selected',this).attr('data-id');
  var districtURL = 'getpourosavas/' + districtID;

  $.ajax({
      type: 'GET',
      url: districtURL,
      dataType: 'json',
      success: function(data){
        $('.pourosavaB option').remove();
        $('.pourosavaB').append("<option>Select Pourosava</option>");
          $(data).each(function(index, value){
              $('.pourosavaB').append("<option data-id="+ value.id +">"+ value.name +"</option>")
          });
      }
  });
  });

  $('.divisionB').on('change',function(){

  var divisionID = $('option:selected',this).attr('data-id');
  var divisionURL = 'getcitycorps/' + divisionID;

  $.ajax({
      type: 'GET',
      url: divisionURL,
      dataType: 'json',
      success: function(data){
        $('.citycorpB option').remove();
        $('.citycorpB').append("<option>Select City Corporation</option>");
          $(data).each(function(index, value){
              $('.citycorpB').append("<option data-id="+ value.id +">"+ value.name +"</option>")
          });
      }
  });
});
</script>
@endpush

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
                @foreach ($divisions as $division)
                <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select districtA" name="district">
                <option value="">--Select District--</option>
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
                <select class="form-control search-select divisionB" name="division">
                    <option value="">--Select Division--</option>
                    @foreach ($divisions as $division)
                    <option value="{{$division->name}}" data-id="{{$division->id}}">{{$division->name}}</option>
                    @endforeach
                </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select districtB" name="district2">
              <option value="">--Select District--</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select upazillaB" name="upazila2">
              <option value="">--Select Upazila--</option>
            </select>
          </div>
          <div class="form-group">
              <input type="text" class="form-control" name="union2" placeholder="Union/Word">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="village2" placeholder="Village/Road/Moholla">
          </div>
          <div class="form-group">
            <select class="form-control search-select pourosavaB" name="pourosava2">
              <option value="">--Select Pourosava--</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select citycorpB" name="city_corporation2">
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
                @foreach ($profession_types as $profession_type)
                <option value="{{$profession_type->id}}" data-id="{{$profession_type->id}}">{{$profession_type->profession_type}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="professional">
                <option value="">--Select Profession Type--</option>
                @foreach ($professionals as $professional)
                <option value="{{$professional->id}}" data-id="{{$professional->id}}">{{$professional->professional}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
              <select class="form-control search-select" name="business_type">
                  <option value="">--Select Business Type--</option>
                  @foreach ($business_types as $business_type)
                  <option value="{{$business_type->id}}" data-id="{{$business_type->id}}">{{$business_type->business_type}}</option>
                  @endforeach
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
                @foreach ($political_views as $political_view)
                <option value="{{$political_view->id}}" data-id="{{$political_view->id}}">{{$political_view->political_view}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="wing_name">
                <option value="">--Select Wing name--</option>
                @foreach ($wings as $wing)
                <option value="{{$wing->id}}" data-id="{{$wing->id}}">{{$wing->wing}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="unit_name">
              <option value="">--Select Unit name--</option>
                @foreach ($units as $unit)
                <option value="{{$unit->id}}" data-id="{{$unit->id}}">{{$unit->unit}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <select class="form-control search-select" name="post_name">
              <option value="">--Select Post name--</option>
                @foreach ($posts as $post)
                <option value="{{$post->id}}" data-id="{{$post->id}}">{{$post->post}}</option>
                @endforeach
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
