@extends('layouts.guest')

@section('contents')

<style>
#map-canvas{
  width: 100%;
  height: 250px;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAduhN6pm6-cX28I42kTxyLEKoLn_rX7-Q&libraries=places"type= "text/javascript">
</script>

<br><br>
<div class="container">
  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">Welecome
    <small>to
      <a href="/">Project Name</a>
    </small>
  </h1>
  <div class="row">
    <!-- Post Content Column -->
    <div class="col-lg-8 offset-md-2">
      <div class="card">
        <div class="card-body">
          {!! Form::open(array('url' => '/pharmacy-registration-form', 'files'=>true  ))!!}
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="control-label">Pharmacy Name : </label>
                  {!! Form::text('pharma_name',null,['class'=>'form-control','placeholder'=>'Pharmacy Name']) !!}
                </div>
                <div class="form-group">
                  <label class="control-label">Contact No. :</label>
                  <div class="input-group">
                    <div class="input-group-btn">
                      {!! Form::select('code', array('ph' => '+ 63'), null, array('class'=>'btn btn-primary','type'=>'button' )) !!}
                    </div>
                    {!! Form::text('contact',null,['class'=>'form-control','maxlength' => '10','placeholder'=>'Enter contact number']) !!}
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Pharmacy Email :</label>
                  {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Enter Pharmacy Email'])!!}
                </div> 
                <div class="form-group">
                  <label class="control-label">Website <em>(leave it blank if none)</em>:</label>
                  {!! Form::text('pharma_website',null,['class'=>'form-control','placeholder'=>'Enter The Existing Webpage']) !!}
                </div> 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="control-label">Address:</label>      
                  {!!Form::text('address',null,['class'=>'form-control','placeholder'=> 'Enter a Query', 'id'=>'searchmap', 'autocomplete'=>'off'])!!}
                </div>
                <div class="form-group">
                  <div id="map-canvas">
                  </div>
                </div>
                {!!Form::hidden('lat',null,['class'=>'form-control','id'=>'lat'])!!}
                {!!Form::hidden('lng',null,['class'=>'form-control','id'=>'lng'])!!}
              </div>
              <div class="col-md-12 panel-heading"><b><i>Business Information</i></b></div>
              <div class="col-md-3 form-group">
                <label class="control-label">Date Certified:</label>
                <input type="date" name="date_certified" class="form-control" >
              </div>
              <div class="col-md-3 form-group">
                <label class="control-label">Date Expiration:</label>
                <input type="date" name="date_expiration" class="form-control" >
              </div>
              <div class="col-md-6"> 
                <div class="form-group">
                  <label class="control-label">Profile Image:</label>
                  {!! Form::file('pharma_logo',['class'=>'form‐control','id'=>'pharma_logo'  ]) !!}
                </div> 
                <div class="form-group">
                  <img id="logo" src="#" name="pharma_logo"  class="img-fluid" alt=" Your Image" />
                </div>  
              </div>
              <div class="col-md-12"> 
                <div class="form-group">
                  <label class="control-label">Proof of Accreditation<em>(Note: The certificate must be alteast 2 months validity before the renewal period.)</em>:</label>
                  {!! Form::file('fileupload[]',['class'=>'form‐control','id'=>'fileupload', 'multiple'  ]) !!}
                </div> 
                <div id="dvPreview">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="control-label">Username:</label>
                  {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Username']) !!}
                </div>
                <div class="form-group">
                  <label class="control-label">Password</label>
                  {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password'])!!}
                </div>
                <div class="form-group">
                  <label class="control-label">Retype Password</label>
                  {!! Form::password('conpass',['class'=>'form-control','placeholder'=>'Confirm Password'])!!}
                </div>
              </div>
            </div>
            <div class="col-md-12"><br>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-8 col-sm-6">
                      @if (Session::has('messageAgree'))
                      <div class="alert alert-info">{{ Session::get('messageAgree') }}</div>
                      @endif
                      {!! Form::checkbox('user_agreement', '1', null) !!} <a href="#" data-toggle = "modal" data-target = "#choose" class="text-center" style="text-decoration: none"><strong>Terms and Condition</strong></a>
                    </div>
                    <div class="col-4 offset-sm-2">
                      {!!Form::submit('Register',['class'=>'btn btn-lg btn-primary btn-block']) !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>

<script type="text/javascript">
  var map = new google.maps.Map(document.getElementById('map-canvas'),{
    center:{
      lat:10.2969,
      lng:123.8887
    },
    zoom:15
  });


  var marker = new google.maps.Marker({
    position: {
      lat:10.2969,
      lng:123.8887
    },
    map: map,
    draggable: false
  });

  var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
  google.maps.event.addListener(searchBox,'places_changed', function(){

    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;

    for(i=0; place=places[i];i++){
      bounds.extend(place.geometry.location);
    marker.setPosition(place.geometry.location); //set marker location new.......
  }

  map.fitBounds(bounds);
  map.setZoom(15);

});

  google.maps.event.addListener(marker,'position_changed',function(){

    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);

  });
</script>

<script type="text/javascript">
  function readURL(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $(event.target)
        .closest('form-group') //Target parent form control div
        .next() //Target sibling of parent form control 
        .find('img') //Target Ima
        .attr('src', e.target.result); //Set image
        $('#logo').attr('src', e.target.result);
        // $('#logo').attr('src', e.target.result);
      } 
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#pharma_logo").change(readURL);
</script>

<script language="javascript" type="text/javascript">
  window.onload = function () {
    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
      if (typeof (FileReader) != "undefined") {
        var dvPreview = document.getElementById("dvPreview");
        dvPreview.innerHTML = "";
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
        for (var i = 0; i < fileUpload.files.length; i++) {
          var file = fileUpload.files[i];
          if (regex.test(file.name.toLowerCase())) {
            var reader = new FileReader();
            reader.onload = function (e) {
              var img = document.createElement("IMG");
              img.height = "100";
              img.width = "100";
              img.src = e.target.result;
              dvPreview.appendChild(img);
            }
            reader.readAsDataURL(file);
          } else {
            alert(file.name + " is not a valid image file.");
            dvPreview.innerHTML = "";
            return false;
          }
        }
      } else {
        alert("This browser does not support HTML5 FileReader.");
      }
    }
  };
</script>
@endsection
