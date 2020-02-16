  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <se ction class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo base_url()?>assets/img/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo session('name');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">MAIN NAVIGATION</li>
        <li class=" <?php echo ($this->uri->segment(1) == "dashboard") ? 'active' : '' ?>">
            <a href="<?php echo base_url('dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
        <li class="<?php echo ($this->uri->segment(1) == "patient") ? 'active' : '' ?>">
          <a href="<?php echo base_url('patient')?>"><i class="fa fa-users"></i> <span>PATIENT LIST</span></a>
        </li>
        <?php if(session('account_type') != "BHW"):?> 
        <li class="treeview <?php echo ($this->uri->segment(1) == "Admin") ? 'active' : '' ?>">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>ADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class=""><a href="<?php echo base_url('Admin')?>"><i class="fa fa-circle-o"></i>ADMINS</a></li>
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-circle-o"></i>BHW</a></li>
          </ul>
        </li>
        <?php endif?>
        <li  class=" <?php echo ($this->uri->segment(1) == "checkup") ? 'active' : '' ?> ">
            <a href="<?php echo base_url('checkup')?>"><i class="glyphicon glyphicon-plus"></i> <span>CHECK UP</span></a>
        </li>
        <li class=" <?php echo ($this->uri->segment(1) == "prenatal") ? 'active' : '' ?> ">
            <a href="<?php echo base_url('prenatal')?>"><i class="fa fa-stethoscope"></i> <span>PRE NATAL</span></a>
        </li>
        <li class=" <?php echo ($this->uri->segment(1) == "vaccine") ? 'active' : '' ?>">
            <a href="<?php echo base_url('vaccine')?>"><i class="fa fa-plus-square"></i> <span>VACCINE</span></a>
        </li>

        <?php if(session('account_type') != "BHW"):?> 
        <li class=" <?php echo ($this->uri->segment(1) == "announcement") ? 'active' : '' ?>">
            <a href="<?php echo base_url('announcement')?>"><i class="fa fa-bullhorn"></i> <span>Announcement</span></a>
        </li>
        
        <?php endif?>
       <!--  <li>
            <a href="<>"><i class=""></i> <span>SCHEDULES</span></a>
        </li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php $this->load->view('_admin/main_view')?>