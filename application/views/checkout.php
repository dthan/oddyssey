<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Selesai Belanja</h3>	
	<div class="well">
		<div class="alert alert-success" style="display:none"><center><img src="<?=base_url();?>asset/cart.png"></center> <p>Terimakasih, Pesanan Anda Telah terkirim. Kami akan Segera Memprosesnya dalam waktu 1x24 jam dan mengirimkan detail pemesanan ke email anda</div>
	<form class="form-horizontal" id="form_checkout">
		<h4>Data Detail Pembeli</h4>
	<?php foreach ($pelanggan as $cus) {
		?>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Nama Pembeli</label>
			<div class="controls">
			  <input type="text" id="name_pembeli"  readonly value="<?=$cus->nama_lengkap;?>">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email Pembeli</label>
		<div class="controls">
		  <input type="text" id="email_pembeli" readonly value="<?=$cus->email;?>">
		</div>
	  </div>	
	  <div class="control-group">
			<label class="control-label" for="aditionalInfo">Alamat Pembeli</label>
			<div class="controls">
			  <textarea class="span4" id="alamat_pembeli" readonly cols="26" rows="3"><?=$cus->alamat;?></textarea>
			</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="input_email">No. Telpon</label>
		<div class="controls">
		  <input type="text" id="telp_pembeli" readonly value="<?=$cus->telp;?>">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="input_email">Propinsi</label>
		<div class="controls">
		  <select readonly id="provinsi_pembeli">
		  	<option value="<?=$cus->id_propinsi;?>"><?=$cus->nama_propinsi;?></option></select>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="input_email">Kota</label>
		<div class="controls">
		 <select readonly id="kota_pembeli">
		  	<option value="<?=$cus->id_kota;?>"><?=$cus->nama_kota;?></option></select>
		</div>
	  </div> 
	  <div class="control-group">
		<label class="control-label" for="email_pembeli">Kode Pos</label>
		<div class="controls">
		  <input type="text" id="kodepos_pembeli" readonly value="<?=$cus->kode_pos;?>">
		</div>
	  </div>   
	 <?php 
	} ?>
		<h4>Detail Data Pengiriman / Penerima</h4>
		
		
		  <label class="checkbox">
      <input type="checkbox"id="sama" value="checkbox">Sama Dengan Data Pembeli
    </label>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Nama Penerima</label>
			<div class="controls">
			  <input type="text" id="name_penerima" name="nama_penerima" placeholder="First Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email Penerima</label>
		<div class="controls">
		  <input type="text" id="email_penerima" name="email_penerima" placeholder="Email">
		</div>
	  </div>	
	  <div class="control-group">
			<label class="control-label" for="aditionalInfo">Alamat Penerima</label>
			<div class="controls">
			  <textarea class="span4"  id="alamat_penerima" name="alamat_penerima" cols="26" rows="3"></textarea>
			</div>
		</div>
		<div class="control-group">
		<label class="control-label" for="input_email">No. Telpon / hp</label>
		<div class="controls">
		  <input type="text" id="telp_penerima" name="telp_penerima" placeholder="no telepon / Hp">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="input_email">Propinsi</label>
		  <div class="controls">
			<?php 
			$js = 'id="provinsi_penerima" onChange="ambil_kota(this.value);"';
    		echo form_dropdown('provinsi', $prp,'', $js);
				?>
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label" for="input_email">Kota</label>
		<div class="controls">
		  <select id="kota" name="kota_penerima"></select>
		</div>
	  </div> 
	  <div class="control-group">
		<label class="control-label" for="input_email">Kode Pos</label>
		<div class="controls">
		  <input type="text" id="kodepos_penerima" name="kodepos_penerima" placeholder="kode pos">
		</div>
	  </div>   
		
	<h4>Metode Pembayaran dan Pengiriman Paket</h4>
	  <div class="control-group">
		<label class="control-label" for="input_email">Bank Tujuan</label>
		  <div class="controls">
			<?php 
    		echo form_dropdown('bank', $bank);
				?>
		</div>
	  </div>
	    <div class="control-group">
		<label class="control-label" for="input_email">Metode Pembayaran</label>
		  <div class="controls">
			<?php 
    		echo form_dropdown('metode', $mtd);
				?>
		</div>
	  </div>
	    <div class="control-group">
		<label class="control-label" for="input_email">Paket Pengiriman</label>
		  <div class="controls">
			<?php 
    		echo form_dropdown('paket', $pkt);
				?>
		</div>
	  </div>
	    <div class="control-group">
			<label class="control-label" for="aditionalInfo">Pesan (jika ada)</label>
			<div class="controls">
			  <textarea class="span4" name="pesan" cols="26" rows="3"></textarea>
			</div>
		</div>

	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Kirim Data Pesanan" />
			</div>
		</div>		
	</form>
</div>

</div>

<script type="text/javascript">
//perhatikan, kuncinya adalah disini
        function ambil_kota(id){
           $.ajax({
                type: "POST",
                url: "register/ambil_kota",
                data:"key="+id,
                success: function(data){
                    $("#kota").html(data);
                },
 
                error:function(XMLHttpRequest){
                    alert(XMLHttpRequest.responseText);
                }
 
            })
 
        };
</script>