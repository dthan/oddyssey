<?php
if (!$this->cart->contents()) {
    ?>
<table class="table table-bordered">
    <tr><th> KERANJANG BELANJA</th></tr>
     <tr> 
     <td>Maaf, Keranjang Belanja Anda Masih Kosong.
      </td>
      </tr>
  </table>    
    <?php
} else {

?>
<table class="table table-bordered">
              <thead>
                   <tr><th> KERANJANG BELANJA</th></tr>
                <tr>
                  <th>Produk</th>
                  <th>Deskprisi</th>
                  <th>Quantity/Update</th>
				  <th>Harga</th>
                  <th>Diskon</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
                	<?php
                	$total_diskon=0;
                	foreach ($this->cart->contents() as $cart) {
                		?>
                		 <tr>
                		  <td> <?php foreach($this->cart->product_options($cart['rowid']) as $key => $val)
	  			{
	  				if ($key=='gbr') {
	  					?>
	  				<img width="60" src="<?= base_url() ?>gambar_produk/<?=$val;?>" alt=""/>
	  				<?php
	  				}
	  				
	  			}
	  			?>
	  			</td>
                  <td><?=$cart['name'];?><!-- <br/>Color : black, Material : metal --></td>
				  <td>
					<div class="input-append"><input class="span1" style="max-width:34px" placeholder="<?=$cart['qty'];?>" id="appendedInputButtons" size="16" type="text"><button class="btn" onclick="min('<?=$cart['rowid'];?>')" type="button"><i class="icon-minus"></i></button><button class="btn" onclick="plus('<?=$cart['rowid'];?>')" type="button"><i class="icon-plus"></i></button><button class="btn btn-danger" onclick="hapus('<?=$cart['rowid'];?>')" type="button"><i class="icon-remove icon-white"></i></button>				</div>
				  </td>
                  <td>Rp. <?=$this->cart->format_number($cart['price']);?></td>
                  <td><?php foreach($this->cart->product_options($cart['rowid']) as $key => $val)
	  			{
	  				if ($key=='diskon') {
	  					$diskon=($val*$cart['price'])/100;
	  					echo "Rp. ".$this->cart->format_number($diskon);
	  					
	  				}
	  				
	  			}
	  			?>
	  		</td>
                  <td>Rp. <?=$this->cart->format_number($cart['subtotal']-$diskon);?></td>
                  </tr>
                <?php
                $total_diskon+=$diskon;
                	}
                	?>
                 <tr>
                  <td colspan="5" style="text-align:right">Total Harga:	</td>
                  <td> Rp. <?=$this->cart->format_number($this->cart->total());?></td>
                </tr>
				 <tr>
                  <td colspan="5" style="text-align:right">Total Diskon:	</td>
                  <td> Rp. <?=$this->cart->format_number($total_diskon);?></td>
                </tr>
				 <tr>
                  <td colspan="5" style="text-align:right"><strong>TOTAL (Rp. <?=$this->cart->format_number($this->cart->total())." - Rp. ".$this->cart->format_number($total_diskon);?>) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> Rp. <?=$this->cart->format_number($this->cart->total()-$total_diskon);?> </strong></td>
                </tr>
				</tbody>
            </table>
<?php } ?>