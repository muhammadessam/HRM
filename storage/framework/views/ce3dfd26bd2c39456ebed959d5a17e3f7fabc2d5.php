<?php $__env->startSection('content'); ?>
  <form  action="<?php echo e(url('admin/position/'.$position->id.'/update')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            تعديل الموقع: <strong><?php echo e($position->title); ?></strong>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('title', trans('quickadmin.departments.fields.name').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('title', $position->title, ['class' => 'form-control', 'placeholder' => '', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-4 form-group">
                    <?php echo Form::label('lat', 'تحديد الطول'.'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('lat', $position->lat, ['class' => 'form-control', 'placeholder' => '', 'required' => ''  , 'id' => 'lat']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>

                <div class="col-xs-4 form-group">
                    <?php echo Form::label('lng', 'تحديد العرض'.'*', ['class' => 'control-label']); ?>

                    <?php echo Form::text('lng', $position->lng, ['class' => 'form-control', 'placeholder' => '', 'required' => '' , 'id' => 'lng']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('name')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('name')); ?>

                        </p>
                    <?php endif; ?>
                </div>

                <div class="col-xs-4 form-group">
                    <center>
                    <label for="exampleInputEmail1">
                        تحديد الطول و العرض من خلال الخريطة:
                    </label>
                      <a  class="btn hos-info" id="br_maps" style="width:100%;border: 1px solid #b4b7b98f;">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        إظهار الخريطة
                     </a>
                   </center>
                </div>
                <hr>
                <div class="col-xs-12 form-group">
                  <center>
                  <div class="col-6">
                    <button type="submit" class="btn hos-success">
                      <i class="fa fa-floppy-o" aria-hidden="true"></i>
                      حفظ المعطيات
                    </button>
                  </div>
                </center>
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


    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHZBmHobUlGUjCLIII9cork3_Z_tvnqds&callback=initMap"></script>
    <script type="text/javascript">
    var lat = <?php echo e($position->lat); ?>;
    var lng = <?php echo e($position->lng); ?>;
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

    });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eskanaho/public_html/resources/views/admin/position/edit.blade.php ENDPATH**/ ?>