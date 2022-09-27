<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="universal admin is super flexible, powerful, clean & modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, universal admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url();?>assets/universal/assets/images/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/universal/assets/images/favicon.png" type="image/x-icon"/>
    <title>Universal - Premium Admin Template</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">

    <!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/fontawesome.css">

<!-- ico-font -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/icofont.css">

<!-- Themify icon -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/themify.css">

<!-- Flag icon -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/flag-icon.css">

<!-- prism css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/prism.css">

<!-- Owl css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/owlcarousel.css">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/bootstrap.css">

<!-- App css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/style.css">

<!-- Select2 css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/select2.css" />

<!-- Responsive css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/responsive.css">






    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/fontawesome.css"> -->

    <!-- ico-font -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/icofont.css"> -->

    <!-- Themify icon -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/themify.css"> -->

    <!-- Flag icon -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/flag-icon.css"> -->

    <!-- Bootstrap css -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/bootstrap.css"> -->

    <!-- App css -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/style.css"> -->

    <!--Select2 css-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/select2.css" /> -->

    <!-- Responsive css -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/universal/assets/css/responsive.css"> -->

</head>
<body>

<!-- Loader starts -->
<div class="loader-wrapper">
    <div class="loader bg-white">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <h4>Have a great day at work today <span>&#x263A;</span></h4>
    </div>
</div>
<!-- Loader ends -->

