<?php $__env->startSection('content'); ?>
<?php
$users = \App\User::all();
 ?>
    <h3 class="page-title">
      تحضير الباركود للموظف
    </h3>
    <div class="panel panel-default">
          <div class="panel-body">
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputEmail1">
                اختر الموظف:
                </label>
                  <select class="form-control select" id="staff">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
              <small id="emailHelp" class="form-text text-muted">

                </small>
              </div>
            </div>
          </div>
          <br>
        <div class="panel-body">
          <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <li class="active" style="width:20%;">
                    <center>
                      <a href="#settings" data-toggle="tab"
                         aria-expanded="true" style="font-size:16px;color:#000;">
                        اعدادات عامة
                       </a>
                     </center>
                  </li>

                  <li style="width:20%;">
                    <center>
                      <a href="#codebare" data-toggle="tab" style="font-size:16px;color:#000;"
                         aria-expanded="true">
                         تعيين Code-bare
                       </a>
                  </li>

                  <li style="width:20%;">
                    <center>
                      <a href="#rqcode" data-toggle="tab" style="font-size:16px;color:#000;"
                         aria-expanded="true">
                         تعيين RQ-code
                       </a>
                         </center>
                  </li>

                  <li style="width:20%;">
                    <center>
                      <a href="#position" data-toggle="tab" style="font-size:16px;color:#000;"
                         aria-expanded="true">
                         تعيين مكان العمل
                       </a>
                         </center>
                  </li>

              </ul>
              <br><br>
              <div class="tab-content" >
                  <div class="tab-pane active" id="settings">
                      <div class="row">
                      </div>
                  </div>

                  <div class="tab-pane" id="codebare" >
                      <div class="row">
                        <div class="col-md-9">
                          <div class="form-group">
                            <input type="text" class="form-control" name="lng" id="code_bare_number"
                            placeholder="ادخل رقم الباركود أو الرقم الوظيفي">
                          </div>
                        </div>
                        <div class="col-md-3">
                            <center>
                          <button class="btn hos-success" style="width:100%;border: 1px solid #b4b7b98f;" id="br_generate">
                            <i class="fa fa-barcode" aria-hidden="true"></i>
                            تعيين Bare-code
                           </button>
                          </center>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane" id="rqcode">
                      <div class="row">
                        <div class="col-md-9">
                          <div class="form-group">
                            <input type="text" class="form-control" name="lng" id="code_rq_number"
                            placeholder="ادخل رقم RQ-code أو الرقم الوظيفي">
                          </div>
                        </div>
                        <div class="col-md-3">
                            <center>
                          <button class="btn hos-success" style="width:100%;border: 1px solid #b4b7b98f;" id="rq_generate">
                            <i class="fa fa-barcode" aria-hidden="true"></i>
                            تعيين RQ-code
                           </button>
                          </center>
                        </div>
                      </div>
                  </div>

                  <div class="tab-pane" id="position">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>
                              الطول:
                            </label>
                            <input type="text" class="form-control" name="lng" id="lng" value="-6.8146924">
                            <small id="emailHelp" class="form-text text-muted">

                            </small>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>
                            العرض:
                            </label>
                            <input type="text" class="form-control"  name="lat" id="lat" value="52.7601648">
                            <small id="emailHelp" class="form-text text-muted">

                            </small>
                          </div>

                        </div>

                        <div class="col-md-3">
                          <div class="form-group">
                            <label>
                          شعاع المكان: بالمتر
                            </label>
                            <input type="text" class="form-control"  name="lat" id="rayon" value="0">
                            <small id="emailHelp" class="form-text text-muted">
                              يمكن من تفادي الأخطاء المطروحة من GoogleMaps عند تحديد مكان الموظف
                            </small>
                          </div>

                        </div>

                        <div class="col-md-3">

                          <div class="form-group">
                            <center>
                            <label for="exampleInputEmail1">
                                تحديد الطول و العرض من خلال الخريطة:
                            </label>
                              <button  class="btn hos-info" id="br_maps" style="width:100%;border: 1px solid #b4b7b98f;">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                إظهار الخريطة
                             </button>
                           </center>
                          </div>
                        </div>
                      <div class="col-md-12">
                        <br>
                        <center>
                      <button class="btn hos-success" style="width:250px;border: 1px solid #b4b7b98f;" id="save_data">
                        <i class="fa fa-barcode" aria-hidden="true"></i>
                        حفظ المعطيات
                      </button>
                      </center>
                    </div>
                      </div>
                  </div>
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

            <button  class="btn hos-info" style="width:150px;" id="br_print">
              <i class="fa fa-print" aria-hidden="true"></i>
              <?php echo app('translator')->getFromJson('quickadmin.barcode.print'); ?>
             </button>

  				</div>
  				</div>
  			</div>
  		</div>
  	</div>


        <!-- Modal -->
        <div class="modal fade" role="dialog" id="br_maps_modal">
      		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content" style="border: 5px solid #b4b7b9ff;border-radius:10px;width: 100%;
        height: 600px;">
      				<div class="modal-body container" id="maps" style="width: 100%;
        height: 100%;position: relative;"></div>
      				<div class="modal-footer">
      					<div class="col-md-12">
                  <center>
      				    <button type="button" class="btn hos-danger" data-dismiss="modal" style="width:100px;border: 1px solid #b4b7b98f;">
                    <i class="fa fa-times" aria-hidden="true"></i>
      	                    غلق
      					</button>

                <button type="button" class="btn hos-primary" data-dismiss="modal" style="border: 1px solid #b4b7b98f;">
                  <i class="fa fa-check" aria-hidden="true"></i>
                        تعيين الطول و العرض
              </button>
            </center>

      				</div>
      				</div>
      			</div>
      		</div>
      	</div>

        <!-- Modal error The coordinates-->
        <div class="modal fade" role="dialog" id="br_show_modal">
      		<div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content" style="border: 5px solid #b4b7b98f;border-radius:10px;">
      				<div class="modal-body container">
                <br>
                <br>
                <div class="col-md-12" id="br_result" ></div>

              </div>
              <br>
              <br>
              <hr>
      				<div class="modal-footer">
      					<div class="col-md-12">
                  <center>
      				    <button type="button" class="btn hos-danger" data-dismiss="modal">
      	                    غلق
      					</button>

                <button  class="btn hos-info" style="width:150px;" id="get_latlng">
                  <i class="fa fa-print" aria-hidden="true"></i>
                  <?php echo app('translator')->getFromJson('quickadmin.barcode.print'); ?>
                 </button>
               </center>

      				</div>
      				</div>
      			</div>
      		</div>
      	</div>

           <!-- Modal -->
           <div class="modal fade" role="dialog" id="br_show_error_coordinate">
      		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content" style="border: 5px solid #b4b7b98f;border-radius:10px;">
      				<div class="modal-body container" style="width:500px;height:100px;">
                <br>
                <br>
                <div class="col-md-12" id="">
                        الاحداثيات غير صحيحة
                </div>
              </div>
              <br>
              <br>
              <hr>
      				<div class="modal-footer">
      					<div class="col-md-offset-6 col-md-6">

      				    <button type="button" class="btn hos-danger" data-dismiss="modal" style="width:100px;">
      	                    غلق
      					</button>

      				</div>
      				</div>
      			</div>
      		</div>
      	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script src="<?php echo e(url('js')); ?>/select.js"></script>
    <script type="text/javascript">
    function initMap() {
      var uluru = {lat: -25.344, lng: 131.036};
      var map = new google.maps.Map(document.getElementById('maps'), {zoom: 100, center: uluru});
      var marker = new google.maps.Marker({position: uluru, map: map});
    }
    $('document').ready(function(){
      $('#staff').select2();

      $.ajaxSetup({headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" }});
      $(document).on("click", "#br_generate", function()
      {
        $('#loading').modal('show');
        $.ajax({
      						 url: "<?php echo e(url('admin/ajax/barcode/generate')); ?>",
      						 method: 'get',
      						 data:{code:$('#code_bare_number').val(),staff:$('#staff').find(":selected").val(),},
      						 success: function(data)
      						 {
                     $('#loading').modal('toggle');
                       if(data[0] == 1)
                       {
                         $('#br_result').html(data[1]);
                         $('#br_show_modal').modal('show');

                       }
                       else {
                       Swal.fire('رقم الباركود مطلوب');
                       }
      						 }
      				});
    });

    $(document).on("click", "#rq_generate", function()
    {
      $('#loading').modal('show');
      $.ajax({
                 url: "<?php echo e(url('admin/ajax/rqcode/generate')); ?>",
                 method: 'get',
                 data:{code_rq:$('#code_rq_number').val(),staff:$('#staff').find(":selected").val(),},
                 success: function(data)
                 {
                   $('#loading').modal('toggle');
                     if(data[0] == 1)
                     {
                       $('#br_result').html(data[1]);
                       $('#br_show_modal').modal('show');

                     }
                     else {
                     Swal.fire('رقم RQ-code مطلوب');
                     }
                 }
            });
  });

    $(document).on("click", "#br_print", function()
    {
      $('#br_show_modal').modal('toggle');
      $('#loading').modal('show');
      $.ajax({
                 url: "<?php echo e(url('admin/ajax/barcode/download')); ?>",
                 method: 'get',
                 data:{code:$('#code_bare_number').val(),staff:$('#staff').find(":selected").val(),},
                 success: function(data)
                 {
                   $('#loading').modal('toggle');
                   bootoast.toast({
                            message: '<h4>تمت طباعة الباركود بنجاح</h4>',
                            type: 'success',
                            position: 'top',
                                   });
                    window.open("<?php echo e(url('admin/ajax/barcode/download?')); ?>code="+$('#code_bare_number').val()+"&staff="+$('#staff').find(":selected").val(), '_blank');
                 }
            });
  });

    });
    </script>

    <script src="<?php echo e(url('js')); ?>/select.js"></script>
        <script type="text/javascript">
              var lat = 38.0461842;
              var lng = 20.6227495;
        </script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHZBmHobUlGUjCLIII9cork3_Z_tvnqds&callback=initMap"></script>
        <script type="text/javascript">
        function initMap() {
          var uluru = {lat:lat , lng:lng};
          var map = new google.maps.Map(document.getElementById('maps'), {zoom: 10, center: uluru});
          var marker = new google.maps.Marker({position: uluru, map: map});

          google.maps.event.addListener(map, 'click', function( event ){
            $('#lat').val(event.latLng.lat());
            $('#lng').val(event.latLng.lng());

            var latlng = new google.maps.LatLng(event.latLng.lat(),event.latLng.lng());
            marker.setPosition(latlng);
        });
        }

        $('document').ready(function(){
          $('.staff_select').select2({
            noResults: "لــم يتم العثور على اي موظف.. تأكد من بحثك",
          });
          $.ajaxSetup({headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" }});

          $(document).on("click", "#br_maps", function()
          {
            lat = ($('#lat') && $('#lat').val().trim()!="")? parseFloat($('#lat').val().trim()) :lat;
            lng = ($('#lng') && $('#lng').val().trim()!="")? parseFloat($('#lng').val().trim()) :lng;

            if((lat && lng != "") &&  (lng && lng != "") )
            {
              initMap();
              $('#br_maps_modal').modal('show');
            }

            else {
              $('#br_show_error_coordinate').modal('show');
            }

          });

        $(document).on("click", "#save_data", function()
        {
          $('#loading').modal('show');
          $.ajax({
                     url: "<?php echo e(url('admin/ajax/lat/lng')); ?>",
                     method: 'get',
                     data:{lat:$('#lat').val(),lng:$('#lng').val(),staff:$('#staff').find(":selected").val(),},
                     success: function(data)
                     {
                       $('#loading').modal('toggle');
                      Swal.fire(data);
                     }
                });
      });
        });


        </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/admin/users/create_barecode.blade.php ENDPATH**/ ?>