<?php $__env->startSection('content'); ?>
    <div class="row" >
        <div class="dad col-md-8 col-lg-4 col-md-offset-2">
            <div class="panel panel-default mt-4" style="border: 5px solid #fff;
    border-radius: 10px;
    margin-top: 65px;
    padding: 40px 0px;
    box-shadow: 0 2px 20px 1px rgba(0,0,0,.11);">
            
           <style>
             Body{
             Background:white !important;
             }
             @media (min-width: 1200px){
.col-lg-4 {
    width: 33.33333333%;
    margin-right: 33% !important;
}
}
           </style>
                <div class="panel-heading hos-info" style="    background: #fff;
    color: black !important;
    margin: 20px 0px;
    box-shadow: 0 2px 20px 1px rgba(0,0,0,.11);
    width: 80%;
    margin-right: 10%;">
                  <h4 style="color:black;">
                  <center>
                  <?php echo e(ucfirst(config('app.name'))); ?> <?php echo app('translator')->getFromJson('quickadmin.qa_login'); ?>
                </center>
              </h4>
                </div>
                <div class="panel-body">

                    <?php if(count($errors) > 0): ?>
                        <div class="alert hos-danger">
                           </center>
                            <strong>
                              المعلومات التي ادخلت خاطئة
                            </strong>
                            </center>

                            <br><br>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal"
                          role="form"
                          method="POST" style="width: 80%;
    margin-right: 10%;"
                          action="<?php echo e(url('login')); ?>">
                        <input type="hidden"
                               name="_token"
                               value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo app('translator')->getFromJson('quickadmin.qa_email'); ?></label>

                            <div class="col-md-8">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="<?php echo e(old('email')); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label"><?php echo app('translator')->getFromJson('quickadmin.qa_password'); ?></label>

                            <div class="col-md-8">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-1">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> <?php echo app('translator')->getFromJson('quickadmin.qa_remember_me'); ?>
                                </label>
                            </div>
                        </div>
                        <hr style="border: 2px solid #b4b7b98f;border-radius:10px;width:104.5%;margin-right:-2.5%;">
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2" style="    width: 100%;
    margin-right: 10%;
    background: #eee;
    margin: 0;
    padding: 20px 0px;">
                               <center>
                                <button type="submit"
                                        class="btn hos-success mt-2"
                                        style="    font-size: 16px;
    font-weight: bold;
    width: 46%;
    margin-top: 4px;
    background: #333;
    border: none;
    color: white;">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php echo app('translator')->getFromJson('quickadmin.qa_login'); ?>
                                </button>

                                <a href="<?php echo e(route('auth.password.reset')); ?>"
                                     class="btn hos-primary mt-2"
                                     style="    color: #000;
    font-size: 16px;
    font-weight: bold;
    width: 46%;
    float: left;
    margin-left: 4%;
    margin-top: 4px;
    background: white;
    border: none;">
                                     <i class="fa fa-key" aria-hidden="true"></i>
                                  <?php echo app('translator')->getFromJson('quickadmin.qa_forgot_password'); ?>
                                </a>

                                <a href="<?php echo e(route('coming.leaving')); ?>"
                                   class="btn hos-info mt-2"
                                   style="    color: #000;
    font-size: 16px;
    font-weight: bold;
    margin-top: 12px;
    background: white;
    border: none;">
                                  <i class="fa fa-barcode" aria-hidden="true"></i>
                                  <?php echo app('translator')->getFromJson('quickadmin.coming_leaving'); ?>
                                </a>
                              </center>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/eskanaho/public_html/resources/views/auth/login.blade.php ENDPATH**/ ?>