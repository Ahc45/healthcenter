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
                 <a href ="<?php echo base_url('Admin/add')?>" class = "btn btn-md btn-success pull-right right50">Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Account #</th>
                  <th>Role Type</th>
                  <th>Address</th>
                  <th>action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php if(isset($admins) && $admins != null): ?>
                <?php foreach ($admins as $i => $adm): ?>
                    <td><?php echo $adm->first_name.' '. $adm->last_name?></td>
                    <td><?php echo $adm->account_no?></td>
                    <td><?php echo $adm->account_type?></td>
                    <td><?php echo $adm->address?></td>
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