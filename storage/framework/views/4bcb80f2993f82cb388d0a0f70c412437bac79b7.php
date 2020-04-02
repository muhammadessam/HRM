<?php $request = app('Illuminate\Http\Request'); ?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">


            <li class="<?php echo e($request->segment(1) == 'home' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>">
                    <i class="fa fa-wrench"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_dashboard'); ?></span>
                </a>
            </li>

            <?php if(auth()->user()->hasPermissionTo('user_create')): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span><?php echo app('translator')->getFromJson('quickadmin.users_direction.title'); ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.users.create')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.users.create_user'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->hasPermissionTo('user_access') or
                 auth()->user()->hasPermissionTo('role_access') or
                 auth()->user()->hasPermissionTo('assign_aid_access') or
                 auth()->user()->hasPermissionTo('assign_rest_day_access') or
                 auth()->user()->hasPermissionTo('assign_working_period_access')
            ): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span><?php echo app('translator')->getFromJson('quickadmin.user-management.title'); ?></span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.roles.index')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.roles.title'); ?></span>
                                </a>
                            </li><?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.users.index')); ?>">
                                    <i class="fa fa-user"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_aid_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.assign_aids.index')); ?>">
                                    <i class="fa fa-plane"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.assign_aids.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_rest_day_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.assign_rest_days.index')); ?>">
                                    <i class="fa fa-plane"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.assign_rest_days.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign_working_period_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.assign_working_periods.index')); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.assign-working-periods.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->hasPermissionTo('pointing_create') or
                 auth()->user()->hasPermissionTo('pointing_files_access')
            ): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span><?php echo app('translator')->getFromJson('quickadmin.pointings_direction.title'); ?></span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_files_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.pointing_files.index')); ?>">
                                    <i class="fa fa-file"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.pointingFiles.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pointing_create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.pointings.create')); ?>">
                                    <i class="fa fa-pencil"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.pointings.fields.manual_add'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->hasPermissionTo('report_vacation_access') or
                auth()->user()->hasPermissionTo('report_user_access') or
                auth()->user()->hasPermissionTo('report_pointing_access')
                ): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span><?php echo app('translator')->getFromJson('quickadmin.reports.title'); ?></span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_vacation_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.reports.vacations.index')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.vacation.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_user_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.reports.users.index')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.users.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_pointing_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.reports.pointings.index')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.pointings.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->hasPermissionTo('experience_access') or
                 auth()->user()->hasPermissionTo('course_access') or
                 auth()->user()->hasPermissionTo('specialty_access') or
                 auth()->user()->hasPermissionTo('department_access') or
                 auth()->user()->hasPermissionTo('degree_access') or
                 auth()->user()->hasPermissionTo('vacation_access') or
                 auth()->user()->hasPermissionTo('aid_access') or
                 auth()->user()->hasPermissionTo('restDay_access') or
                 auth()->user()->hasPermissionTo('working_period_access')
            ): ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span><?php echo app('translator')->getFromJson('quickadmin.settings.title'); ?></span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('experience_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.experiences.index')); ?>">
                                    <i class="fa fa-expand"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.experiences.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.courses.index')); ?>">
                                    <i class="fa fa-battery-3"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.courses.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specialty_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.specialties.index')); ?>">
                                    <i class="fa fa-laptop"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.specialties.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.departments.index')); ?>">
                                    <i class="fa fa-bookmark"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.departments.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('degree_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.degrees.index')); ?>">
                                    <i class="fa fa-battery-3"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.degrees.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('vacation_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.vacations.index')); ?>">
                                    <i class="fa fa-plane"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.vacation.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('aid_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.aids.index')); ?>">
                                    <i class="fa fa-plane"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.aids.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('restDay_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.rest_days.index')); ?>">
                                    <i class="fa fa-plane"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.restDays.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('working_period_access')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.working_periods.index')); ?>">
                                    <i class="fa fa-calendar"></i>
                                    <span><?php echo app('translator')->getFromJson('quickadmin.working-periods.title'); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span><?php echo app('translator')->getFromJson('quickadmin.account.title'); ?></span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo e(route('admin.users.show', auth()->id())); ?>">
                            <i class="fa fa-user"></i>
                            <span><?php echo app('translator')->getFromJson('quickadmin.users.profile'); ?></span>
                        </a>
                    </li>

                    <li class="<?php echo e($request->segment(1) == 'change_password' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('auth.change_password')); ?>">
                            <i class="fa fa-key"></i>
                            <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_change_password'); ?></span>
                        </a>
                    </li>
                </ul>
            </li>


                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-table" aria-hidden="true"></i>
                      <span>
                        الحضور والانصراف
                      </span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                      <?php if(auth()->user()->hasPermissionTo('user_create')): ?>
                      <li>
                          <a href="<?php echo e(route('admin.create.barecode')); ?>">
                              <i class="fa fa-briefcase"></i>
                              <span>
                              إنشاء باركود للموظفين
                              </span>
                          </a>
                      </li>
                      <li>
                          <a href="<?php echo e(route('admin.create.maps')); ?>">
                              <i class="fa fa-briefcase"></i>
                              <span>
                           تعيين موقع الموظفين Map
                              </span>
                          </a>
                      </li>
                            <li>
                                <a href="<?php echo e(route('admin.leaving_coming_staff_show')); ?>">
                                    <i class="fa fa-briefcase"></i>
                                    <span>
                                  حركة الموظفين
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('admin.leaving_coming_staff')); ?>">
                                <i class="fa fa-briefcase"></i>
                                <span>
                                  تسجيل الحضور و الانصراف
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>


                                <li class="treeview">
                                    <a href="#">
                                      <i class="fa fa-table" aria-hidden="true"></i>
                                      <span>
                                    مواقع العمل
                                      </span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                      <?php if(auth()->user()->hasPermissionTo('user_create')): ?>
                                      <li>
                                          <a href="<?php echo e(url('admin/position/create')); ?>">
                                              <i class="fa fa-briefcase"></i>
                                              <span>
                                            إضافة موقع جديد
                                              </span>
                                          </a>
                                      </li>
                                      <li>
                                          <a href="<?php echo e(url('admin/position')); ?>">
                                              <i class="fa fa-briefcase"></i>
                                              <span>
                                          عرض كل المواقع
                                              </span>
                                          </a>
                                      </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title"><?php echo app('translator')->getFromJson('quickadmin.qa_logout'); ?></span>
                </a>
            </li>
        </ul>
    </section>
</aside>
<?php /**PATH D:\eskanh\eskan\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>