<!--page-wrapper Start-->
<div class="page-wrapper">

    <!--Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="index.html">
                    <img src="<?php echo base_url();?>assets/universal/assets/images/logo-light.png" class="image-dark" alt=""/>
                    <img src="<?php echo base_url();?>assets/universal/assets/images/logo-light-dark-layout.png" class="image-light" alt=""/>
                </a>
            </div>
        </div>
        <div class="main-header-right row">
            <div class="mobile-sidebar">
                <div class="media-body text-right switch-sm">
                    <label class="switch">
                        <input type="checkbox" id="sidebar-toggle" checked>
                        <span class="switch-state"></span>
                    </label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    <li>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <label class="sr-only">Email</label>
                                <input type="search"  class="form-control-plaintext" placeholder="Search.." >
                                <span class="d-sm-none mobile-search">
                                </span>
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="text-dark">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/browser.png" alt="header-browser">
                        </a>
                    </li>
                    <li class="onhover-dropdown">
                        <a href="#!" class="txt-dark">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/translate.png" alt="header-translate">
                        </a>
                        <ul class="language-dropdown onhover-show-div p-20">
                            <li>
                                <a href="#" data-lng="en">
                                    <i class="flag-icon flag-icon-ws"></i> English
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="es">
                                    <i class="flag-icon flag-icon-va"></i> Spanish
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="pt">
                                    <i class="flag-icon flag-icon-id"></i> Portuguese
                                </a>
                            </li>
                            <li>
                                <a href="#" data-lng="fr">
                                    <i class="flag-icon flag-icon-fr"></i> French
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="onhover-dropdown">
                        <a href="#!" class="txt-dark">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/notification.png" alt="header-notification">
                            <span class="badge badge-pill badge-primary notification">3</span>
                        </a>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>Notification <span class="badge badge-pill badge-secondary text-white text-uppercase pull-right">3 New</span></li>
                            <li>
                                <div class="media">
                                    <i class="align-self-center notification-icon icofont icofont-shopping-cart bg-primary"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0">Your order ready for Ship..!</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span><i class="icofont icofont-clock-time p-r-5"></i>Just Now</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <i class="align-self-center notification-icon icofont icofont-download-alt bg-success"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-success">Download Complete</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span><i class="icofont icofont-clock-time p-r-5"></i>5 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="media">
                                    <i class="align-self-center notification-icon icofont icofont-recycle bg-danger"></i>
                                    <div class="media-body">
                                        <h6 class="mt-0 txt-danger">250 MB trush files</h6>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                        <span><i class="icofont icofont-clock-time p-r-5"></i>25 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                            <li class="text-center">You have Check <a href="#">all</a> notification  </li>
                        </ul>

                    </li>
                    <li class="onhover-dropdown">
                        <div class="media  align-items-center">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/user.png" alt="header-user"/>
                            <div class="media-body">
                                <h6 class="m-0 txt-dark f-16">
                                    My Account
                                    <i class="fa fa-angle-down pull-right ml-2"></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li>
                                <a href="#">
                                    <i class="icon-user"></i>
                                    Edit Profile
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-email"></i>
                                    Inbox
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-check-box"></i>
                                    Task
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-comments"></i>
                                    Chat
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-power-off"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle">
                    <i class="icon-more"></i>
                </div>
            </div>
        </div>
    </div>
    <!--Page Header Ends-->

    <!--Page Body Start-->
    <div class="page-body-wrapper">

        <!--Page Sidebar Start-->
        <div class="page-sidebar custom-scrollbar">
            <div class="sidebar-user text-center">
                <div>
                    <img class="img-50 rounded-circle" src="<?php echo base_url();?>assets/universal/assets/images/user/1.jpg" alt="#">
                </div>
                <h6 class="mt-3 f-12">Johan Deo</h6>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <div class="sidebar-title">General</div>
                    <a href="#" class="sidebar-header">
                        <i class="icon-desktop"></i><span>Dashboard</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="index.html"><i class="fa fa-angle-right"></i>Default</a></li>
                        <li><a href="ecommerce.html"><i class="fa fa-angle-right"></i>E-commerce</a></li>
                        <li><a href="business.html"><i class="fa fa-angle-right"></i>Business<span class="badge badge-secondary ml-3">Guide</span></a></li>
                        <li><a href="crm.html"><i class="fa fa-angle-right"></i>CRM</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-blackboard"></i><span>Widgets</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="general-widget.html"><i class="fa fa-angle-right"></i>General widget</a></li>
                        <li><a href="chart-widget.html"><i class="fa fa-angle-right"></i>Chart widget</a></li>
                    </ul>
                </li>
                <li>
                    <a href="../starter-kit/layout-light.html" class="sidebar-header">
                        <i class="icon-anchor"></i><span> Starter kit</span>
                    </a>
                </li>
                <li>
                    <div class="sidebar-title">Layout</div>
                    <a href="#" class="sidebar-header">
                        <i class="icon-palette"></i> <span>Color Version</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="layout-light.html"><i class="fa fa-angle-right"></i>Layout Light</a></li>
                        <li><a href="layout-dark.html"><i class="fa fa-angle-right"></i>Layout Dark</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-direction-alt"></i> <span>Sidebar</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="light-nav.html"><i class="fa fa-angle-right"></i>Light Sidebar </a></li>
                        <li><a href="compact.html"><i class="fa fa-angle-right"></i>Compact Sidebar</a></li>
                        <li><a href="compact-small.html"><i class="fa fa-angle-right"></i>Compact icon sidebar</a></li>
                        <li><a href="dark-nav.html"><i class="fa fa-angle-right"></i>Dark Sidebar</a></li>
                        <li><a href="sidebar-hidden.html"><i class="fa fa-angle-right"></i>Sidebar Hidden</a></li>
                        <li><a href="sidebar-fixed.html"><i class="fa fa-angle-right"></i>Sidebar Fixed</a></li>
                        <li><a href="image-sidebar.html"><i class="fa fa-angle-right"></i>Sidebar With Image</a></li>
                        <li><a href="" class="disabled"><i class="fa fa-angle-right"></i>Disable</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-layout"></i> <span>Page layout</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="box-layout.html"><i class="fa fa-angle-right"></i>Boxed</a></li>
                        <li><a href="layout-rtl.html"><i class="fa fa-angle-right"></i>RTL</a></li>
                        <li><a href="1-column.html"><i class="fa fa-angle-right"></i>1 Column</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-align-justify"></i> <span>Menu Options</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="hide-on-scroll.html"><i class="fa fa-angle-right"></i>Hide menu on Scroll</a></li>
                        <li><a href="vertical.html"><i class="fa fa-angle-right"></i>Vertical Menu</a></li>
                        <li><a href="mega-menu.html"><i class="fa fa-angle-right"></i>Mega Menu</a></li>
                        <li><a href="fix-header.html"><i class="fa fa-angle-right"></i>Fix header</a></li>
                        <li><a href="fix-header&sidebar.html"><i class="fa fa-angle-right"></i>Fix Header & sidebar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-cloud-down"></i> <span>Footers</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="footer-light.html"><i class="fa fa-angle-right"></i>Footer Light</a></li>
                        <li><a href="footer-dark.html"><i class="fa fa-angle-right"></i>Footer Dark</a></li>
                        <li><a href="footer-fixed.html"><i class="fa fa-angle-right"></i>Footer Fixed</a></li>
                    </ul>
                </li>

                <li>
                    <div class="sidebar-title">Builder<span class="badge badge-success pull-right">Exclusive</span></div>
                    <a href="page-builder.html" class="sidebar-header">
                        <i class="icon-notepad"></i> <span>Page Builder</span>
                    </a>
                    <a href="#" class="sidebar-header">
                        <i class="icon-write"></i><span>Form Builder</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="form-builder.html"><i class="fa fa-angle-right"></i>Form Builder 1</a></li>
                        <li><a href="form-builder-2.html"><i class="fa fa-angle-right"></i>Form Builder 2</a></li>
                    </ul>
                    <a href="button-builder.html" class="sidebar-header">
                        <i class="icon-bookmark-alt"></i> <span>Button Builder</span>
                    </a>
                </li>

                <li>
                    <div class="sidebar-title">Components</div>
                    <a href="#" class="sidebar-header">
                        <i class="icon-package"></i><span> Base</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="state-color.html"><i class="fa fa-angle-right"></i>State color</a></li>
                        <li><a href="typography.html"><i class="fa fa-angle-right"></i>Typography</a></li>
                        <li><a href="helper-classes.html"><i class="fa fa-angle-right"></i>helper classes</a></li>
                        <li><a href="grid.html"><i class="fa fa-angle-right"></i>Grid</a></li>
                        <li><a href="tag-pills.html"><i class="fa fa-angle-right"></i>Tag & pills</a></li>
                        <li><a href="progress-bar.html"><i class="fa fa-angle-right"></i>Progress</a></li>
                        <li><a href="modal.html"><i class="fa fa-angle-right"></i>Modal</a></li>

                        <li><a href="alert.html"><i class="fa fa-angle-right"></i>Alert</a></li>
                        <li><a href="popover.html"><i class="fa fa-angle-right"></i>Popover</a></li>
                        <li><a href="tooltip.html"><i class="fa fa-angle-right"></i>Tooltip</a></li>
                        <li><a href="loader.html"><i class="fa fa-angle-right"></i>Spinners</a></li>
                        <li><a href="dropdown.html"><i class="fa fa-angle-right"></i>Dropdown</a></li>
                        <li>
                            <a href="crm.html"><i class="fa fa-angle-right"></i>Tabs<i class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="tab-bootstrap.html"><i class="fa fa-angle-right"></i>Bootstrap Tabs</a></li>
                                <li><a href="tab-material.html"><i class="fa fa-angle-right"></i>Line Tabs</a></li>
                            </ul>
                        </li>
                        <li><a href="according.html"><i class="fa fa-angle-right"></i>Accordions</a></li>
                        <li><a href="navs.html"><i class="fa fa-angle-right"></i>Navs</a></li>
                        <li><a href="box-shadow.html"><i class="fa fa-angle-right"></i>Shadow</a></li>
                        <li><a href="list.html"><i class="fa fa-angle-right"></i>Lists</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-support"></i><span> Advance</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="scrollable.html"><i class="fa fa-angle-right"></i>Scrollable</a></li>
                        <li><a href="tree.html"><i class="fa fa-angle-right"></i>Tree view</a></li>
                        <li><a href="bootstrap-notify.html"><i class="fa fa-angle-right"></i>Bootstrap Notify</a></li>
                        <li><a href="rating.html"><i class="fa fa-angle-right"></i>Rating</a></li>
                        <li><a href="dropzone.html"><i class="fa fa-angle-right"></i>dropzone</a></li>
                        <li><a href="tour.html"><i class="fa fa-angle-right"></i>Tour</a></li>
                        <li><a href="sweet-alert.html"><i class="fa fa-angle-right"></i>SweetAlert2</a></li>
                        <li><a href="modal-animated.html"><i class="fa fa-angle-right"></i>Animated Modal</a></li>
                        <li><a href="owl-carousel.html"><i class="fa fa-angle-right"></i>Owl Carousel</a></li>
                        <li><a href="ribbons.html"><i class="fa fa-angle-right"></i>Ribbons</a></li>
                        <li><a href="pagination.html"><i class="fa fa-angle-right"></i>Pagination</a></li>
                        <li><a href="steps.html"><i class="fa fa-angle-right"></i>Steps</a></li>
                        <li><a href="breadcrumb.html"><i class="fa fa-angle-right"></i>Breadcrumb</a></li>
                        <li><a href="range-slider.html"><i class="fa fa-angle-right"></i>Range Slider</a></li>
                        <li><a href="image-cropper.html"><i class="fa fa-angle-right"></i>Image cropper</a></li>
                        <li><a href="sticky.html"><i class="fa fa-angle-right"></i>Sticky</a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-infinite"></i> <span>Animation<span class="badge badge-danger ml-3">Hot</span></span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="animate.html"><i class="fa fa-angle-right"></i>Animate</a></li>
                        <li><a href="scroll-reval.html"><i class="fa fa-angle-right"></i>Scroll Reveal</a></li>
                        <li><a href="AOS.html"><i class="fa fa-angle-right"></i>AOS animation</a></li>
                        <li><a href="tilt.html"><i class="fa fa-angle-right"></i>Tilt Animation</a></li>
                        <li><a href="wow.html"><i class="fa fa-angle-right"></i>Wow Animation</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-crown"></i> <span>Icons</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="flag-icon.html"><i class="fa fa-angle-right"></i>Flag icon</a></li>
                        <li><a href="font-awesome.html"><i class="fa fa-angle-right"></i>Fontawesome Icon</a></li>
                        <li><a href="ico-icon.html"><i class="fa fa-angle-right"></i>Ico Icon</a></li>
                        <li><a href="themify-icon.html"><i class="fa fa-angle-right"></i>Thimify Icon</a></li>
                        <li><a href="whether-icon.html"><i class="fa fa-angle-right"></i>Whether Icon</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-cloud"></i> <span>Buttons</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="buttons.html"><i class="fa fa-angle-right"></i>Default Style</a></li>
                        <li><a href="flat-buttons.html"><i class="fa fa-angle-right"></i>Flat Style </a></li>
                        <li><a href="edge-buttons.html"><i class="fa fa-angle-right"></i>Edge Style </a></li>
                        <li><a href="raised-button.html"><i class="fa fa-angle-right"></i>Raised Style</a></li>
                        <li><a href="button-group.html"><i class="fa fa-angle-right"></i>Button Group</a></li>
                    </ul>
                </li>
                <li class="active">
                    <a href="#" class="sidebar-header">
                        <i class="icon-notepad"></i> <span>Forms</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="flag-icon.html"><i class="fa fa-angle-right"></i>Form Controls<i class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="form-validation.html"><i class="fa fa-angle-right"></i>Form Validation</a></li>
                                <li><a href="base-input.html"><i class="fa fa-angle-right"></i>Base Inputs</a></li>
                                <li><a href="radio-checkbox-control.html"><i class="fa fa-angle-right"></i>Checkbox & Radio</a></li>
                                <li><a href="input-group.html"><i class="fa fa-angle-right"></i>Input Groups</a></li>
                                <li><a href="megaoptions.html"><i class="fa fa-angle-right"></i>Mega Options</a></li>
                            </ul>
                        </li>
                        <li class="active">
                            <a href="font-awesome.html"><i class="fa fa-angle-right"></i>Form Widgets<i class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="datepicker.html"><i class="fa fa-angle-right"></i>Datepicker</a></li>
                                <li><a href="time-picker.html"><i class="fa fa-angle-right"></i>Timepicker</a></li>
                                <li><a href="datetimepicker.html"><i class="fa fa-angle-right"></i>Datetimepicker </a></li>
                                <li><a href="daterangepicker.html"><i class="fa fa-angle-right"></i>Daterangepicker </a></li>
                                <li><a href="touchspin.html"><i class="fa fa-angle-right"></i>Touchspin</a></li>
                                <li><a href="select2.html" class="active"><i class="fa fa-angle-right"></i>Select2</a></li>
                                <li><a href="switch.html"><i class="fa fa-angle-right"></i>Switch</a></li>
                                <li><a href="typeahead.html"><i class="fa fa-angle-right"></i>Typeahead</a></li>
                                <li><a href="clipboard.html"><i class="fa fa-angle-right"></i>Clipboard</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="font-awesome.html"><i class="fa fa-angle-right"></i>Form Layout<i class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="default-form.html"><i class="fa fa-angle-right"></i>Default Forms</a></li>
                                <li><a href="form-wizard.html"><i class="fa fa-angle-right"></i>Form Wizard 1</a></li>
                                <li><a href="form-wizard-two.html"><i class="fa fa-angle-right"></i>Form Wizard 2</a></li>
                                <li><a href="form-wizard-three.html"><i class="fa fa-angle-right"></i>Form Wizard 3</a></li>
                                <li><a href="form-wizard-four.html"><i class="fa fa-angle-right"></i>Form Wizard 4</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-harddrives"></i> <span>Tables</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Bootstrap Tables<i
                                    class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="bootstrap-basic-table.html"><i class="fa fa-angle-right"></i>Basic Tables</a></li>
                                <li><a href="bootstrap-sizing-table.html"><i class="fa fa-angle-right"></i>Sizing Tables</a></li>
                                <li><a href="bootstrap-border-table.html"><i class="fa fa-angle-right"></i>Border Tables</a></li>
                                <li><a href="bootstrap-styling-table.html"><i class="fa fa-angle-right"></i>Styling Tables</a></li>
                                <li><a href="table-components.html"><i class="fa fa-angle-right"></i>Table components</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Data Tables<i
                                    class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="datatable-basic-init.html"><i class="fa fa-angle-right"></i>Basic Init</a></li>
                                <li><a href="datatable-advance.html"><i class="fa fa-angle-right"></i>Advance Init</a></li>
                                <li><a href="datatable-styling.html"><i class="fa fa-angle-right"></i>Styling</a></li>
                                <li><a href="datatable-AJAX.html"><i class="fa fa-angle-right"></i>AJAX</a></li>
                                <li><a href="datatable-server-side.html"><i class="fa fa-angle-right"></i>Server Side</a></li>
                                <li><a href="datatable-plugin.html"><i class="fa fa-angle-right"></i>Plug-in</a></li>
                                <li><a href="datatable-API.html"><i class="fa fa-angle-right"></i>API</a></li>
                                <li><a href="datatable-data-source.html"><i class="fa fa-angle-right"></i>Data Sources</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-angle-right"></i>Extension Data Tables<i
                                    class="fa fa-angle-down pull-right"></i></a>
                            <ul class="sidebar-submenu">
                                <li><a href="datatable-ext-autofill.html"><i class="fa fa-angle-right"></i>Auto Fill</a></li>
                                <li><a href="datatable-ext-basic-button.html"><i class="fa fa-angle-right"></i>Basic Button</a></li>
                                <li><a href="datatable-ext-col-reorder.html"><i class="fa fa-angle-right"></i>Column Reorder</a></li>
                                <li><a href="datatable-ext-fixed-header.html"><i class="fa fa-angle-right"></i>Fixed Header</a></li>
                                <li><a href="datatable-ext-html-5-data-export.html"><i class="fa fa-angle-right"></i>HTML 5 Export</a></li>
                                <li><a href="datatable-ext-key-table.html"><i class="fa fa-angle-right"></i>Key Table</a></li>
                                <li><a href="datatable-ext-responsive.html"><i class="fa fa-angle-right"></i>Responsive</a></li>
                                <li><a href="datatable-ext-row-reorder.html"><i class="fa fa-angle-right"></i>Row Reorder</a></li>
                                <li><a href="datatable-ext-scroller.html"><i class="fa fa-angle-right"></i>Scroller</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="jsgrid-table.html"><i class="fa fa-angle-right"></i>Js Grid Table</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-credit-card"></i> <span>Cards</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="basic-card.html"><i class="fa fa-angle-right"></i>Basic Card</a></li>
                        <li><a href="creative-card.html"><i class="fa fa-angle-right"></i>Creative Card </a></li>
                        <li><a href="tabbed-card.html"><i class="fa fa-angle-right"></i>Tabbed Card</a></li>
                        <li><a href="dragable-card.html"><i class="fa fa-angle-right"></i>Draggable Card</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-panel"></i> <span>Timeline</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="timeline-v-1.html"><i class="fa fa-angle-right"></i>Timeline 1</a></li>
                        <li><a href="timeline-v-2.html"><i class="fa fa-angle-right"></i>Timeline 2</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-bar-chart"></i> <span>Charts</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="chart-google.html"><i class="fa fa-angle-right"></i>Google Chart</a></li>
                        <li><a href="chart-sparkline.html"><i class="fa fa-angle-right"></i>sparkline chart</a></li>
                        <li><a href="chart-flot.html"><i class="fa fa-angle-right"></i>Flot Chart</a></li>
                        <li><a href="chart-knob.html"><i class="fa fa-angle-right"></i>Knob Chart</a></li>
                        <li><a href="chart-morris.html"><i class="fa fa-angle-right"></i>Morris Chart</a></li>
                        <li><a href="chartjs.html"><i class="fa fa-angle-right"></i>chatjs Chart</a></li>
                        <li><a href="chartist.html"><i class="fa fa-angle-right"></i>chartist Chart</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-map-alt"></i> <span>Maps</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="map-js.html"><i class="fa fa-angle-right"></i>Map js</a></li>
                        <li><a href="vector-map.html"><i class="fa fa-angle-right"></i>Vector Maps</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-ruler-pencil"></i> <span>Editors</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="summernote.html"><i class="fa fa-angle-right"></i>Summer Note</a></li>
                        <li><a href="ckeditor.html"><i class="fa fa-angle-right"></i>CK editor</a></li>
                        <li><a href="simple-MDE.html"><i class="fa fa-angle-right"></i>MDE editor</a></li>

                        <li><a href="ace-code-editor.html"><i class="fa fa-angle-right"></i>ACE code editor</a></li>
                    </ul>
                </li>
                <li>
                    <div class="sidebar-title">Apps</div>
                    <a href="#" class="sidebar-header">
                        <i class="icon-user"></i><span>Users</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="user-profile.html"><i class="fa fa-angle-right"></i>Users Profile</a></li>
                        <li><a href="edit-profile.html"><i class="fa fa-angle-right"></i>Users Edit</a></li>
                        <li><a href="user-cards.html"><i class="fa fa-angle-right"></i>Users Cards</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-calendar"></i> <span>Calender</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="calendar.html"><i class="fa fa-angle-right"></i>Full Calender Basic</a></li>
                        <li><a href="calendar-event.html"><i class="fa fa-angle-right"></i>Full Calender Events </a></li>
                        <li><a href="calendar-advanced.html"><i class="fa fa-angle-right"></i>Full Calender Advance </a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-gallery"></i> <span>Gallery</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="gallery.html"><i class="fa fa-angle-right"></i>Gallery Grid</a></li>
                        <li><a href="gallery-with-description.html"><i class="fa fa-angle-right"></i>Gallery Grid with Desc</a></li>
                        <li><a href="masonry-gallery.html"><i class="fa fa-angle-right"></i>Masonry Gallery</a></li>
                        <li><a href="masonry-gallery-with-disc.html"><i class="fa fa-angle-right"></i>Masonry Gallery Desc</a></li>
                        <li><a href="gallery-hover.html"><i class="fa fa-angle-right"></i>Hover Effects</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-email"></i> <span>Email</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="email-application.html"><i class="fa fa-angle-right"></i>Email App</a></li>
                        <li><a href="email-compose.html"><i class="fa fa-angle-right"></i>Email Compose</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-pencil-alt"></i> <span> Blog</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="blog.html"><i class="fa fa-angle-right"></i>Blog Details</a></li>
                        <li><a href="blog-single.html"><i class="fa fa-angle-right"></i>Blog Single</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-comments"></i> <span>chat</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="chat.html"><i class="fa fa-angle-right"></i>Chat App</a></li>
                        <li><a href="call-chat.html"><i class="fa fa-angle-right"></i>Video chat</a></li>
                        <li><a href="friend-list.html"><i class="fa fa-angle-right"></i>Friend List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="support-ticket.html" class="sidebar-header">
                        <i class="icon-headphone-alt"></i> <span>Support Ticket</span>
                    </a>
                </li>
                <li>
                    <a href="to-do.html" class="sidebar-header">
                        <i class="icon-announcement"></i><span>To-Do</span>
                    </a>
                </li>
                <li>
                    <a href="../index.html" class="sidebar-header">
                        <i class="icon-rocket"></i> <span>Landing page</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" class="sidebar-header">
                        <i class="icon-shopping-cart"></i><span>Ecommerce</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="product.html"><i class="fa fa-angle-right"></i>Product</a></li>
                        <li><a href="product-page.html"><i class="fa fa-angle-right"></i>Product page</a></li>
                        <li><a href="product-list.html" class=""><i class="fa fa-angle-right"></i>Product list</a></li>
                        <li><a href="payment-details.html"><i class="fa fa-angle-right"></i>Payment Details</a></li>
                        <li><a href="invoice-template.html"><i class="fa fa-angle-right"></i>Invoice</a></li>
                    </ul>
                </li>
                <li>
                    <a href="pricing.html" class="sidebar-header">
                        <i class="icon-money"></i><span> Pricing</span>
                    </a>
                </li>

                <li>
                    <div class="sidebar-title">Pages</div>
                    <a href="sample-page.html" class="sidebar-header">
                        <i class="icon-file"></i><span> Sample page</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-search"></i> <span>Search Pages</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="search.html"><i class="fa fa-angle-right"></i>Search Website</a></li>
                        <li><a href="search-images.html"><i class="fa fa-angle-right"></i>Search Images</a></li>
                        <li><a href="search-video.html"><i class="fa fa-angle-right"></i>Search Video</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-info-alt"></i><span> Error Page</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="error-400.html"><i class="fa fa-angle-right"></i>Error 400</a></li>
                        <li><a href="error-401.html"><i class="fa fa-angle-right"></i>Error 401</a></li>
                        <li><a href="error-403.html"><i class="fa fa-angle-right"></i>Error 403</a></li>
                        <li><a href="error-404.html"><i class="fa fa-angle-right"></i>Error 404</a></li>
                        <li><a href="error-500.html"><i class="fa fa-angle-right"></i>Error 500</a></li>
                        <li><a href="error-503.html"><i class="fa fa-angle-right"></i>Error 503</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-unlock"></i><span> Authentication</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="login.html"><i class="fa fa-angle-right"></i>Login Simple</a></li>
                        <li><a href="login-image.html"><i class="fa fa-angle-right"></i>Login with Bg Image </a></li>
                        <li><a href="login-video.html"><i class="fa fa-angle-right"></i>Login with Bg video</a></li>
                        <li><a href="signup.html"><i class="fa fa-angle-right"></i>Register Simple </a></li>
                        <li><a href="signup-image.html"><i class="fa fa-angle-right"></i>Register with Bg Image </a></li>
                        <li><a href="signup-video.html"><i class="fa fa-angle-right"></i>Register with Bg video</a></li>
                        <li><a href="unlock.html"><i class="fa fa-angle-right"></i>Unlock User </a></li>
                        <li><a href="forget-password.html"><i class="fa fa-angle-right"></i>Forget Password</a></li>
                        <li><a href="reset-password.html"><i class="fa fa-angle-right"></i>Reset Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="sidebar-header">
                        <i class="icon-video-clapper"></i> <span>Coming Soon</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu">
                        <li><a href="comingsoon.html"><i class="fa fa-angle-right"></i>Coming Simple</a></li>
                        <li><a href="comingsoon-bg-video.html"><i class="fa fa-angle-right"></i>Coming with Bg video</a></li>
                        <li><a href="comingsoon-bg-img.html"><i class="fa fa-angle-right"></i>Coming with Bg Image </a></li>
                    </ul>
                </li>
                <li>
                    <a href="maintenance.html" class="sidebar-header">
                        <i class="icon-settings"></i><span> Maintenance</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-widget text-center">
                <div class="sidebar-widget-top">
                    <h6 class="mb-2 fs-14">Need Help</h6>
                    <i class="icon-bell"></i>
                </div>
                <div class="sidebar-widget-bottom p-20 m-20">
                    <p>+1 234 567 899
                        <br>help@pixelstrap.com
                        <br><a href="#">Visit FAQ</a>
                    </p>
                </div>
            </div>
        </div>
        <!--Page Sidebar Ends-->

        <div class="page-body">
            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Select2 Dropdowns
                                <small>Universal Admin panel</small>
                            </h3>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb pull-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item">Forms </li>
                                <li class="breadcrumb-item">Form Widgets </li>
                                <li class="breadcrumb-item active">Select2</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends -->

            <!-- Container-fluid starts -->
            <div class="container-fluid">
                <div class="select2-drpdwn">
                    <div class="row">
                        <!-- Default Textbox start -->
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Select-2</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <div class="col-form-label">Default Placeholder</div>
                                        <select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="WY">Coming</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Select2 single select</div>
                                        <select class="js-example-basic-single col-sm-12">
                                            <optgroup label="Developer">
                                                <option value="AL">Alabama</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Designer">
                                                <option value="WY">Peter</option>
                                                <option value="WY">Hanry Die</option>
                                                <option value="WY">John Doe</option>
                                            </optgroup>
                                        </select>

                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Select2 multi select</div>
                                        <select class="js-example-basic-multiple col-sm-12" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="WY">Coming</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">RTL support</div>
                                        <select class="js-example-rtl col-sm-12" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="WY">Coming</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Limiting The Number Of Selections</div>
                                        <select class="js-example-basic-multiple-limit col-sm-12" multiple="multiple">
                                            <option value="AL">Alabama</option>
                                            <option value="WY">Wyoming</option>
                                            <option value="WY">Coming</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Disabled Results</div>
                                        <select class="js-example-disabled-results col-sm-12">
                                            <option value="one">First</option>
                                            <option value="two" disabled="disabled">Second
                                                (disabled)
                                            </option>
                                            <option value="three">Third</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="col-form-label">Hiding The Search Box</div>
                                        <select class="js-example-basic-hide-search col-sm-12" multiple="multiple">
                                            <optgroup label="Developer">
                                                <option value="AL">Smith</option>
                                                <option value="WY">Peter</option>
                                                <option value="WY">James</option>
                                                <option value="WY">Hanry Die</option>
                                                <option value="WY">John Doe</option>
                                                <option value="WY">Harry Poter</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="col-form-label">Enable-Disable</div>
                                        <select class="js-example-disabled col-sm-10">
                                            <option value="AL">Smith</option>
                                            <option value="WY">Peter</option>
                                            <option value="WY">James</option>
                                            <option value="WY">Hanry Die</option>
                                            <option value="WY">John Doe</option>
                                            <option value="WY">Harry Poter</option>
                                        </select>
                                        <button class="btn btn-primary js-programmatic-enable p-2">
                                            Enable
                                        </button>
                                        <button class="btn btn-danger js-programmatic-disable p-2">
                                            Disable
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Default Textbox end -->

                        <!-- Input Groups start -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Outline Color Variant</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <div class="col-form-label">Primary Select</div>
                                        <select name="select" class="form-control form-control-primary btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Secondary Select</div>
                                        <select name="select" class="form-control form-control-secondary btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Success Select</div>
                                        <select name="select" class="form-control form-control-success btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Info Select</div>
                                        <select name="select" class="form-control form-control-info btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Warning Select</div>
                                        <select name="select" class="form-control form-control-warning btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Danger Select</div>
                                        <select name="select" class="form-control form-control-danger btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="col-form-label">Inverse Select</div>
                                        <select name="select" class="form-control form-control-inverse btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Full Colored Variant</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-2">
                                        <div class="col-form-label">Primary Select</div>
                                        <select name="select" class="form-control form-control-primary-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Secondary Select</div>
                                        <select name="select" class="form-control form-control-secondary-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Success Select</div>
                                        <select name="select" class="form-control form-control-success-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Info Select</div>
                                        <select name="select" class="form-control form-control-info-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Warning Select</div>
                                        <select name="select" class="form-control form-control-warning-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <div class="col-form-label">Danger Select</div>
                                        <select name="select" class="form-control form-control-danger-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                    <div>
                                        <div class="col-form-label">Inverse Select</div>
                                        <select name="select" class="form-control form-control-inverse-fill btn-square">
                                            <option value="opt1">Select One Value Only</option>
                                            <option value="opt2">Type 2</option>
                                            <option value="opt3">Type 3</option>
                                            <option value="opt4">Type 4</option>
                                            <option value="opt5">Type 5</option>
                                            <option value="opt6">Type 6</option>
                                            <option value="opt7">Type 7</option>
                                            <option value="opt8">Type 8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Input Groups end -->
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends -->

        </div>
    </div>
    <!--Page Body Ends-->
