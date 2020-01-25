  
  <div class="row">
    <div class="col-md-10 col-md-offset-1"> 
             <form role="form" action="<?php echo base_url('vaccine/validate')?>" id="vaccine-submit"  >
              <div class="box-body">
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control"  id="name" name="name">
                         <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="mother">Mother's Name</label>
                        <input type="text" name="mother" class="form-control" id="mother" placeholder="Full Name">
                        <span class="help-block"></span>
                      </div>
                   </div>
                  </div>
                <div class=" row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="birthday">Birthday</label>
                      <input type="date" class="form-control" name="birthday" id="birthday">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="sex">sex</label>
                      <input type="text" class="form-control" name="sex" id="sex" >
                       <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="contact_no">Contact No.</label>
                      <input type="text" class="form-control" name="contact_no" id="contact_no" >
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" >
                        <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="birth_history">Birth History</label>
                      <input type="text" class="form-control" name="birth_history" id="birth_history">
                      <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="feeding_history">Feeding History</label>
                      <input type="text" class="form-control" name="feeding_history" id="feeding_history" >
                       <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                <div class=" row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="birth_wt">Bith WT</label>
                        <input type="text" name="birth_wt" class="form-control" id="birth_wt" >
                        <span class="help-block"></span>
                      </div>
                   </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="tt_satatus">TT Sattus</label>
                      <input type="text" class="form-control" name="tt_satatus" id="tt_satatus" >
                      <span class="help-block"></span>
                    </div>
                  </div>
                </div>
               <div class=" row">
                 <div class="col-md-3">
                    <div class="form-group">
                      <label for="ufh_no">UFH No.</label>
                      <input type="text" class="form-control" name="ufh_no" id="ufh_no" >
                       <span class="help-block"></span>
                    </div>
                 </div>
                 <div class="col-md-3">
                    <div class="form-group">
                      <label for="ept_no">EPT No.</label>
                      <input type="text" class="form-control" name="ept_no" id="ept_no" >
                       <span class="help-block"></span>
                    </div>
                 </div>
                 <div class="col-md-3">
                      <div class="form-group">
                        <label for="fh_no">FH No.</label>
                        <input type="text" class="form-control" name="fh_no" id="fh_no">
                         <span class="help-block"></span>
                      </div>
                 </div>
              </div>
              <div class="row"> 
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="date_refer">Date refered for new born Screening</label>
                        <input type="date" name="date_refer" class="form-control" id="date_refer">
                        <span class="help-block"></span>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="time_initiated">Time Initiated</label>
                      <input type="time" class="form-control" name="time_initiated" id="time_initiated">
                      <span class="help-block"></span>
                    </div>
                  </div>
              </div> 
              <div class="box-footer">
                 <input type="submit" class="btn btn-primary" value="Submit">
              </div>
            </div>
            </form>
        </div>
  </div>
