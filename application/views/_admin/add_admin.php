  
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $title ?></h3>
          </div>
          
             <form role="form" action="<?php echo base_url('Admin/validate')?>" id="Admin_add_submit"  >
              <input type="hidden" name="id"  value="<?php echo isset($users_data)? $users_data->id : ''?>">
              <div class="box-body">
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="Patience_no">Account No</label>
                        <input type="text" class="form-control"  id="account_no" name="account_no" value="<?php echo (isset($users_data)? $users_data->account_no : $account_no)?>">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  </div>
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?php echo (isset($users_data)? $users_data->first_name : '')?>">
                        <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name</label>
                      <input type="text" class="form-control"  value="<?php echo (isset($users_data)? $users_data->last_name : '')?>" name="last_name" id="last_name" placeholder="Last Name"  >
                      <span class="help-block"></span>
                    </div>
                  </div>
                   <div class="col-md-1">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middle</label>
                      <input type="text" class="form-control" name="middle_name" value="<?php echo (isset($users_data)? $users_data->middle_name : '')?>" id="middle_name" placeholder="Initial">
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name="address" class="form-control" value="<?php echo (isset($users_data)? $users_data->email : '')?>" id="address" placeholder="Address">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-3">
                     <div class="form-group">
                      <label>Date:</label>

                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" name="birthday" value="<?php echo (isset($users_data)? $users_data->birthday : '')?>" class="form-control pull-right" id="birthday">
                      </div>
                       <span class="help-block"></span>
                      <!-- /.input group -->
                    </div>
                  </div>
                   <div class="col-md-3">
                    <div class="form-group">
                      <label>Sex</label>
                      <select class="form-control " name="sex" id ="sex"  data-placeholder="Select Sex"
                              style="width: 100%;">
                        <option <?php echo (isset($users_data) && $users_data == "Male" ? "selected" : '')?> >Male</option>
                        <option <?php echo (isset($users_data) && $users_data == "Female" ? "selected" : '')?> >Female</option>
                      </select>
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.</label>
                        <input type="text" name="contact_no" class="form-control" value="<?php echo (isset($users_data)? $users_data->contact_no : '')?>" id="contact_no" placeholder="Contact No">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Account type</label>
                        <select class="form-control" name="account_type" id ="account_type" data-placeholder="select"
                              style="width: 100%;">
                        <option <?php echo (isset($users_data) && $users_data == "Admin" ? "selected" : '')?> >Admin</option>
                        <option <?php echo (isset($users_data) && $users_data == "Midwife" ? "selected" : '')?> >Midwife</option>
                        <option <?php echo (isset($users_data) && $users_data == "BHW" ? "selected" : '')?> >BHW</option>
                      </select>
                  </div>
                </div>
              </div>
                <hr>
                 <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" value="<?php echo (isset($users_data)? $users_data->username : '')?>"  name="username" id="username" placeholder="Username">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="text" class="form-control"  value="<?php echo (isset($users_data)? $users_data->password : $account_no)?>"  name="password" id="password">
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                
                
              <div class="box-footer">
                 <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
        </div>
      </div>
  </div>