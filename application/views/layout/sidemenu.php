<div class="page-sidebar custom-scrollbar">
    <ul class="sidebar-menu">
        
        <!--<div class="sidebar-title text-dark">Admin Menu</div>-->
        <li><a href="<?php echo base_url(); ?>" class="sidebar-header <?php echo $page == 'dashboard' ? "active" : ''; ?>"><i class="icon-desktop"></i><span>Dashboard</span></a></li>
        <?php if($this->session->userdata('role') == 0){?>
            <div class="sidebar-title text-dark">Admin Menu</div>
            <li><a href="<?php echo base_url(); ?>user" class="sidebar-header <?php echo $page == 'user' ? "active" : ''; ?>"><i class="icon-user"></i><span>User</span></a></li>
        <?php }?>
        <div class="sidebar-title text-dark">Modul</div>
        <li><a href="<?php echo base_url('checklist'); ?>" class="sidebar-header <?php echo ($page == 'checklist' || $page == 'detail_checklist' || $page = 'add_checklist' ) ? "active" : ''; ?>"><i class="icofont icofont-checked"></i><span>Check List</span></a></li>
        <li><a href="<?php echo base_url('sarfas'); ?>" class="sidebar-header <?php echo $page == 'sarfas' ? "active" : ''; ?>"><i class="icofont icofont-industries"></i><span>Data Sarfas</span></a></li>
        <li><a href="<?php echo base_url('maintenance'); ?>" class="sidebar-header <?php echo $page == 'maintenance' ? "active" : ''; ?>"><i class="icofont icofont-tools-alt-2"></i><span>Maintenance</span></a></li>
        <li><a href="<?php echo base_url('equipment'); ?>" class="sidebar-header <?php echo $page == 'equipment' ? "active" : ''; ?>"><i class="icofont icofont-repair"></i><span>Data Equipment</span></a></li>
        
    </ul>
</div>