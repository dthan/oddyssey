<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Pendaftaran</li>
    </ul>
	<h3> Pendaftaran Anggota</h3>	
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	  	<div id="loader" style="margin-left:117px;display:none">
    <img src="<?=base_url();?>asset/themes/loading.gif"/>
</div>
<div class="alert alert-success" style="display:none">Terimakasih, Anda Berhasil Mendaftar, Silakan <a href="<?=base_url();?>member/login_view">Login</a> Untuk melanjutkan</div>
<div class="alert alert-error" style="display:none"></div>
	<form class="form-horizontal" id="register">
		<h4>Data Akun</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Username <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="username" name="username" placeholder="Username">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Password <sup>*</sup></label>
			<div class="controls">
			  <input type="password" id="pass1" name="password" placeholder="Password">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Confirm Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="pass2" name="pass2" placeholder="Konfirmasi Password">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="email" name="email" placeholder="Email">
		</div>
	  </div>	  

		<h4>Data Lengkap</h4>
		<div class="control-group">
			<label class="control-label" for="company">Nama Lengkap</label>
			<div class="controls">
			  <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="nama lengkap"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="aditionalInfo">Alamat</label>
			<div class="controls">
			  <textarea name="alamat" id="alamat" cols="26" rows="3"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname">No. Telepon / HP <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="telp" name="telp" class='noonly' placeholder="No. Telepon / HP">
			</div>
		</div>
		<div class="control-group">
		<label class="control-label">Provinsi <sup>*</sup></label>
		<div class="controls">
			<?php 
			$js = 'onChange="ambil_kota(this.value);"';
    		echo form_dropdown('provinsi', $prp,'', $js);
				?>
		</div>
	  </div>
		
		<div class="control-group">
			<label class="control-label" for="company">Kota</label>
			<div class="controls" id="kota">
				<select name="kota"><option></option></select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="company">Kode Pos</label>
			<div class="controls">
			  <input type="text" class="pos" id="kodepos" name="kodepos" placeholder="kodepos"/>
			</div>
		</div>

	
	<div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Daftar" />
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