<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="border: 5px solid #b4b7b98f;border-radius:10px;">
                <div class="panel-heading hof-info">
                  <h4>
                  <center>
                    تسجيل الحضور أو الانصراف
                   </center>
                 </h4>
                </div>
                <div class="panel-body">
                  <div class="panel-body">
                      <div class="nav-tabs-custom">

                          <div class="tab-content">
                              <div class="tab-pane active">
                                  <div class="row">
                                      <div class="col-lg-12 form-group">
                                        <label>
                                        ادخل الباركود:
                                        </label>
                                        <input type="text" class="form-control" id="code">
                                        <input type="hidden" value="0" id="lng">
                                        <input type="hidden" value="0" id="lat">
                                        <small class="form-text text-muted">
                                          قم بمسح الباركود الخاص بك
                                        </small>
                                      </div>
                                      <div class="col-lg-6 form-group">
                                        <center>
                                          <a href="#" class="btn hos-info" style="width:100%;font-size:24px;" id="c">
                                            <i class="fa fa-indent" aria-hidden="true"></i>
                                            تسجيل الحضــــور
                                          </a>
                                        </center>
                                      </div>
                                      <div class="col-lg-6 form-group">
                                        <center>
                                          <a  href="#" class="btn hos-primary" style="width:100%;font-size:24px;" id="l">
                                            <i class="fa fa-outdent" aria-hidden="true"></i>
                                        تسجيل الانصراف
                                      </a>
                                        </center>
                                      </div>

                                  </div>
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
    <script type="text/javascript">
    function showPosition(){if(navigator.geolocation){navigator.geolocation.getCurrentPosition(function(position){ $('#lat').val(position.coords.latitude);$('#lng').val(position.coords.longitude);});}}
    jQuery(document).ready(function(){
      var today = new Date();
      var time = (today.getHours()*3600)+(today.getMinutes()*60)+today.getSeconds();
      showPosition();
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>" }});

      $(document).on("click", "#l", function()
      {
        $('#loading').modal('show');
      $.ajax({
      						 url: "<?php echo e(url('leaving')); ?>",
      						 method: 'get',
      						// data:{lat:$('#lat').val(),lng:$('#lng').val(),code:$('#code').val(),time:time,},
      						 success: function(data)
      						 {
                     $('#loading').modal('toggle');
                     Swal.fire(data[1]);
      						 }
      				});
    });

    $(document).on("click", "#c", function()
    {
      $('#loading').modal('show');
      $.ajax({
                 url: "<?php echo e(url('coming')); ?>",
                 method: 'get',
                // data:{lat:$('#lat').val(),lng:$('#lng').val(),code:$('#code').val(),time:time,},
                 success: function(data)
                 {
                   $('#loading').modal('toggle');
                   Swal.fire(data[1]);
                 }
            });
  });

    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\eskanh\eskan\resources\views/auth/coming_leving.blade.php ENDPATH**/ ?>