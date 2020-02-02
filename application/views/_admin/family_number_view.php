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
             Succesfully Remove!
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
      </div>
    <?php endif?>
  <div class="box">
    <div class="box-body">
        <div class="row">
          <div class="col-md-12">
                   <form  action="<?php echo base_url('patient/validate_fam_no')?>" id="family-history-submit"  >
                    <div class="box-body">
                      <div class=" row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="family_number">Family No.</label>
                              <input type="text" class="form-control" name="family_number" id="family_number" placeholder="Enter Number" >
                               <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="familyname">Family Name</label>
                              <input type="text" class="form-control" name="familyname" id="familyname" >
                               <span class="help-block"></span>
                            </div>
                          </div>
                          <div class="col-md-6" style="background: inherit;">

                            <div class="form-group">
                              <label for="familyname"></label>
                             <input type="submit" class="btn btn-primary" value="Submit">
                           </div>
                        </div>
                      </div>
                    </div>
                      
                  </form>
        </div>
      </div>
    </div>
  </div>

      <?php if (isset($family_no) && $family_no != null): ?>
      
 
  <div class="box">
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12">
              <table id="example1" class=" table table-striped display">
                <thead>
                <tr>
                  <th>Family Number</th>
                  <th>Family Name</th>
                  <th>Action</th>
                  <th  class ="none">Members</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($family_no as $key => $fam) :?>
                  <tr>
                      <td><?php echo $fam->family_number?> </td>
                      <td><?php echo $fam->family_name?> </td>
                      <td><button class="btn btn-app " data-toggle="modal" id="add-btn"  data-id="<?php echo $fam->id?>" data-target="#fam-num-mod" ><i class="fa  fa-child"></i> Add member</button>
                      </td>
                      <td>
                          <ul class="list-group">
                         <?php if (isset($all_patient)): ?>
                            <?php foreach ($all_patient as $i => $patient): ?> 
                                  <?php if($patient->family_number == $fam->id):?>
                                    <li class="list-group-item"><?php echo $patient->first_name.' '. $patient->last_name?>  <a href="<?php echo base_url('patient/del_fam').'?id='. $patient->id?>" type="button" class="btn btn-danger pull-right">Remove</a></li>
                                  <?php endif?>
                            <?php endforeach?>
                          <?php endif?>
                        </ul>
                      </td>
                  </tr>
                <?php endforeach?>
                </tbody>
                
              </table>
          </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
      <!-- /.row -->
      <?php endif ?>
    <div class="modal fade" id="fam-num-mod">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ADD Patient </h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
              <div class="row">
                  <form action="<?php echo base_url('patient/add_member')?>" method="post" id="add-member-form"> 
                    <input type="hidden" name="fam_id" id=fam_id value="">
                    <div class="col-md-12">
                    <div class="form-group" data-select2-id="26">
                      <label>SEARCH PATIENT</label>
                      <select class="form-control select2 select2-hidden-accessible" multiple="" name="patient[]" data-placeholder="Select a State" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                        <?php if (isset($all_patient)): ?>
                            <?php foreach ($all_patient as $i => $pt): ?> 
                                <option data-select2-id="<?php echo $pt->id?>" value="<?php echo $pt->id?>"><?php echo $pt->last_name .' '.$pt->first_name?></option>
                            <?php endforeach ?>
                        <?php endif ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
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
</section>
  <script type="text/javascript">
            $(document).ready(function() {
                  var table = $('#example1').DataTable({
                     'responsive': true,
                         dom: 'Bfrtip',
                      buttons: [
                         'csv', 'excel','pdf'
                      ]
                });
            } );
    </script>