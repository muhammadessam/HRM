@extends('layouts.app')

@section('content')
<?php
$users = \App\User::all();
 ?>
    <h3 class="page-title">
      تحضير الباركود للموظف
    </h3>
    <div class="panel panel-default">

        <div class="panel-body">

                        <div class="panel panel-default">
                            <div class="panel-body">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">
                                  اختر الموظف:
                                  </label>
                                    <select class="form-control staff" id="staff">
                                      @foreach($users as $user)
                                      <option value="{{$user->id}}">{{$user->name}}</option>
                                      @endforeach
                                    </select>
                                <small id="emailHelp" class="form-text text-muted">

                                  </small>
                                </div>
                              </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">
                                      الطول:
                                    </label>
                                    <input type="text" class="form-control" name="lng" id="lng">
                                    <small id="emailHelp" class="form-text text-muted">

                                    </small>
                                  </div>
                                </div>


                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>
                                    العرض:
                                    </label>
                                    <input type="text" class="form-control"  name="lat" id="lat">
                                    <small id="emailHelp" class="form-text text-muted">

                                    </small>
                                  </div>

                                </div>

                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        تحديد الطول و العرض من خلال الخريطة:
                                    </label>
                                      <button  class="btn hos-info" style="width:300px;" id="br_maps">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        إظهار الخريطة
                                     </button>
                                  </div>
                                </div>
                                 <hr>

                              <div class="col-md-12">
                                <br><br>
                                <center>
                              <button class="btn hos-success" style="width:150px;" id="save_data">
                                <i class="fa fa-barcode" aria-hidden="true"></i>
                                حفظ المعطيات
                              </button>
                              </center>
                            </div>
                            </div>
            </div>
        </div>
    </div>

    <!-- loading modal-->
    <div class="modal" id="loading" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document" style="margin-top: 25%;width:200px;border-radius:100px;">
    <div class="modal-content" style="margin-top: 25%;width:150px;border-radius:10px;">
    	<div class="modal-body">
        <center>
          <svg width="100" height="100" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient x1="8.042%" y1="0%" x2="65.682%" y2="23.865%" id="a">
                    <stop stop-color="#2386c8" stop-opacity="0" offset="0%"></stop>
                    <stop stop-color="#2386c8" stop-opacity=".631" offset="63.146%"></stop>
                    <stop stop-color="#2386c8" offset="100%"></stop>
                </linearGradient>
            </defs>
            <g fill="none" fill-rule="evenodd">
                <g transform="translate(1 1)">
                    <path d="M36 18c0-9.94-8.06-18-18-18" id="Oval-2" stroke="url(#a)" stroke-width="2" transform="rotate(325.696 18 18)">
                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1.5s" repeatCount="indefinite"></animateTransform>
                    </path>
                    <circle fill="#2386c8" cx="36" cy="18" r="1" transform="rotate(325.696 18 18)">
                        <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1.5s" repeatCount="indefinite"></animateTransform>
                    </circle>
                </g>
            </g>
        </svg>
        </center>
    	</div>
    </div>
    </div>
    </div>
    <!-- end loading modal-->

    <!-- Modal -->
    <div class="modal fade" role="dialog" id="br_maps_modal">
  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content" style="border: 5px solid #b4b7b98f;border-radius:10px;">
  				<div class="modal-body container" id="maps" style="width:500px;height:500px;"></div>
  				<div class="modal-footer">
  					<div class="col-md-offset-5 col-md-6">

  				    <button type="button" class="btn hos-info" data-dismiss="modal" style="width:100px;">
  	                    غلق
  					</button>

            <button type="button" class="btn hos-primary" data-dismiss="modal">
                    تعيين الطول و العرض
          </button>

  				</div>
  				</div>
  			</div>
  		</div>
  	</div>

    <!-- Modal -->
    <div class="modal fade" role="dialog" id="br_show_modal">
  		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content" style="border: 5px solid #b4b7b98f;border-radius:10px;">
  				<div class="modal-body container"  style="width:500px;height:100px;">
            <br>
            <br>
            <div class="col-md-12" id="br_result"></div>

          </div>
          <br>
          <br>
          <hr>
  				<div class="modal-footer">
  					<div class="col-md-offset-6 col-md-6">

  				    <button type="button" class="btn hos-danger" data-dismiss="modal" style="width:100px;">
  	                    غلق
  					</button>

            <button  class="btn hos-info" style="width:150px;" id="get_latlng">
              <i class="fa fa-print" aria-hidden="true"></i>
              @lang('quickadmin.barcode.print')
             </button>

  				</div>
  				</div>
  			</div>
  		</div>
  	</div>


@stop

@section('javascript')
    @parent
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHZBmHobUlGUjCLIII9cork3_Z_tvnqds&callback=initMap"></script>
    <script type="text/javascript">
    function initMap() {
      var uluru = {lat: -25.344, lng: 131.036};
      var map = new google.maps.Map(document.getElementById('maps'), {zoom: 100, center: uluru});
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
    $('document').ready(function(){
    $('.staff').select2();
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': "{{csrf_token()}}" }});

      $(document).on("click", "#br_maps", function()
      {
        $('#br_maps_modal').modal('show');
      });


    $(document).on("click", "#save_data", function()
    {
      $('#loading').modal('show');
      jQuery.get({
                 url: "{{url('admin/ajax/lat/lng')}}",
                 method: 'get',
                 data:{lat:$('#lat').val(),lng:$('#lng').val(),staff:$('#staff').find(":selected").val(),},
                 success: function(data)
                 {
                   $('#loading').modal('toggle');
                   bootoast.toast({  message:data,type: 'success',position: 'top',});
                 }
            });
  });

    });
    </script>

@stop
