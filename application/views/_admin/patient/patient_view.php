    <section class="content-header">
      <h1>
      
        <?php echo $title?>
      </h1>
    
    </section>
    <section class="content">
      <?php if($this->session->flashdata('message')):?>
       <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Success!</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="b!tn btn-box-tool" data-widget="remove"><i class="fa fa-close"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
               Succesfully updated patient information!
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
      </div>
    <?php endif?>
 <?php if($this->session->flashdata('delmessage')):?>
       <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
              <div class="box-header with-border">
                <h3 class="box-title">Deleted!</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="b!tn btn-box-tool" data-widget="remove"><i class="fa fa-close"></i></button>
                </div>
                <!-- /.box-tools -->
              </div>
            </div>
            <!-- /.box -->
          </div>
      </div>
    <?php endif?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $title?> List</h3>
                 <a href ="<?php echo base_url('patient/add')?>" class = "btn btn-md btn-success pull-right right50">Add New</a>
            </div>    
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Family Number</th>
                  <th>Pateince No</th>
                  <th>Address</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php if(isset($patients) && $patients != null): ?>
                <?php foreach ($patients as $i => $ps): ?>
                    <td><?php echo $ps->first_name.' '. $ps->last_name?></td>
                    <td><?php echo $ps->fam_id?></td>
                    <td><?php echo $ps->patient_no?></td>
                    <td><?php echo $ps->address?></td>
                    <td> <button data-target="#update-<?php echo $ps->patient_no?>" id="update-btn"  data-toggle="modal" type="button" class="btn btn-success" data-toggle="modal" >
                      <i class="glyphicon glyphicon-pencil"></i></button> 
                      <button data-target="#delete-<?php echo $ps->patient_no?>"  data-toggle="modal"  class = "btn btn-danger"><i class="glyphicon glyphicon-trash"></i> </button>
                       <div class="modal fade" id="delete-<?php echo $ps->patient_no?>">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Delete Patient </h4>
                                  </div>
                                  <div class="modal-body">
                                      <h4>Are you sure you want to delete this patient?</h4>
                                  </div>
                                   <div class="modal-footer">
                                     <a href="<?php echo base_url('patient/del').'?id='.$ps->id?>" type="button" class="btn btn-danger">Delete</a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                    </td> 
                          <div class="modal fade" id="update-<?php echo $ps->patient_no?>">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Update Patient </h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-10 col-md-offset-1">
                                          <div class="box box-info">
                                            <div class="box-header with-border">
                                              <!-- <h3 class="box-title"><?php echo $title ?></h3> -->
                                            </div>
                                            
                                               <form role="form" action="<?php echo base_url('patient/validate')?>" id="patient_update_submit" method="post"  >
                                                <div class="box-body">
                                                  <input type="hidden" name="patient_id" value="<?php echo $ps->id?>">
                                                  <div class=" row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                          <label for="exampleInputEmail1">First Name</label>
                                                          <input type="text" name="first_name" class="form-control" id="first_name" value="<?php echo $ps->first_name?>" >
                                                          <span class="help-block"></span>
                                                        </div>
                                                     </div>
                                                    <div class="col-md-5">
                                                      <div class="form-group">
                                                        <label for="exampleInputPassword1">Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $ps->last_name?>" >
                                                        <span class="help-block"></span>
                                                      </div>
                                                    </div>
                                                     <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label for="exampleInputPassword1">Middle</label>
                                                        <input type="text" class="form-control" name="middle_name" id="C" placeholder="Initial" value="<?php echo $ps->middle_name?>">
                                                         <span class="help-block"></span>
                                                    </div>
                                                    </div>
                                                  </div>
                                                  <div class=" row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label for="exampleInputEmail1">Contact No.</label>
                                                          <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact No" value ="<?php echo $ps->contact_no?>">
                                                           <span class="help-block"></span>
                                                      </div>
                                                     </div>
                                                    <div class="col-md-4">
                                                       <div class="form-group">
                                                        <label>Date:</label>

                                                        <div class="input-group">
                                                          <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                          </div>
                                                          <input type="date" name="birthday" class="form-control " id="birthday" 
                                                          value ="<?php echo date("Y-m-d", (strtotime($ps->birthday)))?>">
                                                        </div>
                                                         <span class="help-block"></span>
                                                        <!-- /.input group -->
                                                      </div>
                                                    </div>
                                                     <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label>Sex</label>
                                                      <select class="form-control select" name="sex" id ="sex" data-placeholder="Select Sex"
                                                                style="width: 100%;">
                                                          <option <?php echo ($ps->patient_no == "Male")? "select" : ''?>>Male</option>
                                                          <option <?php echo ($ps->patient_no == "Female")? "select" : ''?>>Female</option>
                                                        </select>
                                                         <span class="help-block"></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class=" row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label for="bp">Blood Preasure</label>
                                                          <input type="text" name="bp" class="form-control" id="bp" value ="<?php echo $ps->bp?> ">
                                                           <span class="help-block"></span>
                                                        </div>
                                                     </div>
                                                    <div class="col-md-3">
                                                      <div class="form-group">
                                                        <label for="weightaa">Weight</label>
                                                        <input type="text" class="form-control" name="weight" id="Weight" value ="<?php echo $ps->weight?> ">
                                                         <span class="help-block"></span>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                          <label for="height">Height</label>
                                                          <input type="text" name="height" class="form-control" id="height" value ="<?php echo $ps->height?>">
                                                           <span class="help-block"></span>
                                                        </div>
                                                     </div>
                                                     <div class="col-md-3">
                                                      <div class="form-group">
                                                        <label>Age</label>
                                                        <input type="text" class="form-control" name="age" id="age" value ="<?php echo $ps->age?>">
                                                         <span class="help-block"></span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class=" row">
                                                    <div class="col-md-12">
                                                         <div class="form-group">
                                                          <label for="address">Address</label>
                                                          <input type="text" name="address" class="form-control" id="address" value ="<?php echo $ps->address?>">
                                                           <span class="help-block"></span>
                                                        </div>
                                                     </div>
                                                  </div>
                                                  <hr>
                                                  
                                                  
                                                <div class="box-footer">
                                                   <input type="submit" class="btn btn-primary" name="update" value="Update">
                                                </div>
                                              </form>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                  </div> -->
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
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
      <!-- /.row -->
    </section>
