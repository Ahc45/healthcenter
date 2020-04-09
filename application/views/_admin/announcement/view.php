
    <section class="content-header">
      <h1>
        Announcement Editor
        <small>Edit your Announcement here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      
      <div class="row">
        <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">CK Editor
                <small>Advanced and full of features</small>
              </h3>
             <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form role="form"  action="<?php echo base_url('announcement/validate')?>" method="post" id="announcement">
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                                  <label for="title">Title </label>
                                  <input type="text" class="form-control"  id="title" name="title" >
                                   <span class="help-block"></span>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                       <textarea class="textarea" name="body" id="body" placeholder="Place some text here"
                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                       <span class="help-block"></span>
                  </div>
                    <br>
                    <div class="form-group">
                         <input type="submit" class="btn btn-primary"  id="title" name="submit"   value="submit">
                    </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>