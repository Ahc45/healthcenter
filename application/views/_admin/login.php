<div class="login-box">
  <div class="login-logo">
  <b>HEALTH</b> Center Login
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

   <?php $this->load->view('_admin/_includes/notification');?>
      <?php echo form_open('user/validate_login'); ?>
      <div class="form-group has-feedback">

     <?php $username = array('name' => 'username', 'type'=> 'text', 'id'=> 'password', 'class' => ' form-control'); ?>
     <?php echo my_form_input($username, set_value('Username'), "Username", form_error('username') ) ?>  

      </div>

      <div class="form-group has-feedback">

     <?php $password = array('name' => 'password', 'type'=> 'password', 'id'=> 'password', 'class' => ' form-control'); ?>
     <?php echo my_form_input($password, set_value('password'), "Password", form_error('password') ) ?>  

      </div>

      <div class="row">
        <div class="col-xs-8">
          
        </div>

        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat"  value = "Sign in"/>
        </div>

      </div>
    
          <?php echo form_close(); ?>
  </div>
</div>
<?php $this->load->view('_admin/_includes/footer');?>