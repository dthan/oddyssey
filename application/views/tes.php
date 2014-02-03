<?php $i = 1; 
echo "<h1>".count($this->cart->contents())."</h1>";
?>
		<?php foreach($this->cart->contents() as $items): ?>
		
		
		<tr <?php if($i&1){ echo 'class="alt"'; }?>>
	  		<?php echo $items['qty'];?></td>
	  		<?php echo $items['name']; ?>
	  		<?php echo $items['options']['gbr']; ?>
	  		Rp. <?php echo $this->cart->format_number($items['price']); ?>
	  		Rp. <?php echo $this->cart->format_number($items['subtotal']); ?>
	  		Diskon : <?=format_rupiah($items['price']-20000);?>
	  		<pre>
	  			<?php foreach($this->cart->product_options($items['rowid']) as $key => $val)
	  			{
	  				echo $val;
	  			}
	  			?>
	  		</pre>
	  		<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

						<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

					<?php endforeach; ?>
				</p>

			<?php endif; ?>
	  		<p>
	  	
	  	<?php $i++; ?>
		<?php endforeach; ?>

