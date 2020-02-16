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
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">Date of Visit</label>
                                              <input type="date" class="form-control" value=""  id="date_of_visit" name="date_of_visit">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">FSN</label>
                                              <input type="text" class="form-control" value=""  id="FSN" name="FSN">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">AP No. (if any)</label>
                                              <input type="text" class="form-control" value=""  id="ap_no" name="ap_no">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="Patience_no">O.B History</label>
                                              <input type="text" class="form-control" value=""  id="ob_history" name="ob_history">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">LMP</label>
                                              <input type="text" class="form-control" value=""  id="lmp" name="lmp">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">EDC</label>
                                              <input type="text" class="form-control" value=""  id="edc" name="edc">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">AOG</label>
                                              <input type="text" class="form-control" value=""  id="aog" name="aog">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>                                                                            
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="Patience_no">FHT</label>
                                              <input type="text" class="form-control" value=""  id="fht" name="fht">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="Patience_no">FHB</label>
                                              <input type="text" class="form-control" value=""  id="fhb" name="fhb">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="Patience_no">POS</label>
                                              <input type="text" class="form-control" value=""  id="pos" name="pos">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>       
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label for="Patience_no">PRES</label>
                                              <input type="text" class="form-control" value=""  id="pres" name="pres">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>                                                                      
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="Patience_no">Tetanos Toxoid Record</label>
                                              <input type="text" class="form-control" value=""  id="tt_record" name="tt_record">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                  </div>

                                  <div class=" row">
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">HR Code (if any)</label>
                                              <input type="text" class="form-control" value=""  id="hr_code" name="hr_code">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">hgb Count</label>
                                              <input type="text" class="form-control" value=""  id="hgb" name="hgb">
                                               <span class="help-block"></span>
                                           </div>
                                      </div> 
                                     <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="Patience_no">Blood Type</label>
                                              <input type="text" class="form-control" value=""  id="blood_type" name="blood_type">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>                                                                                                              
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Patience_no">Micronutrients Given</label>
                                              <input type="date" class="form-control" value=""  id="micoronutients_given" name="micoronutients_given">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Patience_no">Date Given</label>
                                              <input type="text" class="form-control" value=""  id="mg_date_given" name="mg_date_given">
                                               <span class="help-block"></span>
                                           </div>
                                      </div> 
                                  </div>
                                  <div class=" row">
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Patience_no">Food Supplement Given</label>
                                              <input type="date" class="form-control" value=""  id="food_suplement" name="food_suplement">
                                               <span class="help-block"></span>
                                           </div>
                                      </div>
                                     <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="Patience_no">Date Given</label>
                                              <input type="text" class="form-control" value=""  id="fs_date_given" name="fs_date_given">
                                               <span class="help-block"></span>
                                           </div>
                                      </div> 
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="box">
                                        <div class="box-header">
                                          <h3 class="box-title">History of last Pregnancy
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
                                           <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="Patience_no">Date of last Delivery</label>
                                                      <input type="date" class="form-control" value=""  id="last_delivery" name="last_delivery">
                                                       <span class="help-block"></span>
                                                   </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="Patience_no">Place</label>
                                                      <input type="text" class="form-control" value=""  id="place_last_delivery" name="place_last_delivery">
                                                       <span class="help-block"></span>
                                                   </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="Patience_no">Type of Delivery</label>
                                                      <input type="text" class="form-control" value=""  id="typeofdelivery" name="typeofdelivery">
                                                       <span class="help-block"></span>
                                                   </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label for="Patience_no">Attended by</label>
                                                      <input type="text" class="form-control" value=""  id="attent_by" name="attent_by">
                                                       <span class="help-block"></span>
                                                   </div>
                                              </div>
                                           </div>
                                           </div>

                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.col-->
                                  </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="box">
                                        <div class="box-header">
                                          <h3 class="box-title">Dental
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
                                           <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label for="exampleInputPassword1">Dental Checkup done</label>
                                                    <select class="form-control" name="dental_checkup" id ="dental_checkup" data-placeholder="select"
                                                          style="width: 100%;">
                                                    <option> Yes</option>
                                                    <option> No</option>
                                                  </select>
                                                </div>
                                             </div>
                                           </div>
                                      </div>
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


