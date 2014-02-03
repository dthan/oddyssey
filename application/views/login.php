<div class="span9">
    <ul class="breadcrumb">
		<li><a href="<?=base_url();?>">Home</a> <span class="divider">/</span></li>
		<li class="active"> Login</li>
    </ul>
	<hr class="soft"/>
	<table class="table table-bordered">
		<tr><th> LOGIN MEMBER  ODYSSEY   </th></tr>
		 <tr> 
		 <td>
		 	<div id="loader" style="margin-left:117px;display:none">
    <img src="<?=base_url();?>asset/themes/loading.gif"/>
</div>
<div class="alert alert-error" style="display:none">Nama pengguna atau kata sandi salah</div>
			<form id="login_form" class="form-horizontal" action="<?=base_url();?>member/auth_user" method="post">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" name="username" required placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" name="password" required placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Login</button>   <a href="<?=base_url();?>register" class="btn">Daftar Member!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="<?=base_url();?>member/forget" style="text-decoration:underline">Lupa Kata Sandi ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>		
	
</div>