</div>
<!--page-wrapper Ends-->

<!-- latest jquery-->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/jquery-3.2.1.min.js" ></script> -->

<!-- Bootstrap js-->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/popper.min.js" ></script> -->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/bootstrap.js" ></script> -->

<!-- Sidebar jquery-->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/sidebar-menu.js" ></script> -->

<!-- Theme js-->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/script.js" ></script> -->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/theme-customizer/customizer.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/chat-sidebar/chat.js"></script> -->


<!-- latest jquery-->
<script src="<?php echo base_url();?>assets/universal/assets/js/jquery-3.2.1.min.js" ></script>

<!-- Bootstrap js-->
<script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/popper.min.js" ></script>
<script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/bootstrap.js" ></script>

<!-- Chart JS-->
<script src="<?php echo base_url();?>assets/universal/assets/js/chart/Chart.min.js"></script>

<!-- Morris Chart JS-->
<script src="<?php echo base_url();?>assets/universal/assets/js/morris-chart/raphael.js"></script>
<script src="<?php echo base_url();?>assets/universal/assets/js/morris-chart/morris.js"></script>

<!-- owlcarousel js-->
<script src="<?php echo base_url();?>assets/universal/assets/js/owlcarousel/owl.carousel.js" ></script>

<!-- Sidebar jquery-->
<script src="<?php echo base_url();?>assets/universal/assets/js/sidebar-menu.js" ></script>

