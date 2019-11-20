    <div class="alert <?php echo $this->session->flashdata('alert_type'); ?> alert-dismissible  <?php $this->session->flashdata('show') != "" ? $var = 'show' : $var= 'hide' ; echo $var?>">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo $this->session->flashdata('title') ?></strong>
    <?php print_r( $this->session->flashdata('message')); ?>

    
  </div>