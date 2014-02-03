<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>asset/themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>asset/themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>asset/themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="<?= base_url() ?>asset/themes/less/bootshop.less">
	<script src="<?= base_url() ?>asset/themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="<?= base_url() ?>asset/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="<?= base_url() ?>asset/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->	
	<link href="<?= base_url() ?>asset/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="<?= base_url() ?>asset/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->	
	<link href="<?= base_url() ?>asset/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?= base_url() ?>asset/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>asset/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>asset/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>asset/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>asset/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">Welcome<strong> <?=$user;?></strong></div>
	<div class="span6">
	<div class="pull-right">
		<a href="product_summary.html"><span>Rp. </span></a>
		<span class="btn btn-mini price_top"><?=$harga;?></span>
		<a href="<?= base_url() ?>keranjang"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ <span class='troli_top'><?=$this->cart->total_items();?></span> ] Items in your cart </span> </a> 
	</div>
	</div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="<?=base_url();?>"><img src="<?= base_url() ?>asset/themes/images/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Specials Offer</a></li>
	 <li class=""><a href="normal.html">Cara Belanja</a></li>
	 <li class=""><a href="contact.html">Kontak</a></li>
	 <li class="">
	 <a href="<?=base_url();?>member/<?=$link;?>" style="padding-right:0"><span class="btn btn-large btn-success"><?=$log;?></span></a>
	</li>
    </ul>
  </div>
</div>
</div>
</div>
   <div id="loadnya" style="display:none">
    <img src="asset/loading.gif" class="ajax-loader"/>
</div>
<!-- Header End====================================================================== -->