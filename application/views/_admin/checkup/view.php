        <div class="row">


        <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="pull-left header"><i class="fa fa-th"></i><?php  echo $title?></li>
              <li class="<?php echo (!isset($input) && !isset($history)? "active" : "" )?>"><a href="#search" data-toggle="tab">Search</a></li>
              <li class="<?php echo (isset($input) && !isset($history) &&! isset($search)? "active": "" )?>"><a href="#input" data-toggle="tab">Input</a></li>
              <li class="<?php echo (isset($history) && !isset($input) &&! isset($search)? "active": "" )?>" ><a href="#history" data-toggle="tab">Checkup History</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php echo (!isset($input) && !isset($history)? "active" : "" )?>" id="search">
                <div class="row">
                  <div class="col-md-12 col-sm-12">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Search Patient</h3>

                        <div class="box-tools pull-right">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                       <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                          <thead>
                          <tr>
                            <th>Name</th>
                            <th>Patient #</th>
                            <th>action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                          <?php if(isset($patients) && $patients != null): ?>
                          <?php foreach ($patients as $i => $ps): ?>
                              <td><?php echo $ps->first_name.' '. $ps->last_name?></td>
                              <td><?php echo $ps->patient_no?></td>
                              <td> <a href="<?php echo base_url('checkup/input?').'id='.$ps->patient_no?>" class = "btn btn-info"><i class="glyphicon glyphicon-pencil"></i> <span>input</span></a> 
                              <a href="<?php echo base_url('checkup/history?').'id='.$ps->patient_no?>" class = "btn btn-success"><i class="glyphicon glyphicon glyphicon-list"></i> <span>History</span></a></td>
                            </tr>
                          <?php endforeach ?>
                        <?php endif ?>
                          </tbody>
                          
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo (isset($input) && !isset($history) &&! isset($search)? "active": "" )?>" id="input">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="box box-info">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                            <div class="box-header with-border">
                              <h3 class="box-title"><?php echo $title ?></h3>
                            </div>
                            
                              <form role="form" action="<?php echo base_url('checkup/validate')?>" id="checkup_submit"  >
                                <input type="hidden" name="id"  value="<?php echo isset($users_data)? $users_data->id : ''?>">
                                <div class="box-body">
                                  <div class=" row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="Patience_no">Patient No</label>
                                          <input type="text" class="form-control" value="<?php echo get('id')?>"  id="patient_no" name="patient_no">
                                           <span class="help-block"></span>
                                        </div>
                                     </div>
                                   </div>
                                  <div class=" row">
                                     <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="Patience_no">Weight</label>
                                          <input type="text" class="form-control"  id="Weight" name="weight">
                                           <span class="help-block"></span>
                                        </div>
                                     </div><div class="col-md-4">
                                        <div class="form-group">
                                          <label for="Patience_no">Height</label>
                                          <input type="text" class="form-control"  id="Height" name="height">
                                           <span class="help-block"></span>
                                        </div>
                                     </div><div class="col-md-4">
                                        <div class="form-group">
                                          <label for="Patience_no">blood pressure</label>
                                          <input type="textarea" class="form-control"  id="bp" name="bp">
                                           <span class="help-block"></span>
                                        </div>
                                     </div>
                                 </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="box">
                                        <div class="box-header">
                                          <h3 class="box-title">Findings
                                          </h3>
                                          <!-- tools box -->
                                          <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                              <i class="fa fa-minus"></i></button>
                                            <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                                                    title="Remove">
                                              <i class="fa fa-times"></i></button>
                                          </div>
                                          <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <textarea class="textarea" name="findings" placeholder="Place some text here"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.col-->
                                  </div>
                                  <!-- ./row -->
                                <div class="box-footer">
                                   <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php echo (isset($history) && !isset($input) &&! isset($search)? "active": "" )?>" id="history">
                <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">CHECK UP DATA</h3>

                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                         <table id="checkup-history" class="table table-bordered table-striped table-hover table-responsive">
                            <thead>
                            <tr>
                              <th>Name</th>
                              <th>BP</th>
                              <th>weight</th>
                              <th>date</th>
                              <th>findings</th>
                            </tr>
                            </thead>
                           <tbody>
                            <tr>
                            <?php if(isset($ch_history) && $ch_history != null): ?>
                            <?php foreach ($ch_history as $i => $ch): ?>
                                <td><?php echo $ch->first_name.' '. $ch->last_name?></td>
                                <td><?php echo $ch->blood_p?></td>
                                <td><?php echo $ch->weight?></td>
                                <td><?php echo date('M d, Y', strtotime($ch->created))?></td>
                                <td><?php echo $ch->findings?></td>
                              </tr>
                            <?php endforeach ?>
                          <?php endif ?>
                            </tbody>
                            
                          </table>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>


