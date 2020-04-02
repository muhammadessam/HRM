<?php $__env->startSection('content'); ?>
<?php
$users = \App\User::all();
 ?>
    <h3 class="page-title">

    </h3>
    <div class="panel panel-default">
        <div class="panel-heading hos-info" style="font-size:20px;color:#000;">
           <span class="caption-subject bold uppercase font-dark">

           </span>
        </div>
        <div class="panel-body">
          <div class="col-md-5">
            <div class="form-group">
              <select class="form-control select" id="staff">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            <small id="emailHelp" class="form-text text-muted">

              </small>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <input type="date" class="form-control hos-date"  name="lat" id="from">
              <small id="emailHelp" class="form-text text-muted">

              </small>
            </div>

          </div>


            <div class="col-md-3">
              <div class="form-group">
                <input type="date" class="form-control hos-date"  name="lat" id="to">
                <small id="emailHelp" class="form-text text-muted">

                </small>
              </div>

            </div>

            <div class="col-md-1">
              <div class="form-group">
                  <button  class="btn hos-info" id="search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                 </button>
              </div>
            </div>
        </div>
    </div>

    <div class="wrapper" style="background-color:#eee;" id="result_search">
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
   <script src="<?php echo e(url('hos-dev/js')); ?>/table.js"></script>
    <script src="<?php echo e(url('js')); ?>/select.js"></script>
    <script type="text/javascript">
    $('document').ready(function(){
      $('#staff').select2();

      $(document).on("click", "#search", function()
      {
        $('#loading').modal('show');
        $.ajax({
                   url: "<?php echo e(url('admin/ajax/search')); ?>",
                   method: 'get',
                   data:{from:$('#from').val(),to:$('#to').val(),staff:$('#staff').find(":selected").val(),},
                   success: function(data)
                   {
                     $('#loading').modal('toggle');
                     $('#result_search').html(data);
                   }
              });
    });
    });
    </script>

    <script type="text/javascript">
      var $table = $('#fresh-table')
      var $alertBtn = $('#alertBtn')

      window.operateEvents = {
        'click .like': function (data) {
        },
        'click .edit': function (data) {
        },
        'click .remove': function (e, value, row, index) {
          $table.bootstrapTable('remove', {
            field: 'id',
            values: [row.id]
          })
        }
      }

      function operateFormatter(value, row, index) {
        return [
          '<a rel="tooltip" title="Like" class="hos hos-info like" href="javascript:void(0)">',
            '<i class="fa fa-eye" style="color:#fff;"></i>',
          '</a>',
          '<a rel="tooltip" title="Edit" class="hos hos-primary edit" href="javascript:void(0)">',
            '<i class="fa fa-edit" style="color:#fff;"></i>',
          '</a>',
          '<a rel="tooltip" title="Remove" class="hos hos-danger remove" href="javascript:void(0)">',
            '<i class="fa fa-trash" style="color:#fff;"></i>',
          '</a>'
        ].join('')
      }

      $(function () {
        $table.bootstrapTable({
          classes: 'table table-hover table-striped',
          toolbar: '.toolbar',
          search: true,
          showRefresh: true,
          showToggle: true,
          showColumns: true,
          pagination: true,
          striped: true,
          sortable: true,
          pageSize: 8,
          pageList: [8, 10, 25, 50, 100],

          formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return ''
          },
          formatRecordsPerPage: function (pageNumber) {
            return   pageNumber
          }
        })
      })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ensraf\resources\views/admin/users/leaving_coming_show.blade.php ENDPATH**/ ?>