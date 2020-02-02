        <div class="row">


        <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="pull-left header"><i class="fa fa-th"></i><?php  echo $title?></li>
              <li class="<?php echo (!isset($input) && !isset($history)? "active" : "" )?>"><a href="#search" data-toggle="tab">Search</a></li>
              <li class="<?php echo (isset($input) && !isset($history) &&! isset($search)? "active": "" )?>"><a href="#input" data-toggle="tab">Prenal record</a></li>
              
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
                            <th>Pateince #</th>
                            <th>action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                          <?php if(isset($patients) && $patients != null): ?>
                          <?php foreach ($patients as $i => $ps): ?>
                              <td><?php echo $ps->first_name.' '. $ps->last_name?></td>
                              <td><?php echo $ps->patient_no?></td>
                              <td> <a href="<?php echo base_url('prenatal/input?').'id='.$ps->patient_no?>" class = "btn btn-info"><i class="glyphicon glyphicon-pencil"></i> <span>Record</span></a> 
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
                          <div class="col-md-12">
                            <form role="form" action="<?php echo base_url('prenatal/validate')?>" id="prenatal-submit"  >
                                <input type="hidden" name="id"  value="<?php echo isset($users_data)? $users_data->id : ''?>">
                                <div class="box-body">
                                  <div class=" row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="Patience_no">Patient No</label>
                                          <input type="text" class="form-control" value="<?php echo get('id')?>"  id="patient_no" name="patient_no" readonly>
                                           <span class="help-block"></span>
                                        </div>
                                     </div>
                                   </div>
                                  <div class=" row">
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="fp_counseling" <?php echo (isset($record) && $record->fp_counseling == "on")? "checked": 'uchecked'?> >
                                                  FP counseling
                                                </label>
                                              </div>
                                            </div>
                                           <span class="help-block"></span>
                                      </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                              <div class="checkbox">
                                                <label>
                                                  <input type="checkbox" name="with_philhealth" <?php echo (isset($record) && $record->with_philhealth == "on")? "checked": 'uchecked'?>>
                                                  With Philhealth
                                                </label>
                                              </div>
                                            </div>
                                           <span class="help-block"></span>
                                      </div>
                                      <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="Patience_no">Philhealth No</label>
                                          <input type="text" class="form-control"   id="philhealth" name="philhealth" value="<?php echo (isset($record))? $record->philhealth  :''?>">
                                           <span class="help-block"></span>
                                        </div>
                                     </div>
                                     <div class="col-md-2">
                                        <div class="form-group">
                                          <label for="Patience_no">Birth Plan</label>
                                          <input type="text" class="form-control"   id="birth_plan" name="birth_plan" value="<?php echo (isset($record))? $record->birth_plan  :''?>">
                                           <span class="help-block"></span>
                                        </div>
                                     </div>
                                 </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="box">
                                        <div class="box-header">
                                          <h3 class="box-title">Prenatal Note
                                          </h3>
                                          <!-- tools box -->
                                          <div class="pull-right box-tools">
                                            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                    title="Collapse">
                                              <i class="fa fa-minus"></i></button>
                                          </div>
                                          <!-- /. tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body pad">
                                            <textarea class="textarea" name="prenatal_note" placeholder="Place some text here"
                                                      style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                  <div class="box box-info">
                                    <div class="box-header with-border">
                                      <h3 class="box-title">Prenatal Record</h3>

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
                                              <th>Prenatal Note</th>
                                              <th>Date</th>
                                            </tr>
                                            </thead>
                                           <tbody>
                                            <tr>
                                            <?php if(isset($prenatal_record) && $prenatal_record != null): ?>
                                            <?php foreach ($prenatal_record as $i => $pr): ?>
                                                <td><?php echo $pr->prenatal_note?></td>
                                                <td><?php echo date('M d, Y', strtotime($pr->created))?></td>
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
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
              <!-- /.tab-pane -->


              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>


