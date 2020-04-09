<style>

  @media print {
    /* on modal open bootstrap adds class "modal-open" to body, so you can handle that case and hide body */
    body.modal-open {
        visibility: hidden;
    }

    body.modal-open .modal-body {
        visibility: visible; /* make visible modal body and header */
    }
}

</style>
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo (isset($prenatal_num))? $prenatal_num : 0?></h3>

              <p>Prenatal No.</p>
            </div>
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <a href="<?php echo base_url('prenatal')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo (isset($checkup))? $checkup : 0?></h3>

              <p>Checkup No.</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url('checkup')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo (isset($vaccine))? $vaccine : 0?></h3>

              <p>No. of Vaccined</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url('vaccine')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo (isset($patient_count))? $patient_count : 0?></h3>

              <p>User Registered</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?php echo base_url('patient')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <div class="box box-primary">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Patients List</h3>
                  </div>    
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                      <thead>
                      <tr>
                        <th>Name</th>
                        <th>Pateince No</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <?php if(isset($patients) && $patients != null): ?>
                        <?php foreach ($patients as $i => $ps): ?>
                            <td><?php echo $ps->first_name.' '. $ps->last_name?></td>
                            <td><?php echo $ps->patient_no?></td>
                            <td><?php echo $ps->address?></td>
                            <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModal<?php echo $ps->patient_no?>">print
                            </button></td>
                         <div id="printThis">
                            <div id="MyModal<?php echo $ps->patient_no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              
                              <div class="modal-dialog modal-lg">
                                
                                <!-- Modal Content: begins -->
                                <div class="modal-content">
                                  
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="gridSystemModalLabel">Patient details Login</h4>
                                  </div>
                                
                                  <!-- Modal Body -->  
                                  <div class="modal-body">
                                    <div class="body-message">
                                      <h4><?php echo strtoupper ( $ps->first_name.' '. $ps->last_name)?></h4>
                                      
                                      <div class="row">
                                        <div class="col-md-6">Username : <b><?php echo $ps->username?></b></div>
                                        <div class="col-md-6">Password : <b><?php echo $ps->patient_no?></b></div>
                                      </div>
                                      <hr>
                                       <div class="row">
                                        <h4>REMARKS</h4> to be filled out by doctor
                                        <div class="col-md-12" style="border: 2px solid;height:300px;"></div>
                                      </div>
                                    </div>
                                  </div>
                                
                                  <!-- Modal Footer -->
                                  <div class="modal-footer">
                                   <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                  <button id="btnPrint<?php echo $ps->patient_no?>" type="button" class="btn btn-default">Print</button>
                                  </div>
                                <script type="text/javascript">
                                       document.getElementById("btnPrint<?php echo $ps->patient_no?>").onclick = function () {
                                        printElement(document.getElementById("printThis"));
                                    }

                                    function printElement(elem) {
                                        var domClone = elem.cloneNode(true);
                                        
                                        var $printSection = document.getElementById("printSection");
                                        
                                        if (!$printSection) {
                                            var $printSection = document.createElement("div");
                                            $printSection.id = "printSection";
                                            document.body.appendChild($printSection);
                                        }
                                        
                                        $printSection.innerHTML = "";
                                        $printSection.appendChild(domClone);
                                        window.print();
                                        location.reload();
                                    }
                                </script>
                                </div>
                                <!-- Modal Content: ends -->
                                
                              </div>
                            </div>
                        </div>
                      </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                      </tbody>
                      
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
          </div>
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Vaccine</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            <div class="box-body">
                <table id="example2" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr>
                    <th>Baby Name</th>
                    <th>Mother's Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if(isset($vaccines)):?>
                    <?php foreach ($vaccines as $i => $vcc):?>
                  <tr>
                    <td><?php echo $vcc->name ?></td>
                    <td><?php echo $vcc->mother ?></td>
                     <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#MyModalVCC<?php echo $vcc->id?>">print
                            </button></td>
                         <div id="printThis">
                            <div id="MyModalVCC<?php echo $vcc->id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                              
                              <div class="modal-dialog modal-lg">
                                
                                <!-- Modal Content: begins -->
                                <div class="modal-content">
                                  
                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="gridSystemModalLabel">Vaccine List Information</h4>
                                  </div>
                                
                                  <!-- Modal Body -->  
                                  <div class="modal-body">
                                    <div class="body-message">
                                      <h4><?php echo strtoupper ( $vcc->name)?> Vaccince Data</h4>
                                      
                                      <div class="row">
                                        <div class="col-md-6">Baby Name : <?php echo $vcc->name?></div>
                                        <div class="col-md-6">Mother's Name : <?php echo $vcc->mother?></div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-md-4">Birth History : <?php echo $vcc->birth_history?></div>
                                        <div class="col-md-4">Feeding History : <?php echo $vcc->feeding_history?></div>
                                        <div class="col-md-4">TT Statusy : <?php echo $vcc->contact_no?></div>
                                      </div>

                                    <hr>
                                      <div class="row">
                                        <hr>
                                        <div class="col-md-3">FH : <?php echo $vcc->fh_no?></div>
                                        <div class="col-md-3">UFH : <?php echo $vcc->ufh_no?></div>
                                        <div class="col-md-2">EPT : <?php echo $vcc->ept_no?></div>
                                        <div class="col-md-4">Date Refer : <?php echo  date('m d, Y', strtotime($vcc->date_refer))?></div>
                                      </div> 
                                    <hr>
                                      <div class="row">
                                        <h4 style="margin-left:10px">Vaccine History</h4>
                                        <div class="col-md-12 pad10">
                                        <?php if($vcc->history != null): ?>
                                         <?php foreach ($vcc->history as $k =>$hs):?> 
                                        <ul>
                                          <li> Immunazation: <?php echo $hs->immunation ?></li>
                                          <li> Assesement: <?php echo $hs->assesment ?></li>
                                          <li> Vaccine date:  <?php echo date('m d , Y', strtotime($hs->created) ) ?></li>
                                        </ul>
                                        <hr>
                                        </div>
                                       <?php endforeach ?>
                                       <?php endif?>
                                      </div> 
                                    </div>
                                  </div>
                                  <!-- Modal Footer -->
                                  <div class="modal-footer">
                                   <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                                  <button id="vccbtnPrint<?php echo $vcc->id?>" type="button" class="btn btn-default">Print</button>
                                  </div>
                                <script type="text/javascript">
                                       document.getElementById("vccbtnPrint<?php echo $vcc->id?>").onclick = function () {
                                        printElement(document.getElementById("printThis"));
                                    }

                                    function printElement(elem) {
                                        var domClone = elem.cloneNode(true);
                                        
                                        var $printSection = document.getElementById("printSection");
                                        
                                        if (!$printSection) {
                                            var $printSection = document.createElement("div");
                                            $printSection.id = "printSection";
                                            document.body.appendChild($printSection);
                                        }
                                        
                                        $printSection.innerHTML = "";
                                        $printSection.appendChild(domClone);
                                        window.print();
                                        location.reload();
                                    }
                                </script>
                                </div>
                                <!-- Modal Content: ends -->
                                
                              </div>
                            </div>
                        </div>
                  </tr>
                <?php endforeach?>
                <?php endif?>
                </tbody>
              </table>
            </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#timeline" data-toggle="tab">Announcement</a></li>
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

                    <div class="timeline-item bg-success">
                      <span class="time"><i class="fa fa-clock-o"></i>
                         <?php echo date('H:i', strtotime($ann->created))?></span>

                      <h3 class="timeline-header"><?php echo $ann->Title?></h3>

                      <div class="timeline-body">
                        <?php echo $ann->body?>
                      </div>
                      <div class="timeline-footer">
                        <button type="button" class="btn btn-warning btn-small" data-toggle="modal" data-target="#exampleModalLong">
                          DELETE
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">alert!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure you want to delete this announcement
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                <a href="<?php echo base_url('announcement/delete'). '?id='.$ann->id ?>" id="del-announcement" data-id="<?php echo $ann->id?>" class="btn btn-danger">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>

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
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>