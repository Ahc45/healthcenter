<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('login')?>"><b>ALMAZA</b> UNO</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="alert <?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible <?php echo ($this->session->flashdata('show') == null)? 'hide' : 'show'; ?>">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo $this->session->flashdata('title') ?></strong>
      <?php echo $this->session->flashdata('message'); ?>
    </div>
    <?php echo ($this->session->flashdata('show') == null)? '<p class="login-box-msg">Sign in to start your session</p>' : ''; ?>

    <form action="<?php echo base_url('login/validate_login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="register.html" class="text-center">Request Login</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>