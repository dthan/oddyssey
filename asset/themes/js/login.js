   $(document).ready(function(){
     $('.noonly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $("#login_form").validate({
            rules: {
                username: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
                   password: {           //input name: fullName
                    required: true,   //required boolean: true/false   
                },
            },
            messages: {               //messages to appear on error
                username: {
                      required:"Masukan Username",
                    },
                 password:{
                 		required:"Masukan Password",
                 },
             
            },
            submitHandler: function(form) {
               $('#loader').show();
                   $(form).ajaxSubmit({
                            url:"auth_user",
                           type:"post",
                        success: function(data){
                          $('#loader').hide();
                           // $("#go").html(data);
                           cek= data;
                            // $("#result").html(data);
                              if (cek=='failed') {
                                    $('.alert').show();
                              } else {
                                window.location.replace(document.referrer);
                              }

                      }
                    });
            }

        });  
})
 