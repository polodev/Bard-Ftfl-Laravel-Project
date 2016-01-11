@extends('master/master')
@section('content')
    <script
        src="http://maps.googleapis.com/maps/api/js">
        </script>
        <script>
        var myCenter=new google.maps.LatLng(23.434564,91.132364);
        var marker;
        var infowindow;

        function initialize()
        {
        var mapProp = {
          center:myCenter,
          zoom:14,
          mapTypeId:google.maps.MapTypeId.ROADMAP
          };

        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          animation:google.maps.Animation.BOUNCE
          });
        
        var infowindow = new google.maps.InfoWindow({
          content:"BARD, Comilla"
        });
        
        marker.setMap(map);
        infowindow.open(map,marker);
        }
        
        google.maps.event.addDomListener(window, 'load', initialize);
         
    </script>
    <section class="content-2 col-12" style="background-color: rgb(255, 255, 255);">
        <div class="container col-md-8 col-md-offset-2">
            <h2 class="text-center">Contact Us</h2>
            <br><br>
            <div class="well well bs-component">
                <br><br>
                <form class="form-horizontal" method="post">
                    @if(session('status'))
                        <p class="alert alert-success">{{ session('status') }}</p>
                    @endif
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <fieldset>
        
                        <div class="form-group">
                            <label for="title" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">   
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control"  id="email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="content" class="col-lg-2 control-label">Phone Number</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">Message</label>
                            <div class="col-lg-10">
                                <textarea rows="5" class="form-control" id="message" name="message">{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit"class="btn btn-info">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-lg-2 control-label">BARD</label>
                            <div class="col-lg-10" id="googleMap" style="width:100%;height:600px;"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>       
    </section>
@endsection