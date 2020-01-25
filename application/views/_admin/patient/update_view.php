  
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title ?></h3>
          </div>
          
             <form role="form" action="<?php echo base_url('patient/validate')?>" id="patient_update_submit"  >
              <div class="box-body">
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="Patience_no">Patient No</label>
                        <input type="text" class="form-control"  id="patient_no" name="patient_no" value="<?php echo $patient_no?>">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  </div>
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                        <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label>
                      <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                      <span class="help-block"></span>
                    </div>
                  </div>
                   <div class="col-md-1">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middle</label>
                      <input type="text" class="form-control" name="middle_name" id="C" placeholder="Initial">
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.</label>
                        <input type="text" name="contact_no" class="form-control" id="contact_no" placeholder="Contact No">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-3">
                     <div class="form-group">
                      <label>Date:</label>

                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="birthday" class="form-control " id="birthday">
                      </div>
                       <span class="help-block"></span>
                      <!-- /.input group -->
                    </div>
                  </div>
                   <div class="col-md-2">
                    <div class="form-group">
                      <label>Sex</label>
                    <select class="form-control select" name="sex" id ="sex" data-placeholder="Select Sex"
                              style="width: 100%;">
                        <option>Male</option>
                        <option>Female</option>
                      </select>
                       <span class="help-block"></span>
                    </div>
                  </div>
                   <div class="col-md-1">
                    <div class="form-group">
                      <label>Age</label>
                      <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="BP">Blood Preasure</label>
                        <input type="text" name="bp" class="form-control" id="bp" placeholder="Blood Preasure">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Weight</label>
                      <input type="text" class="form-control" name="weight" id="Weight" placeholder="50klg">
                       <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="height">Height</label>
                        <input type="text" name="height" class="form-control" id="height" placeholder="5'6">
                         <span class="help-block"></span>
                      </div>
                   </div>
                </div>
                <div class=" row">
                  <div class="col-md-12">
                       <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
                         <span class="help-block"></span>
                      </div>
                   </div>
                </div>
                <hr>
                 <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" class="form-control" name="password" id="password" value="<?php echo $patient_no?>">
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                
                
              <div class="box-footer">
                 <input type="submit" class="btn btn-primary" value="Update">
              </div>
            </form>
        </div>
      </div>
  </div>