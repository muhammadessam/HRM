
        <div class="fresh-table toolbar-color-blue">
          <div class="toolbar">
          </div>

          <table id="fresh-table" class="table">
            <thead>
              <tr class="hos-info" style="width:100%;">
                <th data-field="id"><center>#</center></th>
                <th data-field="name" data-sortable="true">
                  <center>
                  الموظف
                  </center>
                </th>

                <th data-field="salary" data-sortable="true">
                  <center>
                الرقم الوظيفي
                  </center>
                </th>
                <th data-field="status" data-sortable="true">
                  <center>
                  الحالة
                  </center>
                </th>

                <th data-field="date" data-sortable="true">
                  <center>
                الوقت و التاريخ
                  </center>
                </th>

              </tr>
            </thead>
            <tbody>
             <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <th><center><?php echo e($item->id); ?></center></th>
                <th><center><?php echo e(\App\User::find($item->user)->name); ?></center></th>
                <th><center><?php echo e(\App\User::find($item->user)->matriculate); ?></center></th>
                <th>
                  <center>
                  <?php if($item->status == 'c'): ?>
                   <button type="button" class="btn btn-warning">
                    حاضر في الوقت الحالي
                   </button>
                   <?php endif; ?>


                   <?php if($item->status == 'l'): ?>
                   <button type="button" class="btn btn-danger">
                    خارج الدوام
                   </button>
                   <?php endif; ?>
                </center>
              </th>

                <th>
                    <center>
                      <?php echo e($item->created_at); ?>

                   <center>
                </th>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
<?php /**PATH /home/eskanaho/public_html/resources/views/admin/users/search-ajax.blade.php ENDPATH**/ ?>