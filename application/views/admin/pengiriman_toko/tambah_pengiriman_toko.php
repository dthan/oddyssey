<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ===================== Touch Icons ===================== -->
     <link rel="shortcut icon" href="<?= base_url(); ?>asset/admin/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url(); ?>asset/admin/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url(); ?>asset/admin/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url(); ?>asset/admin/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url(); ?>asset/admin/apple-touch-icon-57-precomposed.png">

    <!-- ===================== CSS ===================== -->    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>  
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/bootstrap/bootstrap-responsive.min.css">    
    <!-- Site specific - CSS -->   
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/prettify.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/jquery-ui-1.8.20.custom.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/chosen.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/dropkick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/multi-select.css">    
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/jquery.ibutton.css">    
    
    <!-- Common - CSS -->  
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/common.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light.css" class="style_set">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/fancybox/jquery.fancybox.css">

  
  <!-- HTML5 Shiv
  ================================================== -->
  
  

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body> 
   <?php 
      $this->load->view('admin/setting'); 
      $this->load->view('admin/top');  
   ?>
            
    <div class="container">              
      <div class="main_content row-fluid">

       <div class="span3">
        <?php $this->load->view('admin/menu') ?>          
        </div><!--/span-->
        <div class="span9">
          <div class="row-fluid">
            <div class="span12">

              <ul class="breadcrumb br_styled no_space">
                <li>
                  <a href="<?= base_url() ?>admin">Dashboard</a> <span class="divider">/</span>
                </li>                
                <li><a href="<?= base_url() ?>pengiriman_toko">toko</a></li><span class="divider">/</span>
                <li class="active">Tambah Pengiriman toko</li>
              </ul> 
              <ul class="page_info" >
          
                                    
                    <form  method="POST" id="form_input_toko" action="<?= base_url() ?>pengiriman_toko/tambah" enctype="multipart/form-data">                     
                     
                      <div class="row-fluid">
                        <div class="span3">Nama toko:</div>
                        <div class="span9"><?= form_dropdown('toko', $toko,  '', 'id="toko"  class="chzn-select" data-placeholder="pilih toko"  style="width:220px;" tabindex="2" ') ?>
                          <a href="#gggg" class="various2" style="position:relative;top:-10px"><img  src="<?= base_url() ?>asset/admin/img/add.png" />tambah toko</a>
                        </div> 
                      </div>  

                       <div class="row-fluid">
                        <div class="span3">Alamat:</div>
                        <div class="span9">
                        <input  type="checkbox" name="samakan"  id="samakan" >samakan dengan alamat toko<br/>
                             <textarea id="alamat" required="" name="alamat"></textarea></div> 
                      </div> 
                       <div class="row-fluid">
                        <div class="span3">Kurir</div>
                        <div class="span9"><?= form_dropdown('jasa_pengiriman', $jasa_pengiriman,  '', 'id="kurir" required class="chzn-select" data-placeholder="pilih kurir"  style="width:220px;" tabindex="2" ') ?></div> 
                      </div>  
                     
                     <div class="row-fluid">
                        <div class="span3">Biaya Pengiriman:</div>
                        <div class="span9"><input type="text" id="biaya_pengiriman" name="biaya_pengiriman">
                         </div> 
                      </div> 
                       <?php
                       for ($i=1; $i<=20 ; $i++) { 
                        ?>
                        <div class="row-fluid" id="produk<?= $i ?>" <?php if($i!=1) echo "style='display:none'"; ?>>
                        <div class="span3"><?php if($i==1) echo "Produk" ?></div>
                        <div class="span9"><?= form_dropdown('produk-'.$i, $produk,  '', 'id="produk-'.$i.'" onchange="cek_stok('.$i.')" class="chzn-select" data-placeholder="pilih produk"  style="width:220px;float:left" tabindex="2" ') ?>
                           jumlah <input type="text" id="jml-<?= $i ?>" name="jml-<?= $i ?>" onkeydown="cek_jumlah(<?= $i ?>)" style="width:50px" />
                            <?php
                            if($i==1){
                              ?>
                               <a href="#" id="tambah_produk"><img  src="<?= base_url() ?>asset/admin/img/add.png" />tambah produk</a>
                              <?php
                            }
                           ?>
                           <label style="position:relative;top:-15px" id="stok-<?= $i ?>"> </label>
                        </div> 
                      </div>  
                        <?php
                        //echo date("Ymd");
                       }
                       ?>                                   
                             
                      <input type="hidden"  name="jumlah_produk" id="jumlah_produk" value="1">
                        <br/>                                    
                        <div class="row-fluid">
                           <div class="span3"></div>
                           <div class="span9"><button type="submit" class="btn">Simpan</button></div>
                        </div> 
                       
                    </form>    
                     <div id="gagal" class="alert alert-error" style="position:fixed;bottom:1px;right:1px;display:none">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Maaf</strong> Input gagal
                     </div>

                      <div id="sukses" class="alert alert-success" style="position:fixed;bottom:1px;right:1px;display:none">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Selamat</strong> Input data Sukses
                      </div>                     
                   <div id="gggg" style="display:none" >
                      <table>
                      <form  method="POST" id="tambah_toko" action="<?= base_url() ?>toko/tambah2" >                     
                     
                       <tr>
                         <td>nama toko</td>
                         <td><input required="" id="nama_toko" type="text" size="40" name="nama_toko" /></td>
                       </tr>
                         <tr>
                         <td>Alamat</td>
                         <td><textarea name="alamat"></textarea></td>
                       </tr>
                       <tr>
                         <td>Pemilik</td>
                         <td><input required="" id="pemilik" type="text" size="40" name="pemilik" /></td>
                       </tr>
                       <tr>
                         <td></td>
                         <td><input type="submit"  value="simpan" /></td>
                       </tr>
                     </form>    
                        </table> 
                     </div>

              </ul>
              

            </div>                  
          </div><!--/row-->
        
        </div><!--/span-->
      </div><!--/row-->      
      <hr>

      <footer>
        <p>&copy; oddessy - website 2014</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- ===================== CHAT - Modal ===================== -->
    <div id="chat_modal" class="chat_modal modal fade hide">
      <div class="modal-header">
        <ul>
          <li class="toggle_users"><a href="#">Show Users</a></li>
          <li class="status">
            <a class="online" href="#"><span>Status</span></a>  
            <ul>
               <li><a class="online" href="#" title="Online"><span>Online</span></a></li>
               <li><a class="away" href="#" title="Away"><span>Away</span></a></li>
               <li><a class="busy" href="#" title="Busy"><span>Busy</span></a></li>
               <li><a class="invisiblee" href="#" title="Invisible"><span>Invisible</span></a></li>
               <li><a class="offline" href="#" title="Offline"><span>Offline</span></a></li>
             </ul> 
          </li>
          <li class="chat_name">John Doe</li>
        </ul>       
        <button type="button" class="close" data-dismiss="modal">x</button>        
      </div>
      <div class="modal-body">
        <div class="msg_cont left">
          <img src="img/general/user_1.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>John Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
