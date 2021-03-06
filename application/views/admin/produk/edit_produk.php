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
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/prettify.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/jquery-ui-1.8.20.custom.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/chosen.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/dropkick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/multi-select.css">    
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/jquery.ibutton.css">      

    <!-- Site specific - CSS -->   
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/tables/dataTables.css">   
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/forms/jquery.plupload.queue.css" media="screen" />
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/forms/jquery.cleditor.css">         
    
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
                <li><a href="<?= base_url() ?>produk">Produk</a></li><span class="divider">/</span>
                <li class="active">Edit Produk</li>
              </ul> 
              <ul class="page_info" >
              <?php
              foreach ($produk as $k) {
                ?>
                 <form  method="POST" id="form_edit_produk" action="<?= base_url() ?>produk/aksi_edit" enctype="multipart/form-data">                     
                      <div class="row-fluid">
                        <div class="span3">Nama Produk:</div>
                        <div class="span9"><input required="" type="text" size="40" name="nama_produk" value="<?= $k->nama_produk; ?>" />*</div> 
                      </div>  
                       <div class="row-fluid">
                          <div class="span3">Kategori:</div>
                          <div class="span9">
                             <?= form_dropdown('kategori', $kategori,  $k->id_kategori, 'id="kategori" required=""') ?>                        
                          </div>
                        </div>  
                        <div class="row-fluid">
                           <div class="span3">harga grosir</div>
                           <div class="span9"><input required="" type="text" size="40" name="harga" value="<?= $k->harga; ?>" /></div>
                        </div> 
                        <div class="row-fluid">
                           <div class="span3">harga eceran:</div>
                           <div class="span9">
                             <input required="" type="text" size="40" name="harga_eceran" value="<?= $k->harga_eceran ?>" />
                             minimal pembelian :
                             <input required="" type="text" size="20" name="minimal" style="width:50px" value="<?= $k->minimal ?>" />
                           </div>
                         <div class="row-fluid">
                           <div class="span3">Stok:</div>
                           <div class="span9"><input required="" type="text" size="40" name="stok" value="<?= $k->stok; ?>" /></div>
                        </div> 
                         <div class="row-fluid">
                           <div class="span3">Diskon:</div>
                           <div class="span9"><input type="text" size="40" name="diskon" value="<?= $k->diskon; ?>" />%</div>
                        </div> 
                        <div class="row-fluid">
                           <div class="span3">keterangan</div>
                           <div class="span9"><textarea id="cleeditor" name="ket"><?= $k->nama_produk; ?></textarea></div>
                        </div> 
                        <div id="form_upload">
                        <?php
                          $x=1;
                          if($jml_gambar==0){
                          ?>
                            <div class="row-fluid">
                                       <div class="span3">gambar 1</div>
                                       <div class="span9">
                                          <input type="file" name="gambar-1" />                                           
                                         <a href="#" id="tambah_upload"><img  src="<?= base_url() ?>asset/admin/img/add.png" />tambah gambar</a>
                                       </div>
                            </div>
                          <?php
                          }
                          else {
                                  foreach ($gambar->result() as $g) {
                                    ?>
                                    <div class="row-fluid">
                                         <div class="span3"></div>
                                         <div class="span9">
                                         <img src="<?= base_url()."gambar_produk/".$g->gambar; ?>" width="100">
                                         </div>
                                    </div>
                                    <div class="row-fluid">
                                       <div class="span3">
                                         <?php
                                           if($x==1){
                                             echo "gambar";
                                           }
                                         ?>
                                       </div>
                                       <div class="span9">
                                          <input type="file" name="gambar-<?= $x ?>" />   
                                          <input type="hidden" name="id_gambar-<?= $x ?>" value="<?= $g->id_gambar ?>">                            
                                       <?php 
                                       if($x==1){
                                       ?>
                                         <a href="#" id="tambah_upload"><img  src="<?= base_url() ?>asset/admin/img/add.png" />tambah gambar</a>
                                       <?php }
                                       ?>
                                       </div>

                                    </div>                             
                                    <?php
                                    $x++;
                                }
                           }
                        ?>
                            
                        </div>
                        <br/>                                    
                        <div class="row-fluid">
                           <div class="span3"></div>
                           <div class="span9"><button type="submit" class="btn">Simpan</button></div>
                        </div> 
                        <input type="hidden"  name="jumlah_gambar" id="jumlah_gambar" value="<?= $jml_gambar; ?>">
                        <input type="hidden"  name="id_produk" id="id_produk" value="<?= $k->id_produk; ?>">
                    </form>  
                <?php
              }
              ?>                   
                                    
                  

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
    
    <!-- Site specific - JS --> 
    <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/plugins/forms/plupload.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/plugins/forms/plupload.html4.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/plugins/forms/plupload.html5.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/plugins/forms/jquery.plupload.queue.js"></script>
    <!--<script type="text/javascript" src="js/plugins/forms/uploader/jquery.ui.plupload.js"></script>-->        
    <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/plugins/forms/jquery.cleditor.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/script.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/specific/forms_uploader.js"></script>    
    <script type="text/javascript">
     $(document).ready(function(){
        var i= $("#jumlah_gambar").val();
        if(i==1){
           i=2;
        }
        $("#tambah_upload").click(function(){
          $("#form_upload").append("<div class='row-fluid'><div class='span3'></div> <div class='span9'><input type='file' name='gambar-"+i+"' /><input type='hidden' name='id_gambar-"+i+"' ></div> </div>");
          $("#jumlah_gambar").val(i);
          i++;
          return false;
        });  
      });
    </script> 

  </body>
</html>