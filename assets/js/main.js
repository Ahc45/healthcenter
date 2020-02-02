  var base_url = $('#base_url').val();
  console.log(base_url);
  $(function () {
    $('#example1').DataTable()
    $('#patientlist').DataTable({
      'paging'      : false,
      'searching'   : true,
      'autoWidth'   : false
    });

    //  $('#birthday').datepicker({
    //   autoclose: true,
    //   dateFormat: "yyyy-mm-dd"
    // });;
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

    $('#Admin_add_submit').on('submit', function(e){
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
                message: "<p>Successfuly add new Admin</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url+"admin";
                      }
                    }
                }

              });
          }
        })
      });

  $('#checkup_submit').on('submit', function(e){
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
                title: "Success!", 
                message: "<p>Successfuly finished checkup!</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url+"checkup";
                      }
                    }
                }

              });
          }
        })
      });

  $('#vaccine-submit').on('submit', function(e){
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
                title: "Success!", 
                message: "<p>Successfuly added !</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url + "vaccine";
                      }
                    }
                }

              });
          }
        })
      });
  
    $('#vaccine-history-submit').on('submit', function(e){
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
                title: "Success!", 
                message: "<p>Successfuly added!</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url + "vaccine";
                      }
                    }
                }

              });
          }
        })
      });

     $('#family-history-submit').on('submit', function(e){
     // alert("sdfsf");
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
                title: "Success!", 
                message: "<p>Successfuly added!</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url + "patient/familynumber";
                      }
                    }
                }

              });
          }
        })
      });

     $('#first_name').focusout(function(e){
         myText = $(this).val();
        var remove_space = myText.replace(/ /g,'');
        ///alert(remove_space);
        $('#username').val(remove_space);
      });

      $('#last_name').focusout('input',function(e){
         myText = $(this).val();
        var remove_space = myText.replace(/ /g,'');
        ///alert(remove_space);
       
          $('#username').val( $('#username').val() + remove_space);
      });
      $('.btn-app').on('click',function(){
         var famid = $(this).attr('data-id');
         $( "#fam_id" ).val(famid );
      });

$('#add-member-form').on('submit', function(e){
     //alert("sdfsf");
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
                title: "Success!", 
                message: "<p>Successfuly added!</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url + "patient/familynumber";
                      }
                    }
                }

              });
          }
        })
      });

$('#prenatal-submit').on('submit', function(e){
    var p_id = $('#patient_no').val();
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
                title: "Success!", 
                message: "<p>Successfuly added!</p>",
                className: "modal-success",
                buttons: {
                  dismiss: {
                      label: "Dismiss",
                      className: "btn-sm btn-default",
                      callback: function () {
                        window.location.href = base_url+"prenatal/input?id="+p_id;
                      }
                    }
                }

              });
          }
        })
      });