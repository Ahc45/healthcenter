<div class="row" style="height:100vh"> 
  <div class="col-md-6 col-lg-6" style="height:100vh;">
    <div class="login-box" style="margin-top:25vh">
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
            <!-- <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div> -->
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <!-- <a href="register.html" class="text-center">Request Login</a> -->

      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-6" style= "background-color:white;height:100vh;padding:0;margin:0">
       <section class="col-lg-12" style= "height:100vh;padding:0;margin:0">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><h3 data-toggle="tab">Announcement</h3></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="timeline">
                <ul class="timeline timeline-inverse">
                <?php if(isset($announcement)):?>
                  <?Php foreach ($announcement   as $key => $ann):?>
                  <li class="time-label">
                        <span class="bg-red">
                         <?php echo date('m d, Y', strtotime($ann->created))?>
                        </span>
                  </li>
                  <li>
                    <i class="fa fa-flag bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i>
                         <?php echo date('H:i', strtotime($ann->created))?></span>

                      <h3 class="timeline-header"><?php echo $ann->Title?></h3>

                      <div class="timeline-body">
                        <?php echo $ann->body?>
                      </div>
                    </div>
                  </li>
                    <?php endforeach?>
                  <?php endif?>
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>
  </div>
</div>

<?php $this->load->view('_admin/login/footer') ?>