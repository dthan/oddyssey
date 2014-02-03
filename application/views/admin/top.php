 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="sweet-gray sweet-go-back-from-screen">&nbsp;</span>
          </a>
          <div class="nav-collapse">            
            <ul class="nav main_nav" role="navigation">                
                <!-- <li id="mail" class="styled dropdown mail">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mail<span class="info">2</span></a>
                  <ul class="dropdown-menu top_menu">
                      <li><a class="mn_new_msg" href="mail.html"><span>New Message</span></a></li>
                      <li><a class="mn_inbox" href="mail.html"><span>Inbox</span></a></li>
                      <li><a class="mn_outbox" href="mail.html"><span>OutBox</span></a></li>
                      <li><a class="mn_spam" href="mail.html"><span>Spam</span></a></li>
                      <li><a class="mn_trash" href="mail.html"><span>Trash</span></a></li>
                  </ul>
                </li>
                <li id="chat" class="styled chat">
                  <a data-toggle="modal" href="#chat_modal">Chat<span class="info">5</span></a>     
                </li> -->
                <li id="notification" class="styled dropdown notification">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pesanan<span class="info">3</span></a>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="#">                          
                          Ada Pesanan Baru dari Konsumen atas nama <b>deden</b><br/>
                            <span>13/01/2014</span>                       
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        Ada Pesanan Baru dari Konsumen atas nama <b>udin</b><br/>
                            <span>13/01/2014</span>                       
                        </a>
                    </li>
                    <li>
                        <a href="#">
                         Ada Pesanan Baru dari Konsumen atas nama <b>ronaldo</b><br/>
                            <span>13/01/2014</span>                       
                        </a>
                    </li>
                                     
                    <li class="show_all"><a href="#">Tampilkan semua pesanan</a></li> 
                  </ul>
                </li>                          
            </ul> 
            <ul class="main_nav nav pull-right">                
                <li id="search" class="search"> 
                  <a href="#">Search</a> 
                  <div class="search_cont">
                      <form class="navbar-search form-search">                          
                          <input type="text" class="input-medium search-query" placeholder="Search">
                          <button type="submit">Search</button>
                      </form> 
                  </div>              
                </li> 
                <!-- <li id="settings" class="styled dropdown settings">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings</a>
                    <ul class="dropdown-menu top_menu">
                        <li class="show_all">Settings</li>
                        <li><a class="mn_site" href="#"><span>Site</span></a></li>
                        <li><a class="mn_admin" href="#"><span>Admin</span></a></li>
                        <li><a class="mn_mail" href="#"><span>Mail</span></a></li>
                        <li><a class="mn_user" href="#"><span>User</span></a></li>
                    </ul>
                </li> -->
                <li id="profile" class="styled dropdown profile">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile</a>
                    <ul class="dropdown-menu top_menu">                        
                        <li class="profile group">
                          <img src="<?= base_url(); ?>asset/admin/img/general/user_1.jpg" width="50" height="50" alt="User">
                          <ul>
                            <li><strong>Deden</strong></li>
                            <li>@dthan</li>
                            <li><span>Administrator</span></li>
                          </ul>
                        </li>
                        <li><a class="mn_settings" href="#"><span>My Settings</span></a></li>
                        <li><a class="mn_profile" href="profile.html"><span>My Profile</span></a></li>
                        <li><a class="mn_logout" href="<?= base_url() ?>admin/logout"><span>Logout</span></a></li>
                    </ul>
                </li>                          
            </ul>           
          </div>
          <h1 class="brand"><a href="index.html">ODYSSEY</a></h1>                                       
        </div>
      </div>
    </div>