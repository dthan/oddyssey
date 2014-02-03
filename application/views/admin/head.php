<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	<head>
    <meta charset="utf-8">
    <title>Phoenix</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes" />    
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ===================== Touch Icons ===================== -->
    <link rel="shortcut icon" href="favicon.ico">
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
    <div id="loader_cont"><img src="img/loaders/page_loader.gif"></div> 
    <div class="options_cont">
      <form name="myForm">
        <a class="options_btn" href="#">OPTIONS</a> 
        <div class="options group">
          <div>
            <p>Background image:</p>
            <ul class="background_list">
              <li><a class="current" id='bg_1' href="#">bg_1</a></li>
              <li><a id='bg_2' href="#">bg_2</a></li>
              <li><a id='bg_3' href="#">bg_3</a></li>
              <li><a id='bg_4' href="#">bg_4</a></li>
              <li><a id='bg_5' href="#">bg_5</a></li>
              <li><a id='bg_6' href="#">bg_6</a></li>
              <li><a id='bg_7' href="#">bg_7</a></li>
              <li><a id='bg_8' href="#">bg_8</a></li>
              <li><a id='bg_9' href="#">bg_9</a></li>
              <li><a id='bg_10' href="#">bg_10</a></li>
            </ul>
          </div>
          <div>
            <p>Color styling:</p>
            <ul class="color_list">
              <li><a class="current" id='c_1' href="#" title="Rose">rose</a></li>
              <li><a id='c_2' href="#" title="Orange">orange</a></li>
              <li><a id='c_3' href="#" title="Apple Green">apple_green</a></li>
              <li><a id='c_4' href="#" title="Sky Blue">sky_blue</a></li>
              <li><a id='c_5' href="#" title="Purple">purple</a></li>
            </ul>            
          </div>
          <div>
            <p>Patterns:</p>
            <ul class="pattern_list">
              <li><a class="current" id='p_1' href="#" title="Stripes Right">p_1</a></li>
              <li><a id='p_2' href="#" title="Stripes Left">p_2</a></li>
              <li><a id='p_3' href="#" title="Noise">p_3</a></li>
              <li><a id='p_4' href="#" title="Plain">p_4</a></li>              
            </ul>            
          </div>
          <div class="top_mn_setup">
            <p>Display top menu on:</p>
            <div>
              <input id="top_menu_click" checked="checked" type="radio" value="1" class="menu_show" name="top_menu_show"><label for="top_menu_click">Click</label>
              <input id="top_menu_hover" type="radio" value="0" class="menu_show" name="top_menu_show"><label for="top_menu_hover">Hover</label>
            </div>            
          </div>  
          <div class="clear_cache_cont"><a class="btn btn-mini" href="#">Clear Cache</a></div>              
        </div> 
      </form> 
    </div>