<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('layout/head'); ?>
    <body>
        <?php //$this->load->view('layout/loader'); ?>
        <div class="page-wrapper">
            <?php $this->load->view('layout/header') ?>
            <div class="page-body-wrapper">
                <?php $this->load->view('layout/sidemenu'); ?>
                <div class="page-body">
                    <?php $this->load->view('layout/title_page'); ?>
                    <div class="container-fluid">
                        <?php $this->load->view('pages' . (!isset($folder) ? '/' : "/$folder/") . $page); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- default script -->
        
        <?php 
            if(isset($data)){
                $this->load->view('layout/script',$data); 
            }else{
                $this->load->view('layout/script'); 
            }
        ?>
        <!-- page script -->
        <?php !isset($js) ?: $this->load->view("pages". (!isset($folder) ? "/$page/" : "/$folder/") .$js);?>
    </body>
</html>