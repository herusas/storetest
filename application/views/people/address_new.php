<div class="container" itemscope="" itemtype="http://schema.org/WebPage"><div class="row-fluid"></div><section class="container">
	<div class="form-register-wrapper form-register-wrapper--hp">
		<?php 
			$attr = array(
				'id' => 'form-verification',
				'class' => 'form-horizontal form-register box box-white box-shadow mb-30',
				'method' => 'post',
				'auto-complete' => 'off'
			);
			echo form_open('people/address_new', $attr); 
		?>
			<div class="text-center">
				<h3>Tambah Alamat Baru</h3>
			</div>
			<hr>
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
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Simpan sebagai', 'alias', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'alias', 'type' => 'text', 'id' => 'alias', 'class' => 'input-login span12', 'value' => $alias)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Nama Penerima', 'receiver_name', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'receiver_name', 'type' => 'text', 'id' => 'receiver_name', 'class' => 'input-login span12', 'value' => $receiver_name)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Telepon', 'phone_number', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'phone_number', 'type' => 'text', 'id' => 'phone_number', 'class' => 'input-login span12', 'value' => $phone_number)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Alamat', 'address', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_textarea(array('name' => 'address', 'id' => 'address', 'rows' => '3', 'class' => 'input-login span12', 'value' => $address)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Provinsi', 'province_code', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_dropdown('province_code', $province_list, $province_code, "id = 'province_code'  class = 'input-login span12'"); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Kota/Kabupaten', 'city_code', array('class' => 'control-label')); ?>
				<div class="controls" id="city_list">
					<?php echo form_dropdown('city_code', $city_list, $city_code, "id = 'city_code'  class = 'input-login span12'"); ?>
				</div>		
				<script>
				$('#province_code').change(function() {
					url = "<?php echo site_url('people/get_address'); ?>?province_code="+$('#province_code').val();
				  $("#city_code").load(url);
				  $("#district_code").html('<option value>Pilih Kecamatan</option>')
				});

				</script>	
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Kecamatan', 'district_code', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_dropdown('district_code', $district_list, $district_code, "id = 'district_code'  class = 'input-login span12'"); ?>
				</div>		
				<script>
				$('#city_code').change(function() {
					url = "<?php echo site_url('people/get_address'); ?>?city_code="+$('#city_code').val();
				  $("#district_code").load(url)
				});

				</script>	
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Kode Pos', 'post_code', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'post_code', 'type' => 'text', 'id' => 'post_code', 'class' => 'input-login span12', 'value' => $post_code)); ?>
				</div>			
			</div>
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<?php echo form_input(array('name' => 'uid', 'type' => 'hidden', 'value' => $user_id)); ?>
					<?php echo form_input(array('name' => 'country_code', 'type' => 'hidden', 'value' => $country_code)); ?>
					<a class="span3 pull-left lh-40" href="edit">Batal</a>  <?php echo form_button(array('type' => 'submit', 'class' => 'btn pull-right btn-block btn-action span3', 'content' => 'Ubah'));?>
				</div>
			</div>
		</form>
	</div>
</section></div>