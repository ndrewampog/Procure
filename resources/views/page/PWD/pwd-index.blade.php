@extends('layouts.user')

@section('contents')

<style>
#map-canvas{
  width: 100%;
  height: 400px;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8HxCRDmZUZ_bvLDr3nSPNafElph4A0HE&libraries=places"type= "text/javascript">
</script>
<br><br>
<div class="container">


  <div id="myModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Subscribe our Newsletter</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="modal-body">
          <div class="md-12">
            {!! Form::open(array('url' => '/PWD/use-register-location', 'files'=>true  ))!!}
            {!!Form::submit('Use The Register Location',['class'=>' nav-link btn btn-primary btn-lg btn-block ']) !!}
            {!! Form::close() !!}
          </div>
          <br>
          <div class="md-12">
            <a class="nav-link btn btn-primary btn-lg btn-block " href="#" data-toggle="modal" data-target="#registration">Select Location</a>
          </div>
        </div>
      </div>
    </div>
  </div>	

</div>
<br>
<br>
<br>
@if($UserLoc == '0')

<!-- Error if statement  , if 0 siya mugawas gihapon ang modal dapat dili siya . -->
<script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal({
      backdrop: 'static',
      keyboard: false,
      show: true
    });
  });
</script>  
@endif
<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          {!! Form::open(array('url' => '/Normal-User/location-update', 'files'=>true  ))!!}
          <div class="form-group">  
            <div class="input-group">

              <input type="text" class="form-control" placeholder="Enter Address" name="address" id="searchmap" autocomplete="off">
              <div class="input-group-append">
                 {!!Form::submit('Enter Location',['class'=>' btn btn-outline-secondary ']) !!}
              </div>
            </div>    
          </div>
          <div class="form-group">
            <div id="map-canvas">
            </div>
          </div>
          {!!Form::hidden('lat',null,['class'=>'form-control','id'=>'lat'])!!}
          {!!Form::hidden('lng',null,['class'=>'form-control','id'=>'lng'])!!}

          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
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
@endsection
