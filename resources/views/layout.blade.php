<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hệ thống quản lý khóa luận tốt nghiệp TLU</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/core.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/components.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/colors.css")}}" rel="stylesheet" type="text/css">
</head>
<body class="layout-boxed navbar-bottom">
<div class="navbar navbar-inverse">
    <div class="navbar-boxed">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route("home")}}"><img src="{{asset("assets/images/logo-update.png")}}" alt=""></a>
            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>
        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset("assets/images/flags/vn.png")}}" class="position-left" alt="">
                        Tiếng việt
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li><a class="ukrainian"><img src="{{asset("assets/images/flags/ua.png")}}" alt=""> Українська</a></li>
                        <li><a class="english"><img src="{{asset("assets/images/flags/gb.png")}}" alt=""> English</a></li>
                        <li><a class="espana"><img src="{{asset("assets/images/flags/es.png")}}" alt=""> España</a></li>
                        <li><a class="russian"><img src="{{asset("assets/images/flags/ru.png")}}" alt=""> Русский</a></li>
                    </ul>
                </li>

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset("assets/images/placeholder.jpg")}}" alt="">
                        <span>@if(Auth::guard("student")->check()) {{Auth::guard("student")->user()->code}} @else {{Auth::guard("employ")->user()->email}} @endif </span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> Thông tin cá nhân</a></li>
                        <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Thông báo</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route("auth.logout")}}"><i class="icon-switch2"></i> Đăng xuất</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> <small>Hello <b>@if(Auth::guard("student")->check()) {{Auth::guard("student")->user()->code}} @else {{Auth::guard("employ")->user()->email}} @endif</b></small></h4>
        </div>
    </div>
</div>
<div class="page-container">
    <div class="page-content">
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-title h6">
                        <span>Danh mục</span>
                        <ul class="icons-list">
                            <li><a href="#" data-action="collapse"></a></li>
                        </ul>
                    </div>

                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="/"><i class="icon-home4"></i> <span>Trang chủ</span></a></li>
                            @if(Auth::guard("employ")->check())
                                @if(Auth::guard("employ")->user()->auth == 1 || Auth::guard("employ")->user()->auth == 0)
                                    <li><a href="{{route("thuky.quanlysinhvien")}}"><i class=" icon-users4"></i> <span>Quản lý sinh viên</span></a></li>
                                    <li><a href="{{route("thuky.quanlygiangvien")}}"><i class=" icon-user-tie"></i> <span>Quản lý giảng viên</span></a></li>
                                    <li><a href="{{route("thuky.quanlylinhvuc")}}"><i class="icon-menu2"></i> <span>Quản lý lĩnh vực</span></a></li>
                                    <li><a href="{{route("thuky.quanlytopic")}}"><i class=" icon-menu6"></i> <span>Quản lý topic</span></a></li>
                                    @if(Auth::guard("employ")->user()->auth == 0)
                                        <li><a href="{{route("admin.quanlydotbaove")}}"><i class="icon-history"></i> <span>Quản lý đợt bảo vệ</span></a></li>
                                    @endif
                                    <li><a href="{{route("statistical")}}"><i class=" icon-pie-chart"></i> <span>Thống kê</span></a></li>
                                @endif
                            @endif

                            @if(Auth::guard("student")->check())
                                <li><a href="{{route("student.dangkytopic")}}"><i class="icon-file-plus"></i> <span>Đăng ký topic</span></a></li>
                                <li><a href="{{route("student.detaicuatoi")}}"><i class="icon-file-text"></i> <span>Topic của bạn</span></a></li>
                            @endif
                            @if(Auth::guard("employ")->check())
                                @if(Auth::guard("employ")->user()->auth == 2)
                                    <li><a href="{{route("lecturer.detaicuatoi")}}"><i class="icon-file-text"></i> <span>Topic của bạn</span></a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            @section("main-content")
            @show
        </div>
    </div>
</div>
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <div class="navbar-boxed">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="footer">
            <div class="navbar-text">
                &copy; 2018. <a href="#" class="navbar-link">ThangLong University</a> by <a href="#" class="navbar-link" target="_blank">Me&copy</a>
            </div>

            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset("assets/js/plugins/loaders/pace.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/core/libraries/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/core/libraries/bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("assets/js/plugins/loaders/blockui.min.js")}}"></script>
@section("script")
@show
</body>
</html>
