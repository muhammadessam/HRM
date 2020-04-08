<?php $__env->startSection('content'); ?>
    <h3 class="page-title">

    </h3>

<?php
$status = \App\Model\Comleaving::where('user' , auth()->user()->id)->orderBy('created_at', 'desc')->first();
 ?>
    <div class="panel panel-default">
        <div class="panel-heading hos-info" style="font-size:20px;color:#000;">
            الحضور و الانصراف
        </div>
        <div class="panel-body">
            <div class="nav-tabs-custom">

                <div class="tab-content">
                    <div class="tab-pane active" id="basic">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                              <label for="exampleInputEmail1">
                              ادخل الباركود:
                              </label>
                              <input type="text" class="form-control" id="code" value="">
                              <input type="hidden" value="0" id="lng">
                              <input type="hidden" value="0" id="lat">
                              <input type="hidden" value="<?php echo e(date('H:m',time()+10000)); ?>" id="time">
                              <small class="form-text text-muted">
                                قم بمسح الباركود المرسل اليك من طرف الادارة
                              </small>
                            </div>
                            <hr>
                            <?php if($status == null): ?>
                            <div class="col-lg-6 form-group">
                              <center>
                                <button type="submit" class="btn hos-info" style="width:100%;font-size:24px;" id="staff_coming">
                                  <i class="fa fa-indent" aria-hidden="true"></i>
                                  تسجيل الحضــــور
                                </button>
                              </center>
                            </div>
                            <?php else: ?>
                                <?php if($status->status == 'l'): ?>
                                <div class="col-lg-6 form-group">
                                  <center>
                                    <button type="submit" class="btn hos-info" style="width:100%;font-size:24px;" id="staff_coming">
                                      <i class="fa fa-indent" aria-hidden="true"></i>
                                      تسجيل الحضــــور
                                    </button>
                                  </center>
                                </div>
                                <?php else: ?>
                                <div class="col-lg-6 form-group">
                                  <center>
                                    <button type="submit" class="btn hos-primary" style="width:100%;font-size:24px;" id="staff_leaving">
                                      <i class="fa fa-outdent" aria-hidden="true"></i>
                                      تسجيل الانصـــراف
                                    </button>
                                  </center>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
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



<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    ##parent-placeholder-b6e13ad53d8ec41b034c49f131c64e99cf25207a##
    <script type="text/javascript">
    function showPosition(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(position){ $('#lat').val(position.coords.latitude);$('#lng').val(position.coords.longitude);});}}
    $('document').ready(function(){
      showPosition();
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" }});
      $(document).on("click", "#staff_leaving", function()
      {
        $('#loading').modal('show');
        jQuery.get("<?php echo e(url('admin/ajax/leaving')); ?>",
            {
                lat:$('#lat').val(),
                lng:$('#lng').val(),
                time:$('#time').val(),
                code:$('#code').val()
            },
             function(data)
             {
                 $('#loading').modal('toggle');
                 if(data[0] == 1)
                 {
                   bootoast.toast({message: data[1],type: 'success',position: 'top',animationDuration: 1000,dismissible: true});
                 }
                 else
                 {
                  bootoast.toast({message: data[1],type: 'danger',position: 'top',animationDuration: 1000,dismissible: true});
                 }
             }
        );
    });

    $(document).on("click", "#staff_coming", function()
    {
      $('#loading').modal('show');
      jQuery.get("<?php echo e(url('admin/ajax/coming')); ?>",
          {
              lat:$('#lat').val(),
              lng:$('#lng').val(),
              time:$('#time').val(),
              code:$('#code').val()
          },
          function(data)
             {
                 $('#loading').modal('toggle');
                 if(data[0] == 1)
                 {
                   bootoast.toast({message: data[1],type: 'success',position: 'top',animationDuration: 1000,dismissible: true});
                 }
                 else
                 {
                  bootoast.toast({message: data[1],type: 'danger',position: 'top',animationDuration: 1000,dismissible: true});
                 }
             }
      );
  });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/admin/users/leaving_coming.blade.php ENDPATH**/ ?>