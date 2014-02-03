<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> KERANJANG BELANJA</li>
    </ul>
	<h3> &nbsp;<a href="<?=base_url();?>" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>	
	<hr class="soft"/>
			
	<div id="cart_content">
	<?php $this->view('cart');?>
	</div>	
		
	<a href="<?=base_url();?>" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
	<a href="<?=base_url();?>checkout" class="btn btn-large pull-right">Selesai Belanja <i class="icon-arrow-right"></i></a>
	
</div>

<script type="text/javascript">
 function hapus(id){
 	$('#loadnya').show();   
                $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>keranjang/hapus_keranjang/'+id,
                       data: "id=" +id,
                        success: function(msg)
                        {
                        	$('#loadnya').hide();   
                        	$.get("<?= base_url() ?>keranjang/show_cart", function(cart){
			  					$("#cart_content").html(cart);
							});
							  	$.get("<?= base_url() ?>keranjang/count_cart", function(cart){
				                $(".troli_side").html(cart);
				                $(".troli_top").html(cart);
				              });
								$.get("<?= base_url() ?>keranjang/price", function(price){

								$(".price_side").html(price);
								$(".price_top").html(price);
								});
                        }  
              });             
             
     } 
function plus(id){
	$('#loadnya').show();   
                $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>keranjang/plus',
                        data: "id=" +id,
                        success: function(msg)
                        {
                        	$('#loadnya').hide();   
                        	$.get("<?= base_url() ?>keranjang/show_cart", function(cart){
			  					$("#cart_content").html(cart);
							});
                        }  
              });            
             
     }
function min(id){
	$('#loadnya').show();   
                $.ajax({
                        type:'POST',
                        url:'<?= base_url() ?>keranjang/min',
                       	data: "id=" +id,
                        success: function(msg)
                        {
                        	$('#loadnya').hide();   
                        	$.get("<?= base_url() ?>keranjang/show_cart", function(cart){
			  					$("#cart_content").html(cart);
							});
                        }  
              });         
             
     }

    </script>