eget, pretium porttitor quam. Sed varius vulputate lacinia. </li>
          </ul>    
        </div>
        <div class="msg_cont right">
          <img src="img/general/user_2.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>Jessie Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
eget, pretium porttitor quam. Sed varius vulputate lacinia. </li>
          </ul>    
        </div>
        <div class="msg_cont left">
          <img src="img/general/user_1.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>John Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
eget, pretium porttitor quam. Sed varius vulputate lacinia. </li>
          </ul>    
        </div>        
      </div>
      <div class="modal-footer">        
        <textarea></textarea>
        <a href="#" class="btn btn-inverse">Send</a>
      </div>
    </div>

    <!-- ===================== JS ===================== -->
    <script src="<?= base_url(); ?>asset/admin/js/libs/jquery-1.7.2.min.js"></script>    
    <script src="<?= base_url(); ?>asset/admin/js/libs/bootstrap.min.js"></script>   
    <script src="<?= base_url(); ?>asset/admin/js/libs/ios-orientationchange-fix.js"></script>      
    <script src="<?= base_url(); ?>asset/admin/js/libs/jquery-ui-1.8.20.custom.min.js"></script>      
    <script src="<?= base_url(); ?>asset/admin/js/common.js"></script>    

    <!-- Site specific --> 
    <script src="<?= base_url(); ?>asset/admin/js/libs/prettify.js"></script>   
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.maskedinput-1.3.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/chosen.jquery.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/scrollability.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.dropkick-1.0.0.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.multi-select.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.quicksearch.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.autogrowtextarea.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.textareaCounter.plugin.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/ui.spinner.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.ibutton.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.metadata.js"></script> 

    <script src="<?= base_url(); ?>asset/admin/js/script.js"></script>
    
    <script src="<?= base_url(); ?>asset/fancybox/jquery.fancybox.pack.js"></script>

    
    <script type="text/javascript">
    function cek_stok(i){
       var id = $("#produk-"+i).val();
     
       $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>pengiriman_toko/cek_stok',
                        data: "id="+id,
                        success: function(msg)
                        {
                            //alert(msg);
                            $("#stok-"+i).text("stok tersedia : "+msg);
                        }  
              });            
    }

    function cek_jumlah(i){
         var id = $("#jml-"+i).val();
         alert(id);
          /* $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>pengiriman_toko/cek_stok',
                        data: "id="+id,
                        success: function(msg)
                        {
                            if(msg>id){
                               alert("stok tidak mencukupi");
                            }
                            
                        }  
              });        */
    }
     $(document).ready(function(){  
       $(".chzn-select").chosen({allow_single_deselect:true}); 
        var i=2;
        var j=i-1;
        $("#tambah_produk").click(function(){
           $("#produk"+i).show();
           $("#jumlah_produk").val(i);
           //$("#stok-"+j).append("stok tersedia ");
            i++;
            j++

        }); 

     

        $("#tambah_toko").click(function(){
             window.open('http://localhost/odessy/toko/tambah_toko','win2','status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=1076,height=768,directories=no,location=no')
        });

      /*  $("#produk-1").change(function(){
             var x = $("#produk-1").val();
             alert(x);
        });*/
         
         $("#kode_toko").change(function(){
             var kat = $("#kode_toko").val()
             $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>toko/cek_toko',
                        data: "kode_toko="+kat,
                        success: function(msg)
                        {
                            if(msg=="ada"){
                              $("#kat_error").fadeIn(100);
                              $("#kode_toko").val('');
                            }
                            else{
                               $("#kat_error").fadeOut(100);
                            }
                        }  
              });            
         });

         $("#toko").change(function(){
              $("#samakan").attr("checked",false);
              $('#alamat').text('');
         });
  
     $("#samakan").click(function() {
    // this function will get executed every time the #home element is clicked (or tab-spacebar changed)
        if($(this).is(":checked")) // "this" refers to the element that fired the event
        {
             var toko = $("#toko").val();
             //alert(toko);
             $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>pengiriman_toko/get_alamat',
                        data: 'toko='+toko,
                        success: function(msg)
                        {
                          // alert(msg);
                          $('#alamat').text(msg);
                        }  
              });         
        }
        else{
            $('#alamat').text('');
        }
    });
          
         $("#form_input_toko").submit(function(){
            //alert("djfkdkfkjdkf");
            $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>pengiriman_toko/tambah',
                        data: $("#form_input_toko").serialize(),
                        success: function(msg)
                        {
                           //alert(msg);
                           if(msg=="sukses"){
                              $('#gagal').hide();
                              $('#sukses').show();
                              document.location="<?= base_url() ?>pengiriman_toko ";
                              //$("#kode_toko").val('');
                              //$("#nama_toko").val('');
                            }
                            else{
                              $('#sukses').hide();
                              $('#gagal').show();
                            }
                        }  
              });         
            return false;
         });

          $(".various2").fancybox();

          $("#tambah_toko").submit(function(){
           // alert('uuuuu');
            $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>toko/tambah2',
                        data: $("#tambah_toko").serialize(),
                        success: function(msg)
                        {
                          $('#tambah_toko')[0].reset();
                           location.reload();
                        }  
              });         
             
             return false;
          });
      
      });
    </script> 

  </body>
</html>