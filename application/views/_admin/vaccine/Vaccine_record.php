<div class="row">
    <div class="col-md-10 col-md-offset-1"> 
             <form role="form" action="<?php echo base_url('vaccine/validate_vaccine_record')?>" id="vaccine-history-submit"  >
              <div class="box-body">
                <div class=" row">
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="immunazation">Immunazation</label>
                      <input type="text" class="form-control" name="immunazation" id="immunazation" >
                       <span class="help-block"></span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="follow_up">Follow up checkup</label>
                      <input type="date" class="form-control" name="follow_up" id="follow_up" >
                       <span class="help-block"></span>
                    </div>
                    <input type="hidden" name="vacc_id" value="<?php echo get('id')?>" >
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="birthday">Asesment</label>
                      <textarea   class="form-control" name="assesment" id="assesment"></textarea>
                      <span class="help-block"></span>
                    </div>
                  </div>

                <div class="box-footer">
                   <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </div>
                </div>
                
            </form>
        </div>
  </div>



<?php if (isset($all_vaccine_record)): ?>
<div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vaccine Record</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Immunation</th>
                  <th>Assesment</th>
                  <th>Status</th>
                  <th>Follow up</th>
                </tr>
              <?php foreach ($all_vaccine_record as $key => $vcc_r):?>
                <tr>
                  <td><?php echo $vcc_r->id?></td>
                  <td><?php echo date('d M, Y', strtotime($vcc_r->created)) ?></td>
                  <td><?php echo $vcc_r->immunation?></td>
                  <td><?php echo $vcc_r->assesment?></td>
                  <td><span class="label label-success"><?php echo $vcc_r->follow_up?></span></td>
                </tr>
              <?php endforeach ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
<?php endif ?>