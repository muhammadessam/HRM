

<?php $__env->startSection('content'); ?>
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
                              <div class="col-md-6">
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
                                 <div class="col-md-6">
                                   <div class="form-group">
                                     <label for="exampleInputEmail1">
                                      ادخل رقم الكودبار:
                                     </label>
                                     <input type="text" class="form-control" name="lng" id="code_bare_number">
                                     <small id="emailHelp" class="form-text text-muted">

                                     </small>
                                   </div>
                                 </div>
                              <div class="col-md-12">
                                <br><br>
                                <center>
                              <button class="btn hos-primary" style="width:150px;" id="br_generate">
                                <i class="fa fa-barcode" aria-hidden="true"></i>
                                <?php echo app('translator')->getFromJson('quickadmin.barcode.generate'); ?>
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
      								 console.log(data);
                       if(data[0] == 1)
                       {
                         $('#br_result').html(data[1]);
                         $('#br_show_modal').modal('show');

                       }
                       else {
                        // $('#br_error').modal('show');
                        bootoast.toast({message: 'رقم الباركود مطلوب',type: 'danger',position: 'top',});
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eskanaho/public_html/resources/views/admin/users/create_barecode.blade.php ENDPATH**/ ?>