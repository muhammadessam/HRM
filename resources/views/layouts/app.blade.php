<!DOCTYPE html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    @include('partials.head')
    @yield('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .nav-collapse {
            margin-right: 230px !important;
        }
        .nav-expand {
            margin-right: 50px !important;
        }
        .section-collapse {
            margin-right: auto;
        }
        .section-expand {
            margin-right: 50px;
        }
    </style>
    <style type="text/css">
    .separator {
    display: flex;
    align-items: center;
    text-align: center;
    font-size: 24px;
}
.separator::before, .separator::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #000;
}
.separator::before {
    margin-right: .25em;
}
.separator::after {
    margin-left: .25em;
}
    .hos-success{color: #fff;background-color: #4caf50;border-color: #4caf50;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(76,175,80,.4);}
    .hos-info{color: #fff;background-color: #00bcd4;border-color: #00bcd4;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(0,188,212,.4);}
    .hos-primary{color: #fff;background-color: #9c27b0;border-color: #9c27b0;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(156,39,176,.4);}
    .hos-danger{color: #fff;background-color: #f44336;border-color: #f44336;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(244,67,54,.4)}
    .hos-warning{color: #fff;background-color: #ff9800;border-color: #ff9800;box-shadow: 0 4px 20px 0 rgba(0,0,0,.14), 0 7px 10px -5px rgba(255,152,0,.4);}
    .hos{display: inline-block;margin-bottom: 0;font-weight: normal;text-align: center; vertical-align: middle;cursor: pointer; background-image: none;border: 1px solid transparent;white-space: nowrap;padding: 6px 12px;font-size: 14px;line-height: 1.42857;border-radius: 0px;border-radius: 0 !important;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;}
    .hos-site{color:#fff;transition: all .2s ease-in-out;border-color: #5e72e4;background-color: #5e72e4;box-shadow: 0 4px 6px rgba(50,50,93,.11), 0 1px 3px rgba(0,0,0,.08);}
    </style>
</head>


<body class="hold-transition skin-blue sidebar-mini">

<div id="wrapper">

@include('partials.topbar')
@include('partials.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            @if(isset($siteTitle))
                <h3 class="page-title">
                    {{ $siteTitle }}
                </h3>
            @endif

            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">
                            <p>{{ Session::get('message') }}</p>
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-warning">
                            <p>{{ Session::get('error') }}</p>
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </section>
    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')

@yield('javascript')

<script>
    $(".sidebar-toggle").click(function () {
        if ($(".navbar.navbar-static-top").hasClass('nav-expand')) {
            $('.navbar.navbar-static-top').removeClass('nav-expand').addClass('nav-collapse');
            $('section.content').removeClass("section-expand").addClass("section-collapse");
        } else {
            $('.navbar.navbar-static-top').removeClass('nav-collapse').addClass('nav-expand');
            $('section.content').removeClass("section-collapse").addClass("section-expand");
        }
    });
</script>
</body>
</html>
