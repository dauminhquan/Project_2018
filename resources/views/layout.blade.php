<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
   
    <link href="{{asset("assets/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/core.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/components.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("assets/css/colors.css")}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset("assets/js/plugins/loaders/pace.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/libraries/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/core/libraries/bootstrap.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/loaders/blockui.min.js")}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{asset("assets/js/plugins/visualization/d3/d3.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/visualization/d3/d3_tooltip.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/switchery.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/styling/uniform.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/ui/moment/moment.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/pickers/daterangepicker.js")}}"></script>
{{--//--}}
    <script type="text/javascript" src="{{asset("assets/js/core/app.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/pages/dashboard_boxed.js")}}"></script>
    <!-- /theme JS files -->

</head>

<body class="layout-boxed navbar-bottom">

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-boxed">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-git-compare"></i>
                        <span class="visible-xs-inline-block position-right">Git updates</span>
                        <span class="badge bg-warning-400">9</span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            Git updates
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-sync"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                                </div>

                                <div class="media-body">
                                    Drop the IE <a href="#">specific hacks</a> for temporal inputs
                                    <div class="media-annotation">4 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-warning text-warning btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-commit"></i></a>
                                </div>

                                <div class="media-body">
                                    Add full font overrides for popovers and tooltips
                                    <div class="media-annotation">36 minutes ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                                </div>

                                <div class="media-body">
                                    <a href="#">Chris Arney</a> created a new <span class="text-semibold">Design</span> branch
                                    <div class="media-annotation">2 hours ago</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                                </div>

                                <div class="media-body">
                                    <a href="#">Eugene Kopyov</a> merged <span class="text-semibold">Master</span> and <span class="text-semibold">Dev</span> branches
                                    <div class="media-annotation">Dec 18, 18:36</div>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                                </div>

                                <div class="media-body">
                                    Have Carousel ignore keyboard events
                                    <div class="media-annotation">Dec 12, 05:46</div>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All activity"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>
            </ul>

            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/flags/gb.png" class="position-left" alt="">
                        English
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="deutsch"><img src="assets/images/flags/de.png" alt=""> Deutsch</a></li>
                        <li><a class="ukrainian"><img src="assets/images/flags/ua.png" alt=""> Українська</a></li>
                        <li><a class="english"><img src="assets/images/flags/gb.png" alt=""> English</a></li>
                        <li><a class="espana"><img src="assets/images/flags/es.png" alt=""> España</a></li>
                        <li><a class="russian"><img src="assets/images/flags/ru.png" alt=""> Русский</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Messages</span>
                        <span class="badge bg-warning-400">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Messages
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body">
                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">5</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">James Alexander</span>
                                        <span class="media-annotation pull-right">04:58</span>
                                    </a>

                                    <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left">
                                    <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                    <span class="badge bg-danger-400 media-badge">4</span>
                                </div>

                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Margo Baker</span>
                                        <span class="media-annotation pull-right">12:16</span>
                                    </a>

                                    <span class="text-muted">That was something he was unable to do because...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Jeremy Victorino</span>
                                        <span class="media-annotation pull-right">22:48</span>
                                    </a>

                                    <span class="text-muted">But that would be extremely strained and suspicious...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Beatrix Diaz</span>
                                        <span class="media-annotation pull-right">Tue</span>
                                    </a>

                                    <span class="text-muted">What a strenuous career it is that I've chosen...</span>
                                </div>
                            </li>

                            <li class="media">
                                <div class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        <span class="text-semibold">Richard Vango</span>
                                        <span class="media-annotation pull-right">Mon</span>
                                    </a>

                                    <span class="text-muted">Other travelling salesmen live a life of luxury...</span>
                                </div>
                            </li>
                        </ul>

                        <div class="dropdown-content-footer">
                            <a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>
                        </div>
                    </div>
                </li>

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/placeholder.jpg" alt="">
                        <span>Victoria</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="#"><i class="icon-coins"></i> My balance</a></li>
                        <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i class="icon-comment-discussion"></i> Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page header -->
<div class="page-header">
    <div class="breadcrumb-line">
        <div class="breadcrumb-boxed">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>

            <ul class="breadcrumb-elements">
                <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear position-left"></i>
                        Settings
                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                        <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                        <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard <small>Hello, Victoria!</small></h4>
        </div>

        <div class="heading-elements">
            <div class="heading-btn-group">
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
                <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main sidebar-default">
            <div class="sidebar-content">

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-title h6">
                        <span>Main navigation</span>
                        <ul class="icons-list">
                            <li><a href="#" data-action="collapse"></a></li>
                        </ul>
                    </div>

                    <div class="category-content sidebar-user">
                        <div class="media">
                            <a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Victoria Baker</span>
                                <div class="text-size-mini text-muted">
                                    <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                                </div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">

                            <!-- Main -->
                            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                            <li><a href="index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                            <li>
                                <a href="#"><i class="icon-stack2"></i> <span>Page layouts</span></a>
                                <ul>
                                    <li><a href="layout_navbar_main_fixed.html">Fixed main navbar</a></li>
                                    <li><a href="layout_navbar_secondary_fixed.html">Fixed secondary navbar</a></li>
                                    <li><a href="layout_navbar_main_hideable.html">Hideable main navbar</a></li>
                                    <li><a href="layout_navbar_secondary_hideable.html">Hideable secondary navbar</a></li>
                                    <li><a href="layout_sidebar_sticky_custom.html">Sticky sidebar (custom scroll)</a></li>
                                    <li><a href="layout_sidebar_sticky_native.html">Sticky sidebar (native scroll)</a></li>
                                    <li><a href="layout_footer_fixed.html">Fixed footer</a></li>
                                    <li class="navigation-divider"></li>
                                    <li class="active"><a href="boxed_default.html">Boxed with default sidebar</a></li>
                                    <li><a href="boxed_mini.html">Boxed with mini sidebar</a></li>
                                    <li><a href="boxed_full.html">Boxed full width</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-copy"></i> <span>Layouts</span></a>
                                <ul>
                                    <li><a href="../../../layout_1/LTR/default/index.html" id="layout1">Layout 1</a></li>
                                    <li><a href="../../../layout_2/LTR/default/index.html" id="layout2">Layout 2</a></li>
                                    <li><a href="index.html" id="layout3">Layout 3 <span class="label bg-warning-400">Current</span></a></li>
                                    <li><a href="../../../layout_4/LTR/default/index.html" id="layout4">Layout 4</a></li>
                                    <li><a href="../../../layout_5/LTR/default/index.html" id="layout5">Layout 5</a></li>
                                    <li class="disabled"><a href="../../../layout_6/LTR/default/index.html" id="layout6">Layout 6 <span class="label label-transparent">Coming soon</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-droplet2"></i> <span>Color system</span></a>
                                <ul>
                                    <li><a href="colors_primary.html">Primary palette</a></li>
                                    <li><a href="colors_danger.html">Danger palette</a></li>
                                    <li><a href="colors_success.html">Success palette</a></li>
                                    <li><a href="colors_warning.html">Warning palette</a></li>
                                    <li><a href="colors_info.html">Info palette</a></li>
                                    <li class="navigation-divider"></li>
                                    <li><a href="colors_pink.html">Pink palette</a></li>
                                    <li><a href="colors_violet.html">Violet palette</a></li>
                                    <li><a href="colors_purple.html">Purple palette</a></li>
                                    <li><a href="colors_indigo.html">Indigo palette</a></li>
                                    <li><a href="colors_blue.html">Blue palette</a></li>
                                    <li><a href="colors_teal.html">Teal palette</a></li>
                                    <li><a href="colors_green.html">Green palette</a></li>
                                    <li><a href="colors_orange.html">Orange palette</a></li>
                                    <li><a href="colors_brown.html">Brown palette</a></li>
                                    <li><a href="colors_grey.html">Grey palette</a></li>
                                    <li><a href="colors_slate.html">Slate palette</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stack"></i> <span>Starter kit</span></a>
                                <ul>
                                    <li><a href="starters/horizontal_nav.html">Horizontal navigation</a></li>
                                    <li><a href="starters/1_col.html">1 column</a></li>
                                    <li><a href="starters/2_col.html">2 columns</a></li>
                                    <li>
                                        <a href="#">3 columns</a>
                                        <ul>
                                            <li><a href="starters/3_col_dual.html">Dual sidebars</a></li>
                                            <li><a href="starters/3_col_double.html">Double sidebars</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="starters/4_col.html">4 columns</a></li>
                                    <li><a href="starters/layout_boxed.html">Boxed layout</a></li>
                                    <li class="navigation-divider"></li>
                                    <li><a href="starters/layout_navbar_fixed_main.html">Fixed main navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_secondary.html">Fixed secondary navbar</a></li>
                                    <li><a href="starters/layout_navbar_fixed_both.html">Both navbars fixed</a></li>
                                    <li><a href="starters/layout_sidebar_sticky.html">Sticky sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="changelog.html"><i class="icon-list-unordered"></i> <span>Changelog <span class="label bg-blue-400">1.5</span></span></a></li>
                            <li><a href="../../RTL/default/index.html"><i class="icon-width"></i> <span>RTL version</span></a></li>
                            <!-- /main -->

                            <!-- Forms -->
                            <li class="navigation-header"><span>Forms</span> <i class="icon-menu" title="Forms"></i></li>
                            <li>
                                <a href="#"><i class="icon-pencil3"></i> <span>Form components</span></a>
                                <ul>
                                    <li><a href="form_inputs_basic.html">Basic inputs</a></li>
                                    <li><a href="form_checkboxes_radios.html">Checkboxes &amp; radios</a></li>
                                    <li><a href="form_input_groups.html">Input groups</a></li>
                                    <li><a href="form_controls_extended.html">Extended controls</a></li>
                                    <li><a href="form_floating_labels.html">Floating labels</a></li>
                                    <li>
                                        <a href="#">Selects</a>
                                        <ul>
                                            <li><a href="form_select2.html">Select2 selects</a></li>
                                            <li><a href="form_multiselect.html">Bootstrap multiselect</a></li>
                                            <li><a href="form_select_box_it.html">SelectBoxIt selects</a></li>
                                            <li><a href="form_bootstrap_select.html">Bootstrap selects</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="form_tag_inputs.html">Tag inputs</a></li>
                                    <li><a href="form_dual_listboxes.html">Dual Listboxes</a></li>
                                    <li><a href="form_editable.html">Editable forms</a></li>
                                    <li><a href="form_validation.html">Validation</a></li>
                                    <li><a href="form_inputs_grid.html">Inputs grid</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-file-css"></i> <span>JSON forms</span></a>
                                <ul>
                                    <li><a href="alpaca_basic.html">Basic inputs</a></li>
                                    <li><a href="alpaca_advanced.html">Advanced inputs</a></li>
                                    <li><a href="alpaca_controls.html">Controls</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-footprint"></i> <span>Wizards</span></a>
                                <ul>
                                    <li><a href="wizard_steps.html">Steps wizard</a></li>
                                    <li><a href="wizard_form.html">Form wizard</a></li>
                                    <li><a href="wizard_stepy.html">Stepy wizard</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-spell-check"></i> <span>Editors</span></a>
                                <ul>
                                    <li><a href="editor_summernote.html">Summernote editor</a></li>
                                    <li><a href="editor_ckeditor.html">CKEditor</a></li>
                                    <li><a href="editor_wysihtml5.html">WYSIHTML5 editor</a></li>
                                    <li><a href="editor_code.html">Code editor</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-select2"></i> <span>Pickers</span></a>
                                <ul>
                                    <li><a href="picker_date.html">Date &amp; time pickers</a></li>
                                    <li><a href="picker_color.html">Color pickers</a></li>
                                    <li><a href="picker_location.html">Location pickers</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-insert-template"></i> <span>Form layouts</span></a>
                                <ul>
                                    <li><a href="form_layout_vertical.html">Vertical form</a></li>
                                    <li><a href="form_layout_horizontal.html">Horizontal form</a></li>
                                </ul>
                            </li>
                            <!-- /forms -->

                            <!-- Appearance -->
                            <li class="navigation-header"><span>Appearance</span> <i class="icon-menu" title="Appearance"></i></li>
                            <li>
                                <a href="#"><i class="icon-grid"></i> <span>Components</span></a>
                                <ul>
                                    <li><a href="components_modals.html">Modals</a></li>
                                    <li><a href="components_dropdowns.html">Dropdown menus</a></li>
                                    <li><a href="components_tabs.html">Tabs component</a></li>
                                    <li><a href="components_pills.html">Pills component</a></li>
                                    <li><a href="components_navs.html">Accordion and navs</a></li>
                                    <li><a href="components_buttons.html">Buttons</a></li>
                                    <li><a href="components_notifications_pnotify.html">PNotify notifications</a></li>
                                    <li><a href="components_notifications_others.html">Other notifications</a></li>
                                    <li><a href="components_popups.html">Tooltips and popovers</a></li>
                                    <li><a href="components_alerts.html">Alerts</a></li>
                                    <li><a href="components_pagination.html">Pagination</a></li>
                                    <li><a href="components_labels.html">Labels and badges</a></li>
                                    <li><a href="components_loaders.html">Loaders and bars</a></li>
                                    <li><a href="components_thumbnails.html">Thumbnails</a></li>
                                    <li><a href="components_page_header.html">Page header</a></li>
                                    <li><a href="components_breadcrumbs.html">Breadcrumbs</a></li>
                                    <li><a href="components_media.html">Media objects</a></li>
                                    <li><a href="components_affix.html">Affix and Scrollspy</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-puzzle2"></i> <span>Content appearance</span></a>
                                <ul>
                                    <li><a href="appearance_content_panels.html">Content panels</a></li>
                                    <li><a href="appearance_panel_heading.html">Panel heading elements</a></li>
                                    <li><a href="appearance_panel_footer.html">Panel footer elements</a></li>
                                    <li><a href="appearance_draggable_panels.html">Draggable panels</a></li>
                                    <li><a href="appearance_text_styling.html">Text styling</a></li>
                                    <li><a href="appearance_typography.html">Typography</a></li>
                                    <li><a href="appearance_helpers.html">Helper classes</a></li>
                                    <li><a href="appearance_syntax_highlighter.html">Syntax highlighter</a></li>
                                    <li><a href="appearance_content_grid.html">Grid system</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-gift"></i> <span>Extra components</span></a>
                                <ul>
                                    <li><a href="extra_sliders_noui.html">NoUI sliders</a></li>
                                    <li><a href="extra_sliders_ion.html">Ion range sliders</a></li>
                                    <li><a href="extra_session_timeout.html">Session timeout</a></li>
                                    <li><a href="extra_idle_timeout.html">Idle timeout</a></li>
                                    <li><a href="extra_trees.html">Dynamic tree views</a></li>
                                    <li><a href="extra_context_menu.html">Context menu</a></li>
                                    <li><a href="extra_fab.html">Floating action buttons</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-spinner2 spinner"></i> <span>Animations</span></a>
                                <ul>
                                    <li><a href="animations_css3.html">CSS3 animations</a></li>
                                    <li>
                                        <a href="#">Velocity animations</a>
                                        <ul>
                                            <li><a href="animations_velocity_basic.html">Basic usage</a></li>
                                            <li><a href="animations_velocity_ui.html">UI pack effects</a></li>
                                            <li><a href="animations_velocity_examples.html">Advanced examples</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-thumbs-up2"></i> <span>Icons</span></a>
                                <ul>
                                    <li><a href="icons_glyphicons.html">Glyphicons</a></li>
                                    <li><a href="icons_icomoon.html">Icomoon</a></li>
                                    <li><a href="icons_fontawesome.html">Font awesome</a></li>
                                </ul>
                            </li>
                            <!-- /appearance -->

                            <!-- Layout -->
                            <li class="navigation-header"><span>Layout</span> <i class="icon-menu" title="Layout options"></i></li>
                            <li>
                                <a href="#"><i class="icon-indent-decrease2"></i> <span>Sidebars</span></a>
                                <ul>
                                    <li><a href="sidebar_default_collapse.html">Default collapsible</a></li>
                                    <li><a href="sidebar_default_hide.html">Default hideable</a></li>
                                    <li><a href="sidebar_mini_collapse.html">Mini collapsible</a></li>
                                    <li><a href="sidebar_mini_hide.html">Mini hideable</a></li>
                                    <li>
                                        <a href="#">Dual sidebar</a>
                                        <ul>
                                            <li><a href="sidebar_dual.html">Dual sidebar</a></li>
                                            <li><a href="sidebar_dual_double_collapse.html">Dual double collapse</a></li>
                                            <li><a href="sidebar_dual_double_hide.html">Dual double hide</a></li>
                                            <li><a href="sidebar_dual_swap.html">Swap sidebars</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Double sidebar</a>
                                        <ul>
                                            <li><a href="sidebar_double_collapse.html">Collapse main sidebar</a></li>
                                            <li><a href="sidebar_double_hide.html">Hide main sidebar</a></li>
                                            <li><a href="sidebar_double_fix_default.html">Fix default width</a></li>
                                            <li><a href="sidebar_double_fix_mini.html">Fix mini width</a></li>
                                            <li><a href="sidebar_double_visible.html">Opposite sidebar visible</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="sidebar_categories.html">Separate categories</a></li>
                                    <li><a href="sidebar_hidden.html">Hidden sidebar</a></li>
                                    <li><a href="sidebar_dark.html">Dark sidebar</a></li>
                                    <li><a href="sidebar_components.html">Sidebar components</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-sort"></i> <span>Vertical navigation</span></a>
                                <ul>
                                    <li><a href="navigation_vertical_collapsible.html">Collapsible menu</a></li>
                                    <li><a href="navigation_vertical_accordion.html">Accordion menu</a></li>
                                    <li><a href="navigation_vertical_sizing.html">Navigation sizing</a></li>
                                    <li><a href="navigation_vertical_bordered.html">Bordered navigation</a></li>
                                    <li><a href="navigation_vertical_right_icons.html">Right icons</a></li>
                                    <li><a href="navigation_vertical_labels_badges.html">Labels and badges</a></li>
                                    <li><a href="navigation_vertical_disabled.html">Disabled navigation links</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-transmission"></i> <span>Horizontal navigation</span></a>
                                <ul>
                                    <li><a href="navigation_horizontal_click.html">Submenu on click</a></li>
                                    <li><a href="navigation_horizontal_hover.html">Submenu on hover</a></li>
                                    <li><a href="navigation_horizontal_elements.html">With custom elements</a></li>
                                    <li><a href="navigation_horizontal_tabs.html">Tabbed navigation</a></li>
                                    <li><a href="navigation_horizontal_disabled.html">Disabled navigation links</a></li>
                                    <li><a href="navigation_horizontal_mega.html">Horizontal mega menu</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-menu3"></i> <span>Navbars</span></a>
                                <ul>
                                    <li><a href="navbar_single.html">Single navbar</a></li>
                                    <li>
                                        <a href="#">Multiple navbars</a>
                                        <ul>
                                            <li><a href="navbar_multiple_navbar_navbar.html">Navbar + navbar</a></li>
                                            <li><a href="navbar_multiple_header_navbar.html">Header + navbar</a></li>
                                            <li><a href="navbar_multiple_navbar_content.html">Navbar + content</a></li>
                                            <li><a href="navbar_multiple_top_bottom.html">Top + bottom</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="navbar_colors.html">Color options</a></li>
                                    <li><a href="navbar_sizes.html">Sizing options</a></li>
                                    <li><a href="navbar_hideable.html">Hide on scroll</a></li>
                                    <li><a href="navbar_components.html">Navbar components</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-tree5"></i> <span>Menu levels</span></a>
                                <ul>
                                    <li><a href="#"><i class="icon-IE"></i> Second level</a></li>
                                    <li>
                                        <a href="#"><i class="icon-firefox"></i> Second level with child</a>
                                        <ul>
                                            <li><a href="#"><i class="icon-android"></i> Third level</a></li>
                                            <li>
                                                <a href="#"><i class="icon-apple2"></i> Third level with child</a>
                                                <ul>
                                                    <li><a href="#"><i class="icon-html5"></i> Fourth level</a></li>
                                                    <li><a href="#"><i class="icon-css3"></i> Fourth level</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#"><i class="icon-windows"></i> Third level</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="icon-chrome"></i> Second level</a></li>
                                </ul>
                            </li>
                            <!-- /layout -->

                            <!-- Data visualization -->
                            <li class="navigation-header"><span>Data visualization</span> <i class="icon-menu" title="Data visualization"></i></li>
                            <li>
                                <a href="#"><i class="icon-graph"></i> <span>Echarts library</span></a>
                                <ul>
                                    <li><a href="echarts_lines_areas.html">Lines and areas</a></li>
                                    <li><a href="echarts_columns_waterfalls.html">Columns and waterfalls</a></li>
                                    <li><a href="echarts_bars_tornados.html">Bars and tornados</a></li>
                                    <li><a href="echarts_scatter.html">Scatter charts</a></li>
                                    <li><a href="echarts_pies_donuts.html">Pies and donuts</a></li>
                                    <li><a href="echarts_funnels_chords.html">Funnels and chords</a></li>
                                    <li><a href="echarts_candlesticks_others.html">Candlesticks and others</a></li>
                                    <li><a href="echarts_combinations.html">Chart combinations</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-statistics"></i> <span>D3 library</span></a>
                                <ul>
                                    <li><a href="d3_lines_basic.html">Simple lines</a></li>
                                    <li><a href="d3_lines_advanced.html">Advanced lines</a></li>
                                    <li><a href="d3_bars_basic.html">Simple bars</a></li>
                                    <li><a href="d3_bars_advanced.html">Advanced bars</a></li>
                                    <li><a href="d3_pies.html">Pie charts</a></li>
                                    <li><a href="d3_circle_diagrams.html">Circle diagrams</a></li>
                                    <li><a href="d3_tree.html">Tree layout</a></li>
                                    <li><a href="d3_other.html">Other charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stats-dots"></i> <span>Dimple library</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Line charts</a>
                                        <ul>
                                            <li><a href="dimple_lines_horizontal.html">Horizontal orientation</a></li>
                                            <li><a href="dimple_lines_vertical.html">Vertical orientation</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Bar charts</a>
                                        <ul>
                                            <li><a href="dimple_bars_horizontal.html">Horizontal orientation</a></li>
                                            <li><a href="dimple_bars_vertical.html">Vertical orientation</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Area charts</a>
                                        <ul>
                                            <li><a href="dimple_area_horizontal.html">Horizontal orientation</a></li>
                                            <li><a href="dimple_area_vertical.html">Vertical orientation</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Step charts</a>
                                        <ul>
                                            <li><a href="dimple_step_horizontal.html">Horizontal orientation</a></li>
                                            <li><a href="dimple_step_vertical.html">Vertical orientation</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="dimple_pies.html">Pie charts</a></li>
                                    <li><a href="dimple_rings.html">Ring charts</a></li>
                                    <li><a href="dimple_scatter.html">Scatter charts</a></li>
                                    <li><a href="dimple_bubble.html">Bubble charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-stats-bars"></i> <span>C3 library</span></a>
                                <ul>
                                    <li><a href="c3_lines_areas.html">Lines and areas</a></li>
                                    <li><a href="c3_bars_pies.html">Bars and pies</a></li>
                                    <li><a href="c3_advanced.html">Advanced examples</a></li>
                                    <li><a href="c3_axis.html">Chart axis</a></li>
                                    <li><a href="c3_grid.html">Grid options</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-google"></i> <span>Google visualization</span></a>
                                <ul>
                                    <li><a href="google_lines.html">Line charts</a></li>
                                    <li><a href="google_bars.html">Bar charts</a></li>
                                    <li><a href="google_pies.html">Pie charts</a></li>
                                    <li><a href="google_scatter_bubble.html">Bubble &amp; scatter charts</a></li>
                                    <li><a href="google_other.html">Other charts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-map5"></i> <span>Maps integration</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Google maps</a>
                                        <ul>
                                            <li><a href="maps_google_basic.html">Basics</a></li>
                                            <li><a href="maps_google_controls.html">Controls</a></li>
                                            <li><a href="maps_google_markers.html">Markers</a></li>
                                            <li><a href="maps_google_drawings.html">Map drawings</a></li>
                                            <li><a href="maps_google_layers.html">Layers</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="maps_vector.html">Vector maps</a></li>
                                </ul>
                            </li>
                            <!-- /data visualization -->

                            <!-- Extensions -->
                            <li class="navigation-header"><span>Extensions</span> <i class="icon-menu" title="Extensions"></i></li>
                            <li>
                                <a href="#"><i class="icon-puzzle4"></i> <span>Extensions</span></a>
                                <ul>
                                    <li><a href="extension_image_cropper.html">Image cropper</a></li>
                                    <li><a href="extension_blockui.html">Block UI</a></li>
                                    <li><a href="extension_dnd.html">Drag and drop</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-popout"></i> <span>JQuery UI</span></a>
                                <ul>
                                    <li><a href="jqueryui_interactions.html">Interactions</a></li>
                                    <li><a href="jqueryui_forms.html">Forms</a></li>
                                    <li><a href="jqueryui_components.html">Components</a></li>
                                    <li><a href="jqueryui_sliders.html">Sliders</a></li>
                                    <li><a href="jqueryui_navigation.html">Navigation</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-upload"></i> <span>File uploaders</span></a>
                                <ul>
                                    <li><a href="uploader_plupload.html">Plupload</a></li>
                                    <li><a href="uploader_bootstrap.html">Bootstrap file uploader</a></li>
                                    <li><a href="uploader_dropzone.html">Dropzone</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-calendar3"></i> <span>Event calendars</span></a>
                                <ul>
                                    <li><a href="extension_fullcalendar_views.html">Basic views</a></li>
                                    <li><a href="extension_fullcalendar_styling.html">Event styling</a></li>
                                    <li><a href="extension_fullcalendar_formats.html">Language and time</a></li>
                                    <li><a href="extension_fullcalendar_advanced.html">Advanced usage</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-sphere"></i> <span>Internationalization</span></a>
                                <ul>
                                    <li><a href="internationalization_switch_direct.html">Direct translation</a></li>
                                    <li><a href="internationalization_switch_query.html">Querystring parameter</a></li>
                                    <li><a href="internationalization_on_init.html">Set language on init</a></li>
                                    <li><a href="internationalization_after_init.html">Set language after init</a></li>
                                    <li><a href="internationalization_fallback.html">Language fallback</a></li>
                                    <li><a href="internationalization_callbacks.html">Callbacks</a></li>
                                </ul>
                            </li>
                            <!-- /extensions -->

                            <!-- Tables -->
                            <li class="navigation-header"><span>Tables</span> <i class="icon-menu" title="Tables"></i></li>
                            <li>
                                <a href="#"><i class="icon-table2"></i> <span>Basic tables</span></a>
                                <ul>
                                    <li><a href="table_basic.html">Basic examples</a></li>
                                    <li><a href="table_sizing.html">Table sizing</a></li>
                                    <li><a href="table_borders.html">Table borders</a></li>
                                    <li><a href="table_styling.html">Table styling</a></li>
                                    <li><a href="table_elements.html">Table elements</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-grid7"></i> <span>Data tables</span></a>
                                <ul>
                                    <li><a href="datatable_basic.html">Basic initialization</a></li>
                                    <li><a href="datatable_styling.html">Basic styling</a></li>
                                    <li><a href="datatable_advanced.html">Advanced examples</a></li>
                                    <li><a href="datatable_sorting.html">Sorting options</a></li>
                                    <li><a href="datatable_api.html">Using API</a></li>
                                    <li><a href="datatable_data_sources.html">Data sources</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-alignment-unalign"></i> <span>Data tables extensions</span></a>
                                <ul>
                                    <li><a href="datatable_extension_reorder.html">Columns reorder</a></li>
                                    <li><a href="datatable_extension_row_reorder.html">Row reorder</a></li>
                                    <li><a href="datatable_extension_fixed_columns.html">Fixed columns</a></li>
                                    <li><a href="datatable_extension_fixed_header.html">Fixed header</a></li>
                                    <li><a href="datatable_extension_autofill.html">Auto fill</a></li>
                                    <li><a href="datatable_extension_key_table.html">Key table</a></li>
                                    <li><a href="datatable_extension_scroller.html">Scroller</a></li>
                                    <li><a href="datatable_extension_select.html">Select</a></li>
                                    <li>
                                        <a href="#">Buttons</a>
                                        <ul>
                                            <li><a href="datatable_extension_buttons_init.html">Initialization</a></li>
                                            <li><a href="datatable_extension_buttons_flash.html">Flash buttons</a></li>
                                            <li><a href="datatable_extension_buttons_print.html">Print buttons</a></li>
                                            <li><a href="datatable_extension_buttons_html5.html">HTML5 buttons</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="datatable_extension_colvis.html">Columns visibility</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-file-spreadsheet"></i> <span>Handsontable</span></a>
                                <ul>
                                    <li><a href="handsontable_basic.html">Basic configuration</a></li>
                                    <li><a href="handsontable_advanced.html">Advanced setup</a></li>
                                    <li><a href="handsontable_cols.html">Column features</a></li>
                                    <li><a href="handsontable_cells.html">Cell features</a></li>
                                    <li><a href="handsontable_types.html">Basic cell types</a></li>
                                    <li><a href="handsontable_custom_checks.html">Custom &amp; checkboxes</a></li>
                                    <li><a href="handsontable_ac_password.html">Autocomplete &amp; password</a></li>
                                    <li><a href="handsontable_search.html">Search</a></li>
                                    <li><a href="handsontable_context.html">Context menu</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-versions"></i> <span>Responsive options</span></a>
                                <ul>
                                    <li><a href="table_responsive.html">Responsive basic tables</a></li>
                                    <li><a href="datatable_responsive.html">Responsive data tables</a></li>
                                </ul>
                            </li>
                            <!-- /tables -->

                            <!-- Page kits -->
                            <li class="navigation-header"><span>Page kits</span> <i class="icon-menu" title="Page kits"></i></li>
                            <li>
                                <a href="#"><i class="icon-grid6"></i> <span>General pages</span></a>
                                <ul>
                                    <li><a href="general_feed.html">Feed</a></li>
                                    <li><a href="general_widgets_content.html">Content widgets</a></li>
                                    <li class="disabled"><a href="general_widgets_stats.html">Statistics widgets <span class="label label-transparent">in 1.6</span></a></li>
                                    <li><a href="general_embeds.html">Embeds</a></li>
                                    <li><a href="general_faq.html">FAQ page</a></li>
                                    <li><a href="general_knowledgebase.html">Knowledgebase</a></li>
                                    <li>
                                        <a href="#">Blog</a>
                                        <ul>
                                            <li><a href="blog_classic_v.html">Classic vertical</a></li>
                                            <li><a href="blog_classic_h.html">Classic horizontal</a></li>
                                            <li><a href="blog_grid.html">Grid</a></li>
                                            <li><a href="blog_single.html">Single post</a></li>
                                            <li class="navigation-divider"></li>
                                            <li><a href="blog_sidebar_left.html">Left sidebar</a></li>
                                            <li><a href="blog_sidebar_right.html">Right sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Timelines</a>
                                        <ul>
                                            <li><a href="timelines_left.html">Left timeline</a></li>
                                            <li><a href="timelines_right.html">Right timeline</a></li>
                                            <li><a href="timelines_center.html">Centered timeline</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Gallery</a>
                                        <ul>
                                            <li><a href="gallery_grid.html">Media grid</a></li>
                                            <li><a href="gallery_titles.html">Media with titles</a></li>
                                            <li><a href="gallery_description.html">Media with description</a></li>
                                            <li><a href="gallery_library.html">Media library</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-wrench3"></i> <span>Service pages</span></a>
                                <ul>
                                    <li><a href="service_sitemap.html">Sitemap</a></li>
                                    <li>
                                        <a href="#">Invoicing</a>
                                        <ul>
                                            <li><a href="invoice_template.html">Invoice template</a></li>
                                            <li><a href="invoice_grid.html">Invoice grid</a></li>
                                            <li><a href="invoice_archive.html">Invoice archive</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Authentication</a>
                                        <ul>
                                            <li><a href="login_simple.html">Simple login</a></li>
                                            <li><a href="login_advanced.html">More login info</a></li>
                                            <li><a href="login_registration.html">Simple registration</a></li>
                                            <li><a href="login_registration_advanced.html">More registration info</a></li>
                                            <li><a href="login_unlock.html">Unlock user</a></li>
                                            <li><a href="login_password_recover.html">Reset password</a></li>
                                            <li><a href="login_hide_navbar.html">Hide navbar</a></li>
                                            <li><a href="login_transparent.html">Transparent box</a></li>
                                            <li><a href="login_background.html">Background option</a></li>
                                            <li><a href="login_validation.html">With validation</a></li>
                                            <li><a href="login_tabbed.html">Tabbed form</a></li>
                                            <li><a href="login_modals.html">Inside modals</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Error pages</a>
                                        <ul>
                                            <li><a href="error_403.html">Error 403</a></li>
                                            <li><a href="error_404.html">Error 404</a></li>
                                            <li><a href="error_405.html">Error 405</a></li>
                                            <li><a href="error_500.html">Error 500</a></li>
                                            <li><a href="error_503.html">Error 503</a></li>
                                            <li><a href="error_offline.html">Offline page</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-people"></i> <span>User pages</span></a>
                                <ul>
                                    <li><a href="user_pages_list.html">User list</a></li>
                                    <li><a href="user_pages_cards.html">User cards</a></li>
                                    <li><a href="user_pages_profile.html">Simple profile</a></li>
                                    <li><a href="user_pages_profile_tabbed.html">Tabbed profile</a></li>
                                    <li><a href="user_pages_profile_cover.html">Profile with cover</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="icon-cube3"></i> <span>Application pages</span></a>
                                <ul>
                                    <li>
                                        <a href="#">Task manager</a>
                                        <ul>
                                            <li><a href="task_manager_grid.html">Task grid</a></li>
                                            <li><a href="task_manager_list.html">Task list</a></li>
                                            <li><a href="task_manager_detailed.html">Task detailed</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Inbox</a>
                                        <ul>
                                            <li><a href="mail_list.html">Mail list</a></li>
                                            <li><a href="mail_read.html">Read mail</a></li>
                                            <li><a href="mail_write.html">Write mail</a></li>
                                            <li class="navigation-divider"></li>
                                            <li><a href="chat_layouts.html">Chat layouts</a></li>
                                            <li><a href="chat_options.html">Chat options</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Search</a>
                                        <ul>
                                            <li><a href="search_basic.html">Basic search results</a></li>
                                            <li><a href="search_users.html">User search results</a></li>
                                            <li><a href="search_images.html">Image search results</a></li>
                                            <li><a href="search_videos.html">Video search results</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Job search</a>
                                        <ul>
                                            <li><a href="job_list_cards.html">Cards view</a></li>
                                            <li><a href="job_list_panel.html">Panel view</a></li>
                                            <li><a href="job_detailed.html">Job detailed</a></li>
                                            <li><a href="job_apply.html">Apply</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Learning</a>
                                        <ul>
                                            <li><a href="learning_list.html">List view</a></li>
                                            <li><a href="learning_grid.html">Grid view</a></li>
                                            <li><a href="learning_detailed.html">Detailed course</a></li>
                                        </ul>
                                    </li>
                                    <li class="disabled">
                                        <a href="#">Ecommerce set <span class="label label-transparent">in 1.6</span></a>
                                        <ul>
                                            <li><a href="ecommerce_product_list.html">Product list</a></li>
                                            <li><a href="ecommerce_product_grid.html">Product grid</a></li>
                                            <li><a href="ecommerce_product_detailed.html">Product detailed</a></li>
                                            <li><a href="ecommerce_product_new.html">New product</a></li>
                                            <li><a href="ecommerce_cart.html">Shopping cart</a></li>
                                            <li><a href="ecommerce_checkout.html">Checkout process</a></li>
                                            <li><a href="ecommerce_pricing.html">Pricing tables</a></li>
                                        </ul>
                                    </li>
                                    <li class="disabled">
                                        <a href="#">Real estate <span class="label label-transparent">in 1.6</span></a>
                                        <ul>
                                            <li><a href="properties_list.html">Properties list</a></li>
                                            <li><a href="properties_grid.html">Properties grid</a></li>
                                            <li><a href="properties_defailed.html">Property detailed</a></li>
                                            <li><a href="properties_create.html">Create property</a></li>
                                            <li><a href="properties_detailed.html">Property detailed</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- /page kits -->

                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">
            <div id="app">
                <example-component></example-component>
            </div>
            <form action="/api/student" method="post">
                {{ csrf_field() }}
                <input name="a" type="text">
                <input type="submit">
            </form>
           @section("main-content")
            @show
        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="navbar navbar-default navbar-fixed-bottom footer">
    <div class="navbar-boxed">
        <ul class="nav navbar-nav visible-xs-block">
            <li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
        </ul>

        <div class="navbar-collapse collapse" id="footer">
            <div class="navbar-text">
                &copy; 2015. <a href="#" class="navbar-link">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" class="navbar-link" target="_blank">Eugene Kopyov</a>
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
<!-- /footer -->
<script src="{{asset("js/app.js")}}"></script>
</body>
</html>