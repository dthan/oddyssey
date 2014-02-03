<div class="side_nav sidebar-nav" data-spy="affix" data-offset-top="150">
            <div class="sidebar_widget first_widget group">
              <form class="sidebar_search form-search">
                <input type="text" class="input-medium search-query" placeholder="Quick search">
                <button type="submit" class="btn btn-inverse"><i class="icon-search icon-gray"></i></button>
              </form>
            </div>
            <h3 class="main_menu group">
                <span class="title">Main Menu</span>
                <a id="nav_list_btn" class="btn-collapse btn btn-inverse">
                  <span class="sweet-gray sweet-go-back-from-screen">&nbsp;</span>              
                </a>
            </h3>
            <ul class="nav nav-list">                          
              <li <?php if($posisi=='home') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>admin">Dashboard</a></li>
              <li <?php if($posisi=='profil') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>profil">Profil</a></li>
              <li <?php if($posisi=='produk') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>produk">Produk</a></li>
              <li <?php if($posisi=='toko') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>toko">Toko</a></li>
              <li <?php if($posisi=='pengiriman_toko') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>pengiriman_toko">Pengiriman Toko</a></li>
              <li <?php if($posisi=='kategori') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>kategori">Kategori</a></li>
              <li <?php if($posisi=='maklun') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>maklun">Maklun</a></li>
              <li <?php if($posisi=='jasa_pengiriman') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>jasa_pengiriman">Jasa Pengiriman</a></li>
              <li <?php if($posisi=='produksi') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>produksi">Produksi</a></li>
              <li <?php if($posisi=='pesanan') echo "class='active' "; ?>><a class="filemanager" href="<?= base_url() ?>pesanan">Daftar Pesanan</a></li>
              <!-- <li class="sub">
                <a class="forms" href="#">Forms<span>5</span></a>
                <ul>
                  <li><a href="forms_layout.html">Layout</a></li>
                  <li><a href="forms_elements.html">Elements</a></li>
                  <li><a href="forms_validation.html">Validation</a></li>
                  <li><a href="forms_wizard.html">Wizard</a></li>
                  <li><a href="forms_uploader.html">File uploader &amp; WYSIWYG</a></li>                                                      
                </ul>
              </li>
              <li><a class="charts" href="charts.html">Charts</a></li>
              <li class="sub">
                <a class="tables" href="#">Tables<span>2</span></a>
                <ul>
                  <li><a href="tables_basic.html">Basic</a></li>
                  <li><a href="tables_advanced.html">Advanced</a></li>
                </ul>
              </li>
              <li><a class="calendar" href="calendar.html">Calendar</a></li>
              <li><a class="gallery" href="gallery.html">Gallery</a></li>
              <li class="sub">
                <a class="uielements" href="#">UI Elements<span>8</span></a>
                <ul>
                  <li><a href="accordions.html">Accordions</a></li>                  
                  <li><a href="buttons_icons.html">Buttons and Icons</a></li>
                  <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                  <li><a href="progressbars.html">Progressbars</a></li>                  
                  <li><a href="sliders.html">Sliders</a></li>                                    
                  <li><a href="tabs.html">Tabs</a></li>        
                  <li><a href="tooltips_popovers.html">Tooltips and Popovers</a></li>                                    
                  <li><a href="miscellaneous.html">Misc</a></li>
                </ul>
              </li>              
              <li><a class="filemanager" href="file_manager.html">File Manager</a></li>
              <li><a class="typography" href="typography.html">Typography</a></li>
              <li><a class="gridsystem" href="grid_system.html">Grid System</a></li>
              <li><a class="widgets" href="widgets.html">Widgets</a></li>
              <li class="sub">
                <a class="pages" href="#">Pages<span>6</span></a>
                <ul>
                  <li><a href="login.html">Login</a></li>                  
                  <li><a href="search.html">Search</a></li>
                  <li><a href="mail.html">Mail</a></li>
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="invoice.html">Invoice</a></li>
                  <li class="sub"> 
                    <a href="#">Error<span>6</span></a>
                    <ul>
                      <li><a href="error_403.html">403</a></li>
                      <li><a href="error_404.html">404</a></li>
                      <li><a href="error_405.html">405</a></li>
                      <li><a href="error_500.html">500</a></li>
                      <li><a href="error_503.html">503</a></li>
                      <li><a href="offline.html">Offline</a></li>
                    </ul>
                  </li>                  
                </ul>
              </li>                       -->  
            </ul>
   
          </div><!--/.well -->