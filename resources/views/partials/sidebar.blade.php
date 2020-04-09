@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">


            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>
            @if(auth()->user()->hasPermissionTo('experience_access') or
                 auth()->user()->hasPermissionTo('course_access') or
                 auth()->user()->hasPermissionTo('specialty_access') or
                 auth()->user()->hasPermissionTo('department_access') or
                 auth()->user()->hasPermissionTo('degree_access') or
                 auth()->user()->hasPermissionTo('vacation_access') or
                 auth()->user()->hasPermissionTo('aid_access') or
                 auth()->user()->hasPermissionTo('restDay_access') or
                 auth()->user()->hasPermissionTo('working_period_access')
            )
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                        <span>@lang('quickadmin.settings.title')</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('experience_access')
                            <li>
                                <a href="{{ route('admin.experiences.index') }}">
                                    <i class="fa fa-expand"></i>
                                    <span>@lang('quickadmin.experiences.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('course_access')
                            <li>
                                <a href="{{ route('admin.courses.index') }}">
                                    <i class="fa fa-battery-3"></i>
                                    <span>@lang('quickadmin.courses.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('specialty_access')
                            <li>
                                <a href="{{ route('admin.specialties.index') }}">
                                    <i class="fa fa-laptop"></i>
                                    <span>@lang('quickadmin.specialties.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('department_access')
                            <li>
                                <a href="{{ route('admin.departments.index') }}">
                                    <i class="fa fa-bookmark"></i>
                                    <span>@lang('quickadmin.departments.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('degree_access')
                            <li>
                                <a href="{{ route('admin.degrees.index') }}">
                                    <i class="fa fa-battery-3"></i>
                                    <span>@lang('quickadmin.degrees.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('vacation_access')
                            <li>
                                <a href="{{ route('admin.vacations.index') }}">
                                    <i class="fa fa-plane"></i>
                                    <span>@lang('quickadmin.vacation.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('aid_access')
                            <li>
                                <a href="{{ route('admin.aids.index') }}">
                                    <i class="fa fa-plane"></i>
                                    <span>@lang('quickadmin.aids.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('restDay_access')
                            <li>
                                <a href="{{ route('admin.rest_days.index') }}">
                                    <i class="fa fa-plane"></i>
                                    <span>@lang('quickadmin.restDays.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('working_period_access')
                            <li>
                                <a href="{{ route('admin.working_periods.index') }}">
                                    <i class="fa fa-calendar"></i>
                                    <span>@lang('quickadmin.working-periods.title')</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if(auth()->user()->hasPermissionTo('user_create'))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>@lang('quickadmin.users_direction.title')</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('user_create')
                            <li>
                                <a href="{{ route('admin.users.create') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>@lang('quickadmin.users.create_user')</span>
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li>
                                <a href="{{ route('admin.users.index') }}">
                                    <i class="fa fa-user"></i>
                                    <span>@lang('quickadmin.users.title')</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif

            @if(auth()->user()->hasPermissionTo('user_access') or
                 auth()->user()->hasPermissionTo('role_access') or
                 auth()->user()->hasPermissionTo('assign_aid_access') or
                 auth()->user()->hasPermissionTo('assign_rest_day_access') or
                 auth()->user()->hasPermissionTo('assign_working_period_access')
            )
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>@lang('quickadmin.user-management.title')</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('role_access')
                            <li>
                                <a href="{{ route('admin.roles.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>@lang('quickadmin.roles.title')</span>
                                </a>
                            </li>@endcan



                        @can('assign_aid_access')
                            <li>
                                <a href="{{ route('admin.assign_aids.index') }}">
                                    <i class="fa fa-plane"></i>
                                    <span>@lang('quickadmin.assign_aids.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('assign_rest_day_access')
                            <li>
                                <a href="{{ route('admin.assign_rest_days.index') }}">
                                    <i class="fa fa-plane"></i>
                                    <span>@lang('quickadmin.assign_rest_days.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('assign_working_period_access')
                            <li>
                                <a href="{{ route('admin.assign_working_periods.index') }}">
                                    <i class="fa fa-calendar"></i>
                                    <span>@lang('quickadmin.assign-working-periods.title')</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar"></i>
                    <span>الصلاحيات</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

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
                    @if(auth()->user()->hasPermissionTo('user_create'))
                        <li>
                            <a href="{{ route('admin.create.barecode')}}">
                                <i class="fa fa-briefcase"></i>
                                <span>
                              إنشاء باركود للموظفين
                              </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.create.maps')}}">
                                <i class="fa fa-briefcase"></i>
                                <span>
                           تعيين موقع الموظفين Map
                              </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.leaving_coming_staff_show')}}">
                                <i class="fa fa-briefcase"></i>
                                <span>
                                  حركة الموظفين
                                    </span>
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('admin.leaving_coming_staff')}}">
                            <i class="fa fa-briefcase"></i>
                            <span>
                                  تسجيل الحضور و الانصراف
                                </span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(auth()->user()->hasRole(1))
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
                        @if(auth()->user()->hasPermissionTo('user_create'))
                            <li>
                                <a href="{{ url('admin/position/create') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>
                            إضافة موقع جديد
                              </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('admin/position') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>
                          عرض كل المواقع
                              </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            @if(auth()->user()->hasPermissionTo('report_vacation_access') or
                auth()->user()->hasPermissionTo('report_user_access') or
                auth()->user()->hasPermissionTo('report_pointing_access')
                )
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>@lang('quickadmin.reports.title')</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('report_vacation_access')
                            <li>
                                <a href="{{ route('admin.reports.vacations.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>@lang('quickadmin.vacation.title')</span>
                                </a>
                            </li>
                        @endcan
                        @can('report_user_access')
                            <li>
                                <a href="{{ route('admin.reports.users.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>@lang('quickadmin.users.title')</span>
                                </a>
                            </li>
                        @endcan
                        @can('report_pointing_access')
                            <li>
                                <a href="{{ route('admin.reports.pointings.index') }}">
                                    <i class="fa fa-briefcase"></i>
                                    <span>@lang('quickadmin.pointings.title')</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @if(auth()->user()->hasPermissionTo('pointing_create') or
                 auth()->user()->hasPermissionTo('pointing_files_access')
            )
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>@lang('quickadmin.pointings_direction.title')</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left"></i>
                    </span>
                    </a>
                    <ul class="treeview-menu">
                        @can('pointing_files_access')
                            <li>
                                <a href="{{ route('admin.pointing_files.index') }}">
                                    <i class="fa fa-file"></i>
                                    <span>@lang('quickadmin.pointingFiles.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('pointing_create')
                            <li>
                                <a href="{{ route('admin.pointings.create') }}">
                                    <i class="fa fa-pencil"></i>
                                    <span>@lang('quickadmin.pointings.fields.manual_add')</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endif
            @if(auth()->user()->hasRole(4))
            <li>
                <a href="#">
                    <i class="far fa-paper-plane"></i>
                    اتصل بنا</a>
            </li>
            <li>
                <a href="#">
                     التعاميم
                </a>
            </li>
            <li>
                <a href="#">
                     الرواتب والمسيرات
                </a>
            </li>
            <li>
                <a href="#">
                     الانذارات
                </a>
            </li>
            @endif

        </ul>
    </section>
</aside>
