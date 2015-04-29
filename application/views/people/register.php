<section class="container">
	<div class="form-register-wrapper">
		<div class='error_msg'>
		<?php
			echo validation_errors();
			if (isset($pword_error) && $pword_error !='') {
				echo $pword_error.'<br />';
			}
			if (isset($message_display)) {
						echo $message_display;
					}
		?>
		</div>
		<?php
			$attr = array(
				'name' =>'register_form',
				'id' => 'register-form',
				'method' => 'post',
				'auto-complete' => 'off',
				'class' => 'form-horizontal form-register box box-white box-shadow mb-30',
				'novalidate' => 'novalidate'
			);
			echo form_open('people/register', $attr);
		?>
			<div class="text-center">
				<h3 class="mb-0">Daftar</h3><small class="small-gray">Silakan isi informasi mengenai diri Anda di bawah ini.</small>
			</div>
			<hr>
			<div class="row-fluid control-group">
				<?php echo form_label('Nama Lengkap : ', 'full-name', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'name', 'type' => 'text', 'id' => 'full-name', 'class' => 'input-login span12', 'maxlength' => '35', 'value' => $name)); ?>
				</div>
			</div>
			<div class="row-fluid control-group">
				<?php echo form_label('Nomor HP : ', 'phone', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'mobile_phone', 'type' => 'text', 'id' => 'phone', 'class' => 'input-login span12', 'maxlength' => '20', 'value' => $mobile_phone)); ?>
				</div>
			</div>
			<hr>
			<div class="row-fluid control-group mb-20 ">
				<?php echo form_label('Jenis kelamin : ', 'gender', array('class' => 'control-label')); ?>
				<div class="controls">
					<label class="radio inline mr-20">
						<?php echo form_radio(array('name' => 'gender', 'value' => '1', 'checked' => (($gender=='1')?true:false), 'id' => 'gender-male')). "Pria";?>
					</label>
					<label class="radio inline">
						<?php echo form_radio(array('name' => 'gender', 'value' => '2', 'checked' => (($gender=='2')?true:false), 'id' => 'gender-female')). "Wanita";?>
					</label>
				</div>
			</div>
			<div class="row-fluid control-group">
				<?php echo form_label('Tanggal lahir : ', 'birthday', array('class' => 'control-label')); ?>
				<div class="controls controls-date-field">
										
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
			<hr>
			<div class="row-fluid control-group">
				<?php echo form_label('Alamat Email : ', 'email', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php
						$data = array(
						'type' => 'email',
						'name' => 'email_value',
						'value' => $email_value,
						'class' => 'input-login span12'
						);
						echo form_input($data);
					?>
				</div>
			</div>
			<div class="row-fluid control-group">
				<?php echo form_label('Kata Sandi : ', 'password', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php 
						echo form_password(array('name' => 'password', 'value' => '', 'type' => 'password', 'data-content' => 'Untuk meningkatkan keamanan akun Tokopedia Anda, harap menggunakan <span class=\'red bold\'>kata sandi yang berbeda</span> dari akun e-mail Anda.', 'autocomplete' => 'off', 'data-toggle' => 'popover', 'class' =>'input-login span12 pass-con', 'data-placement' => 'top', 'data-html' => 'true', 'id' => 'password', 'data-original-title' => "<span class='bold'>Keamanan Kata Sandi</span>")); 
					?>
				</div>
			</div>
			<div class="row-fluid control-group">
				<?php echo form_label('Ulangi Kata Sandi : ', 'repassword', array('class' => 'control-label')); ?></label>
				<div class="controls">
					<?php
						echo form_password(array('name' => 'repassword', 'value' => '', 'class' => 'input-login span12', 'autocomplete' => 'off'));
					?>
				</div>
			</div>
			<hr>
			<div class="alert alert-info overflow-hidden mb-10 mt-10">
				<h4 class="red ta-center mb-10">Informasi Keamanan</h4>
				<!--<div class="pull-left mt-40 ml-10 mr-15 mb-50"><i class="icon-locked fs-50"></i></div>-->
				<div class=" fs-12 lh-18">
					<ul>
						<li class="">
							<!--<i class="icon-checked pull-left mt-5"></i>--><p class="pull-left span6 ml-0 mr-10 mb-5 span10">Harap tidak menginformasikan <b>username dan password</b> Anda kepada siapapun, termasuk pihak yang mengatasnamakan JStore Online.</p>
						</li>
						<li class="">
							<!--<i class="icon-checked pull-left mt-5"></i>--><p class="pull-left span6 ml-0 mr-10 mb-5 span10">Semua proses jual beli berlangsung <b>otomatis</b> melalui sistem JStore Online.</p>
						</li>
						<li class="">
							<!--<i class="icon-checked pull-left mt-5"></i>-->
							<p class="pull-left span6 ml-0 mr-10 mb-5 span10">Pastikan pembayaran hanya dilakukan ke <b>rekening resmi milik JStore Online yaitu a/n JStore Online</b>.</p>
						</li>
						<li class="">
							<!--<i class="icon-checked pull-left mt-5"></i>-->
							<p class="pull-left span6 ml-0 mr-10 mb-5 span10">Untuk setiap link yang anda dapatkan, <b>pastikan alamat browser berada di <?php echo site_url(); ?></b>.</p>
						</li>
						<li class="clearfix"></li>
					</ul>
					<a class="pull-right mt-5 mb-5" href="<?php echo site_url('panduan/beli'); ?>" target="_blank"><u>Baca selengkapnya</u></a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row-fluid control-group">
				<label class="checkbox display-block mb-0">
					<?php
						$attr = array(
							'name'        => 'register_tos',
							'class'          => 'register_tos',
							'value'       => '1'
						);
						echo form_checkbox($attr);
					?>
					<small class="small-gray">Saya sudah membaca dan menyetujui <a class="green" href="<?php echo site_url('terms'); ?>" target="_blank">Syarat dan Ketentuan</a>, serta <a class="green" href="<?php echo site_url('privacy'); ?>" target="_blank">Kebijakan Privasi</a> dari JStore Online.</small>
				</label>
				<small class="red ml-20 tos_error hide">Untuk dapat menggunakan layanan JStore Online, anda harus menyetujui <b>Syarat dan Ketentuan</b> dari JStore Online</small>
			</div>
			<div class="row-fluid mb-20">
				<div class="span6 offset3">
					<button type="submit" name="submit" class="btn btn-block btn-action">Bergabung</button>
					<!--<div class="mt-40">
						<div class="line-through"><p><span class="muted">atau</span></p></div>
						<a href="<?php echo site_url('facebook_login'); ?>"><button class="btn btn-block btn-facebook mb-10" type="button"><i class="icon-facebook icon-large"></i>&nbsp;&nbsp;&nbsp;Masuk dengan Facebook</button></a>
						<a href="<?php echo site_url('plus_login'); ?>"><button class="btn btn-block btn-buy" type="button"><i class="icon-google-plus icon-large"></i>&nbsp;&nbsp;&nbsp;Masuk dengan Google</button></a>
					</div>-->
				</div>
			</div>
		</form>
	</div>
</section>