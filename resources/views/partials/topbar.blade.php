<header class="main-header hos-info">
    <!-- Logo -->
    <a href="{{ url('/admin/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
           @lang('quickadmin.quickadmin_title')</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           @lang('quickadmin.quickadmin_title')</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="dropdown my-account">
            <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <span>@lang('quickadmin.account.title')</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item btn-block" href="{{ route('admin.users.show', auth()->id()) }}">
                    <i class="fa fa-user"></i>
                    <span>@lang('quickadmin.users.profile')</span>
                </a>
                <a class="dropdown-item btn-block" href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
                <a href="#logout" class="dropdown-item btn-block" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </div>
        </div>



    </nav>
</header>
