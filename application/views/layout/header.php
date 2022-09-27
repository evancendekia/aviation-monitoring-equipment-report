<div class="page-main-header">
        <div class="main-header-left">
            <div class="logo-wrapper">
                <a href="<?php echo base_url();?>assets/universal/default/index.html">
                    <img src="<?php echo base_url();?>assets/pertamina/Logo panjang.png" class="image-dark p-1" alt=""/>
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
                    <!-- <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="text-dark">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/browser.png" alt="header-browser">
                        </a>
                    </li> -->
                    <!-- <li class="onhover-dropdown">
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
                    </li> -->
                    <li class="onhover-dropdown">
                        <div class="media  align-items-center">
                            <img class="align-self-center pull-right mr-2" src="<?php echo base_url();?>assets/universal/assets/images/dashboard/user.png" alt="header-user"/>
                            <div class="media-body">
                                <h6 class="m-0 txt-dark f-16">
                                    <?php echo $this->session->userdata('username').' | '.$this->session->userdata('NIP');?>
                                    <i class="fa fa-angle-down pull-right ml-2"></i>
                                </h6>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20">
                            <li>
                                <a href="<?php echo base_url();?>logout">
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