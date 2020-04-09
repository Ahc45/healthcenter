<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">
      <h1>
        User Profile
      </h1>
    </section> -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <!-- <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url()?>assets/img/logo.jpg" alt="User profile picture"> -->

              <h3 class="profile-username text-center"><?php echo session('name')?></h3>

              <p class="text-muted text-center">Patient no. :<?php echo session('patient_no')?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo session('username')?></a>
                </li>
                <li class="list-group-item">
                  <b>Age</b> <a class="pull-right"><?php echo session('age')?></a>
                </li>
                <li class="list-group-item">
                  <b>Birthday</b> <a class="pull-right"><?php echo session('birthday')?></a>
                </li>
              </ul>

              <a href="<?php echo base_url('frontend/logout')?>" class="btn btn-warning btn-block"><b>LOGOUT</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-calendar margin-r-5"></i>Birthday</strong>

              <p class="text-muted">
                <?php echo session('birthday')?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted"><?php echo session('address')?></p>

              <hr>

              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Contact no</strong>



              <p class="text-muted"><?php echo session('contact_no')?></p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Date Added</strong>
               <p class="text-muted"><?php echo session('created')?></p>
             
              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Others</strong>
              <p>
                <span class="label label-danger">BP:   </span> <?php echo session('bp')?>
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li ><a href="#Checkup" data-toggle="tab">Record</a></li>
              <li class="active"><a href="#timeline" data-toggle="tab">Announcement</a></li>
            </ul>
            <div class="tab-content">
              <div class=" tab-pane" id="Checkup">
                <div class="row">
                    <div class="col-md-12">
                      <div class="box box-solid">
                        <div class="box-header with-border">
                          <h3 class="box-title">Check Up record</h3>
                          <div class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal"><i class="fa fa-print"> Print</i>
                            </button>
                              <div id="MyModal>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="gridSystemModalLabel">Patient details </h4>
                                  </div>
                                
                                  <!-- Modal Body -->  
                                  <div class="modal-body">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                            <script type="text/javascript">
                                       document.getElementById("btnPrint").onclick = function () {
                                        printElement(document.getElementById("printThis"));
                                    }

                                    function printElement(elem) {
                                        var domClone = elem.cloneNode(true);
                                        window.print();
                                        location.reload();
                                    }
                                </script>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                          <div class="box-group" id="accordion">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                            <?php if(isset($checkup_data)):?>
                               <?php foreach ($checkup_data as $key => $CD):?>
                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <?php echo date("m, d Y",strtotime($CD->created))?>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="box-body">
                                      <?php echo $CD->findings?>
                                    </div>
                                  </div>
                                </div>
                          <?php endforeach?>
                          <?php endif?>
                          </div>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                </div>
              </div>
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
              <!-- /.tab-pane -->

              <!-- <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div> -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
</div>
<?php $this->load->view('_frontend/footer')?>