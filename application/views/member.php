<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> KERANJANG BELANJA</li>
    </ul>
<a href="<?=base_url();?>"><img src="<?=base_url();?>asset/pengaturan-profil.png"></a>&nbsp;
<a href="<?=base_url();?>"><img src="<?=base_url();?>asset/pengaturan-pass.png"></a>&nbsp;
<a href="<?=base_url();?>"><img src="<?=base_url();?>asset/histori-transaksi.png"></a>&nbsp;
<a href="<?=base_url();?>"><img src="<?=base_url();?>asset/konfirmasi-pembayaran.png"></a>&nbsp;

	<hr class="hard"/>
			

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