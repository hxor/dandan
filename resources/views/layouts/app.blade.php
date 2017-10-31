<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>Ubold - Responsive Admin Dashboard Template</title>

    <link href="{{ url('/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href="{{ url('/') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="{{ url('/') }}/assets/js/modernizr.min.js"></script>

</head>


    <body>


        <div class="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default">
                    <div class="container">
                        <div class="">

                            <ul class="nav navbar-nav hidden-xs">
                               <div class="logo">
                                    <a href="{{ url('/') }}" class="logo"><span>laravel</span></a>
                                </div>
                            </ul>


                            <ul class="nav navbar-nav navbar-right pull-right">
                                <!-- Authentication Links -->
                                @guest
                                    <li class="navbar-c-items"><a href="{{ route('login') }}">Login</a></li>
                                    <li class="navbar-c-items"><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <li class="dropdown navbar-c-items">
                                        <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> {{ Auth::user()->name }} </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="ti-power-off text-danger m-r-10"></i> Logout
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->
    

            <div class="container">

                @yield('content')
            


                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-6">
                                © 2017. All rights reserved.
                            </div>
                            <div class="col-xs-6">
                                <ul class="pull-right list-inline m-b-0">
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ url('/') }}/assets/js/jquery.min.js"></script>
        <script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ url('/') }}/assets/js/detect.js"></script>
        <script src="{{ url('/') }}/assets/js/fastclick.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.blockUI.js"></script>
        <script src="{{ url('/') }}/assets/js/waves.js"></script>
        <script src="{{ url('/') }}/assets/js/wow.min.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.nicescroll.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App core js -->
        <script src="{{ url('/') }}/assets/js/jquery.core.js"></script>
        <script src="{{ url('/') }}/assets/js/jquery.app.js"></script>

    </body>
</html>
