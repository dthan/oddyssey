 <div class="navbar navbar-inverse navbar-fixed-top navbar-custom">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html"><span class='glyphicon glyphicon-home'></span> Home</a></li>
            <li><a href="#about"><span class='glyphicon glyphicon-user'></span> Account</a></li>
            <li><a href="shopping-cart.html"><span class='glyphicon glyphicon-briefcase'></span> Shopping cart</a></li>
            <li><a href="checkout.html"><span class='glyphicon glyphicon-ok'></span> Checkout</a></li>
          </ul>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown nav-bar-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-edit'></span> My Wishlist</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="nav-bar-item">
                                <p>Recently added item(s)</p>
                            </div>
                        </li>
                        <li>
                           <div class="nav-bar-item">
                               <figure>
                                   <img src="img/product01.jpg" alt="" />
                               </figure>
                               <button class="btn btn-default custom-button no-border"><i class="glyphicon glyphicon-remove"></i></button>
                               <div class="text">
                                   <h2><a href="#">Mustard yellow ruffle dress</a></h2>
                                   <div class="price-line">
                                       <div class="new-price">$478.00</div>
                                   </div>
                               </div>
                           </div>
                        </li>
                        <li>
                            <div class="nav-bar-item">
                                <figure>
                                    <img src="img/product02.jpg" alt="" />
                                </figure>
                                <button class="btn btn-default custom-button no-border"><i class="glyphicon glyphicon-remove"></i></button>
                                <div class="text">
                                    <h2><a href="#">Navy Blue Silk Pleated Shift Dress</a></h2>
                                    <div class="price-line">
                                        <div class="old-price">$250.00</div>
                                        <div class="new-price">$180.00</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="shopping-cart.html"><span class='glyphicon glyphicon-shopping-cart'></span> My Bag: 1 item(s)</a>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
      <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="register-block">
                        <a href="#">Log In</a>
                        <span>or</span>
                        <a href="#">Register</a>
                    </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="site-selectors pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                US Dollar <span class='glyphicon glyphicon-chevron-down'></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#">Euro</a></li>
                                <li><a href="#">Pound St.</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <i class='flag flag-gb'></i> English <span class='glyphicon glyphicon-chevron-down'></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#"><i class='flag flag-it'></i> Italian</a></li>
                                <li><a href="#"><i class='flag flag-es'></i> Spanish</a></li>
                                <li><a href="#"><i class='flag flag-fr'></i> French</a></li>
                                <li><a href="#"><i class='flag flag-ge'></i> German</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1 class='brand'><a href="index.html">Odessy Bag</a></h1>
                </div>
            </div>
            <?php $this->load->view('menu_atas'); ?>
        </div>
    </header>