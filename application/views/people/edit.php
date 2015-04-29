<div class="maincontent-admin">
	<h1 class="mb-0 mb-30" style="word-break: break-all">
		<i class="icon-avatar-alt mr-10"></i><?php echo $name; ?>
	</h1>
	<ul class="horizontal-tab clear-b mt-20">
		<li class="active"><a href="edit">Biodata Diri</a></li>
		<li class=""><a href="address">Daftar Alamat</a></li>
		<li class=""><a href="bank">Rekening Bank</a></li>
		<li class=""><a href="notification">Notifikasi</a></li>
		<li class=""><a href="privacy">Atur Privasi</a></li>
	</ul>
	<div class="row-fluid mt-20">
		<div id="img-profile" class="span4">
			<div class="well">
				<img id="main_imgprofile" class="imgprofile" src="<?php echo base_url('assets/img/usernophoto.png'); ?>" alt="Heru" />
				<hr class="mb-5">
					<div class="clear-b">
						<input type="hidden" name="server_id" value="47">
						<input type="hidden" name="user_id" value="203111">
						<input type="hidden" name="upload_url" value="photo_upload">
						<input type="hidden" name="token" value="3ffb596aab9b5029cf6d58e0548694f7">
						<div class="ellipsis" style="position: relative;">
							<a class="btn btn-block btn-second" id="pickfiles" style="position: relative; z-index: 1;">Browse File</a>
							<div id="html5_19jsmv4cbijv1q9tg921266gbd3_container" class="moxie-shim moxie-shim-html5" style="position: absolute; top: 0px; left: 0px; width: 198px; height: 30px; overflow: hidden; z-index: 0;">
								<input id="html5_19jsmv4cbijv1q9tg921266gbd3" type="file" style="font-size: 999px; opacity: 0; position: absolute; top: 0px; left: 0px; width: 100%; height: 100%;" accept="image/jpeg,image/gif,image/png">
							</div>
						</div>
					</div>
					<div class="clear-b mt-5">
						<small class="muted">Besar file: maksimum 10.000.000 bytes (10 Megabytes)<br>Ekstensi yang diperbolehkan: .JPG .JPEG .GIF .PNG</small>
					</div>
					</div>
			<div class="clear-b"><a href="change_password"><button type="button" class="btn chg-pswd-btn btn-block"><i class="icon-key mr-5"></i>Ubah Kata Sandi</button></a></div>
		</div>
		<div class="span8">		
			<?php if($message_error != ''){ ?>
			<div class="alert alert-error">
				<ul class="square">
					<?php echo $message_error; ?>
				</ul>
			</div>
			<?php } ?>
			<?php if(validation_errors() != ''){ ?>
			<div class="alert alert-error">
				<ul class="square">
					<?php echo validation_errors(); ?>
				</ul>
			</div>
			<?php } ?>
			<?php if($message_display != ''){ ?>
			<div class="alert alert-success">
				<ul class="square">
					<?php echo '<li>'.$message_display.'</li>'; ?>
				</ul>
			</div>
			<?php } ?>
			<?php 
				$attr = array(
					'id' => 'form-edit-profile',
					'method' => 'post',
					'auto-complete' => 'off'
				);
				echo form_open('people/edit', $attr); 
			?>
				<h4 class="mb-20">Ubah Biodata Diri</h4>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<?php echo form_label('Nama Lengkap : ');?></div><div class="controls">
						<?php 
							echo form_input(array('name' => 'name', 'value' => $name, 'readonly' => true, 'maxlength' => '128', 'id' => 'full-name', 'class' => 'span9', 'disabled' => true));?>
					</div>
				</div>
				<div class="controls controls-row mb-20">
					<?php echo form_input(array('name' => 'uid', 'type' => 'hidden', 'value' => $user_id)); ?>
					<div class="span3"><?php echo form_label('Tanggal Lahir (dd/mm/yyyy): ');?></div>
					<div class="controls">					
						<script>
						  y = new Date().getFullYear();
						  min = y-80;
						  max = y-14;
						  $(function() {
							$( "#datepicker" ).datepicker({
							  dateFormat: "dd/mm/yy",
							  showOtherMonths: true,
							  selectOtherMonths: true,
							  changeMonth: true,
							  changeYear: true,
							  yearRange: min+":"+max	  
							});
						  });
						</script>
						<?php echo form_input(array('name' => 'birthday', 'id' => 'datepicker', 'value' => $birthday));?>
					</div>
				</div>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<?php echo form_label('Jenis kelamin');?>
					</div>
					<div class="controls">
						<label class="radio inline mr-20">
							<?php echo form_radio(array('name' => 'gender', 'value' => '1', 'checked' => (($gender=='1')?true:false), 'id' => 'gender-male')). "Pria";?>
						</label>
						<label class="radio inline">
							<?php echo form_radio(array('name' => 'gender', 'value' => '2', 'checked' => (($gender=='2')?true:false), 'id' => 'gender-female')). "Wanita";?>
						</label>
					</div>
				</div>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<?php echo form_label('Hobi: ');?>
					</div>
					<div class="controls">
						<?php echo form_input(array('type' => 'text', 'name' => 'hobby', 'value' => $hobby, 'maxlength' => '128', 'class' => 'span9'));?>
					</div>
				</div>
				
				<h4 class="mb-20">Ubah Kontak</h4>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<label for="inputEmail">Email</label></div>
					<div class="controls">
						<div class="span9"><?php echo $email;?><a class="ml-20 fs-11 mt-5 inline-block" href="change_email">Ubah Email</a>
						</div>
					</div>
				</div>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<label for="inputMsg">Messenger</label>
					</div>
					<div class="controls"><input type="text" value="" name="messenger" id="messenger" maxlength="128" class="span9">
					</div>
				</div>
				<div class="controls controls-row mb-20">
					<div class="span3">
						<label for="inputEmail">Nomor HP</label>
					</div>
					<div class="controls span9 ml-0"><div class="span11 ml-0"><input type="text" id="phone" name="msisdn" class="input-login span7" disabled="disabled" maxlength="20" value="08562276275"><i class="icon-checked ml-5 icon-tooltip" data-original-title="Sudah Terverifikasi"></i><a class="ml-5 fs-11 mt-5 inline-block" href="change_phone">Perbarui Nomor HP</a><div class="clear-b"><small class="muted">Untuk kelancaran transaksi Anda, silahkan ubah dengan nomor yang dapat kami hubungi.</small></div></div></div></div>
				<hr>
				<div class="controls controls-row"><div class="span3"><label for="inputPasswd">Kata Sandi</label></div><div class="controls controls-row"><div class="span9"><input type="password" name="password" class="span12" autocomplete="off"><small class="muted pull-left mr-15">Masukkan password login Tokopedia Anda.</small></div></div></div>
				<hr><div class="controls controls-row"><?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-action', 'content' => 'Ubah'));?></div>
			<?php echo form_close();?>
		</div>
	</div>

</div>