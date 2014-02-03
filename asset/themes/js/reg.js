   $(document).ready(function(){
     $('.noonly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
    });
      $('.pos').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
    });
    $("#register").validate({
            rules: {
                username: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
                  password: {
                  required: true,
                  minlength: 3
                },
                pass2: {
                  required: true,
                  minlength: 3,
                  equalTo: "#pass1"
                },
                email: {
                required: true,
                email: true
              },
              alamat: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              telp: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              provinsi: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              kodepos: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              kota:{
                required:true
              },
              nama_lengkap:{
                required:true
              }
            },
            messages: {               //messages to appear on error
                username: {
                      required:"Masukan Username",
                    },
                 password:{
                 		required:"Masukan Password",
                    minlength:"Password Minimal 3 karakter",
                 },
                 pass2:{
                    required:"Masukan lagi password",
                    equalTo:"Password Harus Sama",
                    minlength:"Password Minimal 3 karakter",
                 },
                 email:{
                    required:"Masukan email",
                    email:"Format email Salah"
                 },
                 alamat:{
                    required:"Masukan Alamat"
                 },
                 telp:{
                    required:"Masukan telp",
                 },
                 kota:{
                    required:"Pilih provinsi",
                 },
                 kodepos:{
                    required:"Masukan kodepos",
                 },
                 nama_lengkap:{
                  required:"Masukan Nama Lengkap"
                }
             
            },
            submitHandler: function(form) {
               $('#loadnya').show();
                   $(form).ajaxSubmit({
                            url:"register/add_user",
                           type:"post",
                        success: function(data){
                          $('#loadnya').hide();
                           // $("#go").html(data);
                           cek= data;
                            // $("#result").html(data);
                              if (cek!='good') {
                                    $('.alert-error').show();
                                    $(".alert-error").html(data);
                              } else {
                                  $('#register').hide();
                                  $('.alert-error').hide();
                                 $('.alert-success').show();
                              }

                      }
                    });
            }

        });  
})
 