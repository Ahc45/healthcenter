

<!-- <div class="row" style="height:100vh"> 
  <div class="col-md-6 col-lg-6" style="height:100vh;">
    <div class="login-box" style="margin-top:25vh">
      <div class="login-logo">
        <a href="<?php echo base_url('login')?>"><b>ALMANZA</b> UNO</a>
      </div>
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
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>

        <a href="register.html" class="text-center">Request Login</a>

      </div>
    </div>
  </div>Masthead -->
 <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Announcement</a>
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Mission/Vission</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>

  <header class="masthead">
    <div class="container h-100">
      <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->

              <!-- Icon -->
              <div class="fadeIn first">
                <img src="<?php echo base_url()?>logo.jpg" id="icon" alt="User Icon" style="width:100px;height:100px;margin-top:20px;margin-bottom:10px"/>
              </div>
                      <div class="alert <?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible <?php echo ($this->session->flashdata('show') == null)? 'hide' : 'show'; ?>">
                   <?php echo ($this->session->flashdata('show') != null)? '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' : ''; ?>
                    <strong><?php echo $this->session->flashdata('title') ?></strong>
                  <?php echo $this->session->flashdata('message'); ?>
                </div>
              <!-- Login Form -->
                      <form action="<?php echo base_url('login/validate_login')?>" method="post">
                <input type="text" id="login" class="form-control fadeIn third" placeholder="Username" name="username">
                <input type="password" id="password" class="form-control fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
              </form>
            </div>
          </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">About</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Barangay almanza uno health center was established in 2000. A public health unit by the department of local goverment. Located in Real Street, Almanza Uno Las Piñas City along zapote road.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">Announcement</h2>
      <hr class="divider my-4">
      <div class="row">
          <?php foreach ($announcement as $key => $ann):?>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <!-- <i class="fas fa-4x fa-gem text-primary mb-4"></i> -->
            <h3 class="h4 mb-2"><?php echo strtoupper($ann->Title) ?></h3><small><?php echo date("M d, Y", strtotime($ann->created) )?></small> 
            <br><br>
            <p class="text-muted mb-0"><?php echo $ann->body ?></p>
          </div>
        </div>
          <?php endforeach?>
      </div>

    </div>
  </section>

 <!--  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
      <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
    </div>
  </section>

  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url()?>frontendassets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>frontendassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?php echo base_url()?>frontendassets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url()?>frontendassets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url()?>frontendassets/js/creative.min.js"></script>

</body>

</html>
