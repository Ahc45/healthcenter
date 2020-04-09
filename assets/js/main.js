  jQuery(document).ready(function($) {
    console.log("ready now");
  var is_query = 0;

  var base_url = $('#base_url').val()
  , $win = $(window)
  , main = {
        init: function () {
            this.initPlugin()
            this.addPatient()
            this.addAdmin()
            this.checkUp()
            this.vaccine()
            this.vaccinehistory()
            this.familynumber()
            this.autoUser()
            this.addMember()
            this.prenatal()
            this.announcement()
            this.print()
            this.delAnnouncement()
            this.front()
          },
            front: function(){
                $('#loginsub').on('submit', function(e){
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
                        console.log(data);
                      }
                    })
                  });
            },
            delAnnouncement: function(){
                $('#del-announcement').on('click', function(e){
                   e.preventDefault();
                      $this= $(this);
                      console.log($this);
                     var delid = $this.data('id');

                      console.log(delid);
                   $.ajax({
                      // url: base_url+'/announcement/delete' + delid,

                      url: $this.attr('href'),
                      type: 'GET',
                      dataType: 'json',
                      data: {id:$this.data('id')},
                    })
                    .fail(function(e) {
                      console.log(e.responseText)
                      console.log("error");
                    })
                    .always(function(data) {
                      console.log('submited');
                      if ( typeof data !="undefined" && !data.is_valid ) {
                           bootbox.dialog({
                            title: "OH! no!", 
                            message: "<p>Something Went Wrong!/p>",
                            className: "modal-warning",
                            buttons: {
                              dismiss: {
                                  label: "Dismiss",
                                  className: "btn-sm btn-default",
                                  callback: function () {
                                    window.location.href = base_url+"dashboard";
                                  }
                                }
                            }

                          });
                      }else{
                          bootbox.dialog({
                            title: "Congratulations!", 
                            message: "<p>Successfully! deleted</p>",
                            className: "modal-success",
                            buttons: {
                              dismiss: {
                                  label: "Dismiss",
                                  className: "btn-sm btn-default",
                                  callback: function () {
                                    window.location.href = base_url+"dashboard";
                                  }
                                }
                            }

                          });
                      }
                    })
                });
            },

            print: function(){
              $('#print').on('click', function(){
                console.log('print!')
                  window.print();
              });
            },
            initPlugin: function(){
              $('#example1').DataTable();
              $('#example2').DataTable()
              $('#patientlist').DataTable({
                'paging'      : false,
                'searching'   : true,
                'autoWidth'   : false,
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                      ]
            

              });
              $('.select2').select2();
            },
            addPatient: function(){
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
                            message: "<p>Successful!</p>",
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
            },
            addAdmin: function(){
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
                          message: "<p>Successfully add new Admin</p>",
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
            },
            checkUp: function(){
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
                        message: "<p>Successfully finished checkup!</p>",
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
            },
            vaccine: function(){
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
                          message: "<p>Successfully added !</p>",
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
            },
            vaccinehistory: function(){
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
                          message: "<p>Successfully added!</p>",
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
            },
            familynumber: function(){
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
                            message: "<p>Successfully added!</p>",
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
            },
            autoUser: function(){
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
            },
            addMember: function(){
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
                            message: "<p>Successfully added!</p>",
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
            },
            prenatal: function(){
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
                              message: "<p>Successfully added!</p>",
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
            },
            announcement: function(){
                $('#announcement').on('submit', function(e){
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
                            message: "<p>Successfully added!</p>",
                            className: "modal-success",
                            buttons: {
                              dismiss: {
                                  label: "Dismiss",
                                  className: "btn-sm btn-default",
                                  callback: function () {
                                    window.location.href = base_url;
                                  }
                                }
                            }

                          });
                      }
                    })
                  });
            }
    }
    main.init()
    });

