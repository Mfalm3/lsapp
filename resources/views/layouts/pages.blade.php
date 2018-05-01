<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Farm Management Dashboard</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<!--link rel="stylesheet" href="{{asset('css/app.css')}}"-->
    <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/light-bootstrap-dashboard.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/animate.min.css')!!}">
    <link rel="stylesheet" href="{{asset('css/pe-icon-7-stroke.css')}}">

    <script src="{{asset("js/popper.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/jquery.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("js/light-bootstrap-dashboard.js")}}" type="text/javascript"></script>
    <!--script-- src="{{ asset('js/app.js') }}" defer></script-->
    <style>
        ul{
            list-style-type: none;
        }
        li.drp>a{
            color: #0b2e13;
        }
    </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="red" data-image="img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a class="simple-text">
                    {{config('app.name')}}
                </a>
            </div>
            <ul class="nav">
                <li>
                    <a href="/dashboard">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="pe-7s-note2"></i>
                        <p>ORDERS RECORDS
                <span class="glyphicon glyphicon-chevron-right pull-right" style="padding-top: 8px" aria-hidden="true"></span></p>
                    </a>
                    <ul class="drp">

                        <li>
                            <a href="/edit_order"><span class="glyphicon glyphicon-plus pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                Add Order
                            </a>
                        </li>
                        <li>
                            <a href="/view_order"><span class="glyphicon glyphicon-eye-open pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                View Orders
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="pe-7s-cash"></i>
                        <p>SALES RECORDS<span class="glyphicon glyphicon-chevron-right pull-right" style="padding-top: 8px" aria-hidden="true"></span></p>
                    </a>
                    <ul class="drp">

                        <li>
                            <a href="/edit_sales"><span class="glyphicon glyphicon-plus pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                Add Sale
                            </a>
                        </li>
                        <li>
                            <a href="/view_sales"><span class="glyphicon glyphicon-eye-open pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                View Sales
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="pe-7s-news-paper"></i>
                        <p>PURCHASES/EXPENSES<span class="glyphicon glyphicon-chevron-right pull-right" style="padding-top: 8px" aria-hidden="true"></span></p>
                    </a>
                    <ul class="drp">

                        <li>
                            <a href="/edit_expense"><span class="glyphicon glyphicon-plus pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                Add Expense
                            </a>
                        </li>
                        <li>
                            <a href="/view_expense"><span class="glyphicon glyphicon-eye-open pull-left" style="padding-top: 1px;padding-right: 10px;" aria-hidden="true"></span>
                                View Expenses
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/seedplant">
                        <i class="pe-7s-id"></i>
                        <p>SEED PLANT</p>
                    </a>
                </li>
                <li>
                    <a href="/seedlingplant">
                        <i class="pe-7s-note2"></i>
                        <p>SEEDLING RECORDS</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">{{$title}}</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li>
                                        <a href="#">
                                        Account
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                                <p>Log out</p>
                                            </form>

                                        </a>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
                </div>
            </div>



        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
<script type="text/javascript">
    $(".has-submenu ul").hide();
    $(".has-submenu > a").click(function() {
        $(this).next("ul").slideToggle();
    });


    var selector = '.nav li';
    $(selector).on('click', function(){
        $(selector).removeClass('active');
        $(this).addClass('active');
    });


    var el = $(".has-submenu a");
    $(".has-submenu").on( "click", function(event) {
        $(event.target).closest(el).find("span").toggleClass("glyphicon-chevron-right glyphicon-chevron-down");
    });

    /*$(function(){

        var url = window.location.pathname,
            urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); // create regexp to match current url pathname and remove trailing slash if present as it could collide with the link in navigation in case trailing slash wasn't present there
        // now grab every link from the navigation
        $('.nav li').each(function(){
            // and test its normalized href against the url pathname regexp
            if(urlRegExp.test(this.href.replace(/\/$/,''))){
                $(this).addClass('active');
            }
        });

    });*/
</script>

</body>


</html>
