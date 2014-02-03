<div id="loader_cont"><img src="<?= base_url(); ?>asset/admin/img/loaders/page_loader.gif"></div> 
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