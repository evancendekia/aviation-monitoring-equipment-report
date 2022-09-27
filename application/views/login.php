<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('layout/head');?>
    <body>
        <?php $this->load->view('layout/loader');?>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="authentication-main">
                    <div class="row">
                        <div class="col-md-4 p-0">
                            <div class="auth-innerleft">
                                <div class="text-center">
                                    <img style="width: 80% !important;" src="<?php echo base_url();?>assets/pertamina/Logo square.png" class="logo-login" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 p-0">
                            <div class="auth-innerright">
                                <div class="authentication-box">
                                    <h4>LOGIN</h4>
                                    <h6>Enter your Username and Password For Login</h6>
                                    
                                    <div class="card mt-4 p-4 mb-0">
                                        <?php if($alerts != null) {?>
                                            <div class="<?php echo $alerts['class']?>" role="alert">
                                                <strong><i class="<?php echo $alerts['icon'];?>"></i></strong> <?php echo $alerts['message'];?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div> 
                                        <?php }?>
    
                                        <form class="theme-form" action="<?php echo base_url();?>login" method="post">
                                            <div class="form-group">
                                                <label class="col-form-label pt-0">Username</label>
                                                <input type="text" name="nip" class="form-control form-control-lg" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label">Password</label>
                                                <input type="password" name="password" class="form-control form-control-lg" required>
                                            </div>
                                            <div class="form-group form-row mt-3 mb-0">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-block btn-secondary">LOGIN</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="<?php echo base_url();?>assets/universal/assets/js/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/popper.min.js"></script>
        <script src="<?php echo base_url();?>assets/universal/assets/js/bootstrap/bootstrap.js"></script>
        <!-- Theme js-->
        <script src="<?php echo base_url();?>assets/universal/assets/js/script.js"></script>
    </body>
</html>