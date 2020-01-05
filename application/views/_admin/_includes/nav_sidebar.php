  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <img src="<?php echo base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo session('name');?></p>
          <?php// echo session('full_name')?>
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

        <li class="treeview <?php echo ($this->uri->segment(1) == "patient") ? 'active' : '' ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>PATIENT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('patient')?>"><i class="fa fa-circle-o"></i>PATIENT LIST</a></li>
            <li class=""><a href="index2.html"><i class="fa fa-circle-o"></i>FAMILY #</a></li>
          </ul>
        </li>
        <li class="treeview <?php echo ($this->uri->segment(1) == "admin") ? 'active' : '' ?>">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>ADMIN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class=""><a href="<?php echo base_url('admin')?>"><i class="fa fa-circle-o"></i>DOCTOR</a></li>
            <li><a href="<?php echo base_url('admin')?>"><i class="fa fa-circle-o"></i><B>BHW</B></a></li>
            <li class=""><a href="<?php echo base_url('admin')?>"><i class="fa fa-circle-o"></i>SUPER ADMIN</a></li>
          </ul>
        </li>

        <li><a href="#Admin-users"><i class="glyphicon glyphicon-plus"></i> <span>CHECK UP</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php $this->load->view('_admin/main_view')?>