<!--Sparkline  Chart JS-->
<script src="<?php echo base_url();?>assets/universal/assets/js/sparkline/sparkline.js"></script>

<!--Height Equal Js-->
<script src="<?php echo base_url();?>assets/universal/assets/js/height-equal.js"></script>

<!-- prism js -->
<script src="<?php echo base_url();?>assets/universal/assets/js/prism/prism.min.js"></script>

<!-- clipboard js -->
<script src="<?php echo base_url();?>assets/universal/assets/js/clipboard/clipboard.min.js" ></script>

<!-- custom card js  -->
<script src="<?php echo base_url();?>assets/universal/assets/js/custom-card/custom-card.js" ></script>

<!-- Theme js-->
<script src="<?php echo base_url();?>assets/universal/assets/js/script.js" ></script>
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/theme-customizer/customizer.js"></script> -->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/chat-sidebar/chat.js"></script> -->
<script src="<?php echo base_url();?>assets/universal/assets/js/dashboard-default.js" ></script>

<!-- Counter js-->
<script src="<?php echo base_url();?>assets/universal/assets/js/counter/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>assets/universal/assets/js/counter/jquery.counterup.min.js"></script>
<script src="<?php echo base_url();?>assets/universal/assets/js/counter/counter-custom.js"></script>

<!-- menampilkan loading diawal load page -->
<!-- <script src="<?php echo base_url();?>assets/universal/assets/js/notify/bootstrap-notify.min.js"></script>
<script src="<?php echo base_url();?>assets/universal/assets/js/notify/index.js"></script> -->

<!-- Select2 js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/universal/assets/js/select2/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/universal/assets/js/select2/select2-custom.js"></script>

</body>
</html>