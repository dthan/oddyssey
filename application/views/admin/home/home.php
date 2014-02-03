<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
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
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/tables/dataTables.css">         
    <link rel='stylesheet' href='<?= base_url(); ?>asset/admin/css/theme_light/calendar/fullcalendar.css' />
    <link rel='stylesheet' href='<?= base_url(); ?>asset/admin/css/theme_light/calendar/fullcalendar.print.css' media='print' /> 
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/chosen.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/formselements/dropkick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/jquery-ui-1.8.20.custom.css">        

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
                <li class="active">Dashboard</li>
              </ul> 
              <ul class="page_info">
                  <li><h2>Dashboard</h2></li>
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
              </ul>

              <div class="widget chart">
                <header>
                    <h3>flot Chart <span>- Line chart</span></h3>
                    <ul class="toggle_content">                          
                        <li class="arrow"><a href="#">Toggle Content</a></li>
                    </ul>
                </header>
                <section>
                       <table id="grafik" border="1" align="center" style="display:none;width:400px">
                        <tr> <th>&nbsp;</th>
                        <th>Januari</th>
                        <th>2010</th>
                        <th>2011</th>
                        </tr>
                        <tr> <td>Product 1</td>
                        <td>25</td>
                        <td>35</td>
                        <td>35</td>
                        </tr>
                        <tr> <td>Product 2</td>
                        <td>21</td>
                        <td>35</td>
                        <td>45</td> </tr>
                        <tr>
                          <td>Product 3</td>
                          <td>33</td>
                          <td>34</td>
                          <td>53</td>
                          </tr>
                          <tr>
                          <td>Product 4</td>
                          <td>33</td>
                          <td>22</td>
                          <td>25</td>
                          </tr>
                          <tr>
                          <td>Product 5</td>
                          <td>73</td>
                          <td>84</td>
                          <td>93</td>
                          </tr>
                          <tr>
                          <td>Product 6</td>
                          <td>13</td>
                          <td>24</td>
                          <td>330</td>
                          </tr>
                        </table> 
                        
                </section>
              </div>

            
            </div>                  
          </div><!--/row-->
           
          
        </div><!--/span-->
      </div><!--/row-->      
      <hr>

      <footer>
        <p>&copy; LoxDesign.net - Phoenix 2012</p>
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
          <img src="<?= base_url(); ?>asset/admin/img/general/user_1.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>John Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
                metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
                eget, pretium porttitor quam. Sed varius vulputate lacinia. 
            </li>
          </ul>    
        </div>
        <div class="msg_cont right">
          <img src="<?= base_url(); ?>asset/admin/img/general/user_2.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>Jessie Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
                metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
                eget, pretium porttitor quam. Sed varius vulputate lacinia. 
            </li>
          </ul>    
        </div>
        <div class="msg_cont left">
          <img src="<?= base_url(); ?>asset/admin/img/general/user_1.jpg" width="50" height="50" alt="User">
          <ul>
            <li>
              <h3>John Doe:</h3> 
              <span>16 minutes ago</span>
            </li>
            <li>Aliquam iaculis volutpat ipsum ullamcorper tempus. In in dui tortor. Mauris sed volutpat
                metus. Duis ut sapien sapien, id pellentesque orci. Nullam nisl metus, sodales ut laoreet 
                eget, pretium porttitor quam. Sed varius vulputate lacinia. 
            </li>
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
    <script src="<?= base_url(); ?>asset/admin/js/plugins/widgets/jquery.sparkline.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/common.js"></script>  

    <!-- Site specific --> 
    <script src="<?= base_url(); ?>asset/admin/js/libs/prettify.js"></script>      
    
     <script type="text/javascript" src="<?= base_url(); ?>asset/admin/js/jquery.fusioncharts.js"></script>
    <!--[if lt IE 9]>      
          <script type="text/javascript" src="js/plugins/charts/excanvas.min.js"></script>
    <![endif]--> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/tables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/plugins/calendar/fullcalendar.min.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/chosen.jquery.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/scrollability.min.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/plugins/formselements/jquery.dropkick-1.0.0.js"></script> 

    <script src="<?= base_url(); ?>asset/admin/js/script.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/specific/sparks.js"></script>
    <script src="<?= base_url(); ?>asset/admin/js/specific/index.js"></script>
    <script type="text/javascript">
        $('#grafik').convertToFusionCharts({
        swfPath: "<?= base_url() ?>asset/admin/js/",
        type: "MSColumn3D",
        data: "#grafik",
        width:"800",
        height:"400"
        });
    </script>
  </body>
</html>
