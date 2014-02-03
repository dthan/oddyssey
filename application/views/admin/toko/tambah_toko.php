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
                <li><a href="<?= base_url() ?>toko">toko</a></li><span class="divider">/</span>
                <li class="active">Tambah toko</li>
              </ul> 
              <ul class="page_info" >
          
                                    
                    <form  method="POST" id="form_input_toko" action="<?= base_url() ?>toko/tambah" enctype="multipart/form-data">                     
                     
                      <div class="row-fluid">
                        <div class="span3">Nama toko:</div>
                        <div class="span9"><input required="" id="nama_toko" type="text" size="40" name="nama_toko" />*</div> 
                      </div>  
                       <div class="row-fluid">
                        <div class="span3">Alamat:</div>
                        <div class="span9"><textarea name="alamat"></textarea></div> 
                      </div>  
                      <div>
                         <div class="span3">Pemilik</div>
                        <div class="span9"><input required="" id="pemilik" type="text" size="40" name="pemilik" />*</div> 
                      </div>
                      
                   
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
    <script src="<?= base_url(); ?>asset/admin/js/specific/forms_elements.js"></script>
    
    <script type="text/javascript">
     $(document).ready(function(){   
         
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

         $("#form_input_toko").submit(function(){
            //alert("djfkdkfkjdkf");
            $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>toko/tambah',
                        data: $("#form_input_toko").serialize(),
                        success: function(msg)
                        {
                           if(msg=="sukses"){
                              $('#gagal').hide();
                              $('#sukses').show();
                              document.location="<?= base_url() ?>toko ";
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
         })
      });
    </script> 

  </body>
</html>