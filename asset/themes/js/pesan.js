
$(document).ready(function() {

	$( "input[type=checkbox]" ).on( "click", function() {	
		  	if (this.checked){
		  		$('#name_penerima').val($( "#name_pembeli" ).val());
		  		$('#email_penerima').val($( "#email_pembeli" ).val());
		  		$('#alamat_penerima').val($( "#alamat_pembeli" ).val());
		  		$('#telp_penerima').val($( "#telp_pembeli" ).val());
		  		$("#provinsi_penerima").val($( "#provinsi_pembeli" ).val());
		  		$('#kota').append($("#kota_pembeli > option").clone());
		  		$('#kota').val($( "#kota_pembeli" ).val());
		  		$('#kodepos_penerima').val($( "#kodepos_pembeli" ).val());
		    } else {
		    	$('#form_checkout')[0].reset();
		    	$("#kota option").remove();
		    }
});




 $("#form_checkout").validate({
            rules: {
                nama_penerima: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
                email_penerima: {
                required: true,
                email: true
              },
              alamat_penerima: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              telp_penerima: {           //input name: fullName
                    required: true,   //required boolean: true/false  
                },
              kota_penerima:{
                required:true
              },
              nama_lengkap:{
                required:true
              },
              kodepos_penerima:{
              	required:true,
              },
            },
            messages: {               //messages to appear on error
                nama_penerima: {
                      required:"Masukan Nama Penerima",
                    },
                 email_penerima:{
                    required:"Masukan Email Penerima",
                    email:"Format email Salah"
                 },
                 alamat_penerima:{
                    required:"Masukan Alamat Penerima"
                 },
                 telp_penerima:{
                    required:"Masukan telp Penerima",
                 },
                 kota_penerima:{
                    required:"Pilih provinsi",
                 },
                 kodepos_penerima:{
                    required:"Masukan kodepos Penerima",
                 },
             
            },
            submitHandler: function(form) {
               $('#loadnya').show();
                   $(form).ajaxSubmit({
                            url:"index.php/member/add_pesanan",
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
                                  $('#form_checkout').hide();
                                  $('.alert-error').hide();
                                  $.get("index.php/keranjang/count_cart", function(cart){
                                  $(".troli_side").html(cart);
                                  $(".troli_top").html(cart);
                                });

                                  $.get("index.php/keranjang/price", function(price){
                                  $(".price_side").html(price);
                                  $(".price_top").html(price);
                                  });
                                 $('.alert-success').show();
                              }

                      }
                    });
            }

        });  
});

