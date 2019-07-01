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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8HxCRDmZUZ_bvLDr3nSPNafElph4A0HE&libraries=places"type= "text/javascript">
</script>

<br><br>
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Welcome
        <small>to
            <a href="/">Project Name</a>
        </small>
    </h1>
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(array('url' => '/normal-user-registration-form', 'files'=>true  ))!!}
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    {!! Form::text('fname',null,['class'=>'form-control','placeholder'=>'First Name']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Middle Name</label>
                                    {!! Form::text('mname',null,['class'=>'form-control','placeholder'=>'Middle Name']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Gender: </label>
                                    <div class="input-group">
                                        {!! Form::radio('gender', 'Male') !!} Male &nbsp&nbsp&nbsp
                                        {!! Form::radio('gender', 'Female') !!} Female
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email Address</label>
                                    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Middle Name']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    {!! Form::text('lname',null,['class'=>'form-control','placeholder'=>'Last Name']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Date of Birth:</label>
                                    <input type="date" name="birthday" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label"> Status: </label>
                                    <div class="input-group">&nbsp&nbsp
                                        {!! Form::radio('civil_status', 'Single') !!} &nbsp Single &nbsp&nbsp&nbsp&nbsp
                                        {!! Form::radio('civil_status', 'Married') !!} &nbsp Married &nbsp&nbsp&nbsp&nbsp
                                        {!! Form::radio('civil_status', 'Widowed') !!} &nbsp Widow
                                    </div>
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
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label class="control-label">Profile Image:</label>
                                    {!! Form::file('profile_image',['class'=>'form‐control','id'=>'profile_image'  ]) !!}
                                </div> 
                                <div class="form-group">
                                    <img id="logo5" src="#" name="profile_image"  class="img-fluid"  />
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
        $('#logo5').attr('src', e.target.result);
        // $('#logo').attr('src', e.target.result);
      } 
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#profile_image").change(readURL);
</script>
@endsection
