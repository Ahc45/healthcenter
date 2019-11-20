    <section class="content-header">
      <h1>
      
        <?php echo $title?>
      </h1>
    
    </section>
    <section class="content">
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
                  <th>Pateince #</th>
                  <th>Family Number</th>
                  <th>Address</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php if(isset($patients) && $patients != null): ?>
                <?php foreach ($patients as $i => $ps): ?>
                    <td><?php echo $ps->first_name.' '. $ps->last_name?></td>
                    <td><?php echo $i?></td>
                    <td><?php echo $ps->patient_no?></td>
                    <td><?php echo $ps->address?></td>
                    <td><a href="#" class = "btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>  <a href="#" class = "btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a></td>
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