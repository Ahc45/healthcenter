    <section class="content-header">
      <h1>
      
        <?php echo $title?>
      </h1>
    
    </section>

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
              <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Account No/</th>
                  <th>Role Type</th>
                  <th>Address</th><?php if(session('account_type') != "BHW"):?> 
                  <th>action</th><?php endif ?>
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
                   <?php if(session('account_type') != "BHW"):?> <td><a href="<?php echo base_url('admin/edit/'.$adm->id)?>"class = "btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a> 
                     <a href="<?php echo base_url('admin/delete').'?id='.$adm->id ?>" class = "btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                   </td><?php endif ?>
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