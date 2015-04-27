<div class="form-login-wrapper">
	<?php 
		$attr = array('class' => 'form-horizontal form-login box box-white box-shadow mb-30');
		echo form_open('people/user_login_process', $attr); 
	?>
	<div class="text-center">
		<h3 class="mb-0">Masuk JStore Online</h3>
		<small class="small-gray">Selamat datang di JStore Online. Silakan isi data login Anda</small>
	</div>
	<?php if(validation_errors() != '') { ?>
	<div class="alert alert-error">
		<ul class="square">
			<?php echo validation_errors(); ?>
		</ul>
	</div>
	<?php } ?>
	<div class="row-fluid control-group mt-40">
		<label class="control-label" for="inputEmail">Email :</label>
		<div class="controls">
			<input  autofocus="autofocus" type="text" class="input-login span12" name="username" id="inputEmail" placeholder="email"/>
		</div>
	</div>
	<div class="row-fluid control-group">
		<label class="control-label" for="inputPassword">Password :</label>
		<div class="controls">
			<input type="password" name="password" id="inputPassword" placeholder="**********" class="input-login span12" autocomplete="off"/>
		</div>
	</div>
	<div class="row-fluid">
		<div class="controls">
			<label class="checkbox span12"><input type="checkbox" name="remember_me"> <small class="small-gray">Biarkan saya tetap masuk</small>
			</label>
		</div>
	</div>
	<div class="row-fluid control-group">
		<div class="controls">
			<button type="submit" class="btn btn-block btn-action btn-login-top">Masuk ke JStore Online</button>
		</div>
	</div>
	<div class="mb-40 text-right">
		<small><a href="reset">Lupa Password ?</a></small>
	</div>
	<?php echo form_close(); ?>
</div>