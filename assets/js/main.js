  var base_url = $('#base_url').val();
  console.log(base_url);
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
     $('#birthday').datepicker({
      autoclose: true
    });;
     $('.select2').select2();
     
  });
   $('#patient_add_submit').on('submit', function(e){
       e.preventDefault();
      var $this = $(this);
      console.log($this);
       $.ajax({
          url: $this.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: $this.serializeArray(),
        })
        .fail(function(e) {
          console.log(e.responseText)
          console.log("error");
        })
        .always(function(data) {
          console.log('submited');
          if ( typeof data !="undefined" && !data.is_valid ) {
              $('.form-group').removeClass('has-error');
              $('.error-help-block').text('');
                  var change =   $.each(data.errors, function(index, val) {

                      if (val !="") {
                          $("#" + index).parents('.form-group').addClass('has-error').find('.help-block').text(val).addClass('error-help-block');
                      }
                       console.log(index);
             });
                 
          }else{
              bootbox.dialog({
                title: "Congratulations!", 
                message: "<p>Successfuly add new patient</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url+"patient";
                      }
                    }
                }

              });
          }
        })
      });
