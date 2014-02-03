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
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/tables/dataTables.css">   

    <!-- Common - CSS -->  
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/common.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light.css" class="style_set">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/fancybox/jquery.fancybox.css">
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
                <li class="active"><a href="<?= base_url() ?>produksi">produksi</a></li>
              </ul> 
              <ul class="page_info" >
              <div id="tabel_tas">
              <li><h2 style='text-align:center'>Tabel produksi Tas</h2></li>
              <a href="<?= base_url() ?>produksi/tambah_produksi" id="tambah_tas">
                <button type="submit" class="btn" id="tambah_tas">                  
                      <img src="<?= base_url() ?>asset/admin/img/add.png" />&nbsp;Tambah        
                </button>
              </a>
              
              <section class="group" style="margin-top:5px">                         
                       <table id="example" cellpadding="0" cellspacing="0" border="0" class="display" >
                          <thead>
                              <tr>
                                  <th style="width:10px;text-align:center">No</th>
                                  <th style='text-align:center'>Nama tas</th>
                                  <th style='text-align:center'>tanggal Produksi</th>
                                  <th style='text-align:center'>Maklun</th>
                                  <th style='text-align:center'>jumlah produksi</th>
                                  <th style='text-align:center'>HPP</th>                    
                                  <th style='text-align:center' style="width:200px">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                           <?php
                             $no=1;
                            foreach ($produksi as $k) {
                               echo "
                                         <tr class='gradeC' id='baris-$no'>
                                         <input type='hidden' value='".$k->id_produksi."' id='hapus-$no' />
                                          <td style='text-align:center'>".$no."</td>
                                          <td>".$k->nama_barang."</td>
                                          <td>".$this->tanggal->tgl_indo($k->tgl_produksi)."</td>
                                          <td>".$k->nama_maklun."</td>
                                          <td>".$k->jumlah_produksi."</td>
                                          <td class='center'>Rp. ".number_format($k->hpp,0)."</td>
                                          <td class='center'>
                                             <a class='various2' href='".base_url()."produksi/detail/".$k->id_produksi."'  title='detail'>
                                              <img src='".base_url()."asset/admin/img/detail.png' width='16'/>detail
                                            </a>
                                            <a href='".base_url()."produksi/edit/".$k->id_produksi."' title='haput'>
                                              <img src='".base_url()."asset/admin/img/edit.png' />edit
                                            </a>                                           
                                            <a class='hapus' href='#' onclick='hapus($no)' title='hapus'>
                                              <img src='".base_url()."asset/admin/img/delete.png' />hapus</td>
                                            </a>

                                         </tr>
                                    ";
                                $no++;
                            }
                           ?>
                          
                             
                             
                             
                          </tbody>
                      </table>                      
                  </section>
                  </div>
                                    
                    <form style="display:none" method="POST" id="form_input_produksi" action="<?= base_url() ?>produksi/tambah" enctype="multipart/form-data">                     
                      <div class="row-fluid">
                        <div class="span3">Nama produksi:</div>
                        <div class="span9"><input type="text" size="40" name="nama_produksi" />*</div> 
                      </div>  
                       <div class="row-fluid">
                          <div class="span3">Kategori:</div>
                          <div class="span9">
                             <?= form_dropdown('kategori', $kategori,  '', 'id="kategori"') ?>                        
                          </div>
                        </div>  
                        <div class="row-fluid">
                           <div class="span3">harga:</div>
                           <div class="span9"><input type="text" size="40" name="harga" /></div>
                        </div> 
                         <div class="row-fluid">
                           <div class="span3">Stok:</div>
                           <div class="span9"><input type="text" size="40" name="stok" /></div>
                        </div> 
                         <div class="row-fluid">
                           <div class="span3">Diskon:</div>
                           <div class="span9"><input required="number" type="text" size="40" name="diskon" />%</div>
                        </div> 
                    
                        <div id="form_upload">
                            <div class="row-fluid">
                               <div class="span3">gambar 1 :</div>
                               <div class="span9"><input type="file" name="gambar-1" />&nbsp;&nbsp;<a href="#" id="tambah_upload"><img  src="<?= base_url() ?>asset/admin/img/add.png" />tambah gambar</a></div>
                            </div> 
                        </div>
                        <br/>
                                      
                        <div class="widget" id="ket" >
                           Keterangan    
                          <section>             
                           <textarea id="cleeditor" name="cleeditor"></textarea>  
                          </section>                            
                        </div>
                        <div class="row-fluid">
                           <div class="span3"></div>
                           <div class="span9"><button type="submit" class="btn">Simpan</button></div>
                        </div> 
                    </form>                   
                  

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
    <script src="<?= base_url(); ?>asset/admin/js/plugins/tables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/plugins/tables/colResizable-1.3.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/plugins/tables/jquery.tablesorter.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/script.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/specific/tables_advanced.js"></script>  
    <script src="<?= base_url(); ?>asset/fancybox/jquery.fancybox.pack.js"></script>
   
    <script type="text/javascript">
    function hapus(i){
       var r = confirm("apakah yakin data ini mau di hapus ?");
            if (r==true){
                
                var kode = $("#hapus-"+i).val();
                $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>produksi/hapus/'+kode,
                       
                        success: function(msg)
                        {
                          $("#baris-"+i).fadeOut(600);
                        }  
              });         
            }     
             
     }
     $(document).ready(function(){
        var i=2;  
        $("#tambah_upload").click(function(){
          $("#form_upload").append("<div class='row-fluid'><div class='span3'>gambar "+i+" :</div> <div class='span9'><input type='file' name='gambar-"+i+"' /></div> </div>");
          i++;
          return false;
        }); 
         
      $(".various2").fancybox();

      });
    </script> 

  </body>
</html>