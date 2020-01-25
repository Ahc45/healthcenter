
<section class="content-header">
  <div class="row"> 
      <div class="col-md-6"> 
      <h1>
        Vaccines
        <small> List patient</small>
      </h1>
    </div>
     
    <div class="col-md-3 pull-right">
      <form action="#" method="get">
        <div class="input-group ">
          <input type="text" name="q" class="form-control" placeholder="Search...">
             <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <br>
      <button data-target="#new-vaccine" id="new-vacc"  data-toggle="modal" type="button" class="btn btn-success" data-toggle="modal" >add new</button>
    </div>

    <div class="modal fade" id="new-vaccine">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New </h4>
              </div>
              <div class="modal-body">
                <?php $this->load->view('_admin/vaccine/add')?>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div> -->
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
  </div>
<section class="content">
  <?php if(isset($all_vaccine)):?>
  <div class="box box-default color-palette-box">
      <div class="row">
        <?php foreach ($all_vaccine as $i => $vacc):?>
            <div class="col-md-4">
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class=" widget-user-header bg-blue ">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="widget-user-username"><?php echo $vacc->name?></h3> 
                      <h5 class="widget-user-desc">MOTHER: <?php echo $vacc->mother?></h5>  
                    </div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('vaccine/history').'?id='. $vacc->id?>"  class="btn btn-warning  outline">Proceed</a>
                    </div>
                  </div>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a href="#">Birth history:  <span class="pull-right "><?php echo $vacc->birth_history?> </span></a></li>
                    <li><a href="#">FH No. <span class="pull-right badge "><?php echo $vacc->fh_no?></span></a></li>
                    <li><a href="#">UFH No.<span class="pull-right badge "><?php echo $vacc->ufh_no?></span></a></li>
                    <li><a href="#">EPT No. <span class="pull-right badge "><?php echo $vacc->ept_no?></span></a></li>
                    <li><a href="#">Date refered for new born screening:  <span class="pull-right badge"><?php echo date('d M, Y', strtotime($vacc->date_refer)) ?></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endforeach?>
     </div>
     
  </div>
  <?php endif ?>
</section>