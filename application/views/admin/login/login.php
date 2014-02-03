<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>Login Admin</title>
    
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
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>  
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/bootstrap/bootstrap-responsive.min.css">    

    <!-- Site specific - CSS -->   
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/filevalidation/validationEngine.jquery.css">

    <!-- Common - CSS --> 
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light/common.css">  
    <link rel="stylesheet" href="<?= base_url(); ?>asset/admin/css/theme_light.css" class="style_set">
    
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  
  </head>
  <body> 
    
   <?php $this->load->view('admin/setting'); ?>

   <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">                
          <h1 class="brand"><a href="">ODESSY </></h1>                                       
        </div>
      </div>
    </div>

   <div class="login_main_cont">      
        <div class="login_cont group login">
            <ul class="login_switcher">
              <li><a class="login_l akt" href="#"><span>Login</span></a></li>
              <li><a class="login_s" href="#"><span>Sign up</span></a></li>
              <li><a class="login_f" href="#"><span>Forgot password</span></a></li>
            </ul>
            <h2>Login</h2>          
            <div class="login_form">
              <form class="formClass" id="form_login" method="post" action="index.html">
                <fieldset>                
                    <label for="username"><span>Username</span></label>
                    <input id="username" name="username" class="validate[required] text-input" placeholder="username" type="text" tabindex="1" accesskey="u">                
                </fieldset>
                <fieldset>                
                    <label class="pw_cont" for="password"><span>Password</span></label>
                    <input id="password" name="password" class="validate[required] text-input" placeholder="password" type="password" tabindex="2" accesskey="p">                
                </fieldset>
                <fieldset class="login_submit"><button type="submit" id="tombol_login" class="btn">SIGN IN</button></fieldset>
                                
              </form>      
            </div>
        </div> 
        <div class="login_cont group sign_up">
            <ul class="login_switcher">
              <li><a class="login_l" href="#"><span>Login</span></a></li>
              <li><a class="login_s akt" href="#"><span>Sign up</span></a></li>
              <li><a class="login_f" href="#"><span>Forgot password</span></a></li>
            </ul>
            <h2>Sign up</h2>
            <div class="login_form">          
              <form class="formClass" action="index.html">
                <fieldset>                
                    <label class="email_cont" for="email_s"><span>Email</span></label>
                    <input id="email_s" name="email_s" class="validate[custom[email]] text-input" placeholder="email" type="text" tabindex="1" accesskey="e">                
                </fieldset>
                <fieldset>                
                    <label for="username_s"><span>Username</span></label>
                    <input id="username_s" name="username_s" class="validate[required] text-input" placeholder="username" type="text" tabindex="2" accesskey="u">                
                </fieldset>
                 <fieldset>                
                    <label class="pw_cont" for="password_s"><span>Password</span></label>
                    <input id="password_s" name="password_s" class="validate[required] text-input" placeholder="password" type="password" tabindex="3" accesskey="p">                
                </fieldset>
                <fieldset class="login_submit"><button type="submit" class="btn">SIGN UP</button></fieldset>
                  <fieldset class="login_social">                                                  
                      <ul class="right">                  
                        <li class="info"><span>SIGN IN WITH</span></li>
                        <li><a class="login_facebook" href="#"><span>Facebook</span></a></li>
                        <li><a class="login_twitter" href="#"><span>Twitter</span></a></li>
                      </ul>               
                  </fieldset>                    
              </form> 
            </div>     
        </div>
        <div class="login_cont group forgot">
            <ul class="login_switcher">
              <li><a class="login_l" href="#"><span>Login</span></a></li>
              <li><a class="login_s" href="#"><span>Sign up</span></a></li>
              <li><a class="login_f akt" href="#"><span>Forgot password</span></a></li>
            </ul>
            <h2>Forgot Password</h2> 
            <div class="login_form">          
              <form class="formClass" action="index.html">
                <fieldset>                
                    <label class="email_cont" for="email_f"><span>Email</span></label>
                    <input id="email_f" name="email_f" placeholder="email" class="validate[custom[email]] text-input"  type="text" tabindex="1" accesskey="u">                
                </fieldset>
                <fieldset>                
                    <label for="username_f"><span>Username</span></label>
                    <input id="username_f" name="username_f" class="validate[required] text-input" placeholder="username" type="text" tabindex="1" accesskey="u">                
                </fieldset>                            
                <fieldset class="login_submit"><button type="submit" class="btn">RECOVER PASSWORD</button></fieldset>
                  <fieldset class="login_social">                                                
                      <ul class="right">                  
                        <li class="info"><span>SIGN IN WITH</span></li>
                        <li><a class="login_facebook" href="#"><span>Facebook</span></a></li>
                        <li><a class="login_twitter" href="#"><span>Twitter</span></a></li>
                      </ul>               
                  </fieldset>                      
              </form>  
            </div>                    
        </div> 
        <div id="gagal" class="alert alert-error" style="position:fixed;bottom:1px;right:1px;display:none">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Maaf login gagal</strong> username dan password tidak cocok.
         </div>

        <div id="sukses" class="alert alert-success" style="position:fixed;bottom:1px;right:1px;display:none">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Selamat</strong> Login Sukses
        </div>               
    </div>

    <!-- ===================== JS ===================== -->
    <script src="<?= base_url(); ?>asset/admin/js/libs/jquery-1.7.2.min.js"></script>    
    <script src="<?= base_url(); ?>asset/admin/js/libs/bootstrap.min.js"></script>   
	  <script src="<?= base_url(); ?>asset/admin/js/libs/ios-orientationchange-fix.js"></script> 
    <script src="<?= base_url(); ?>asset/admin/js/libs/jquery-ui-1.8.20.custom.min.js"></script>  
    <script src="<?= base_url(); ?>asset/admin/js/plugins/filevalidation/languages/jquery.validationEngine-en.js"></script>  
    <script src="<?= base_url(); ?>asset/admin/js/plugins/filevalidation/jquery.validationEngine.js"></script>  
    <script src="<?= base_url(); ?>asset/admin/js/common.js"></script>
	
	  <!-- Site specific - JS -->  
	  <script src="<?= base_url(); ?>asset/admin/js/script.js"></script>   
    <script src="<?= base_url(); ?>asset/admin/js/specific/login.js"></script>  
      <script type="text/javascript">
      $(document).ready(function() {
        $("#form_login").submit(function(){
             //alert("jalan"); 
              $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>admin/cek_login',
                        data:$('#form_login').serialize(),
                        success: function(msg)
                        {
                            if(msg=="sukses"){
                              $('#gagal').hide();
                              $('#sukses').show();
                              document.location='<?= base_url()."admin"; ?>';
                            }
                            else{
                              $('#sukses').hide();
                              $('#gagal').show();
                            }
                            //alert(msg)
                            /*document.getElementById("dosen").innerHTML = msg;
                             $('#form_tugas').show();*/
                        }  
                    });            
             return false;
         });
      });
    </script>
  </body>
</html>