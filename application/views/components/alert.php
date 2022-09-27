<?php if($alerts != null) {?>
    <div class="<?php echo $alerts['class']?>" role="alert">
        <strong><i class="<?php echo $alerts['icon'];?>"></i></strong> <?php echo $alerts['message'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
<?php }?>