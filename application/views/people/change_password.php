<div class="container" itemscope="" itemtype="http://schema.org/WebPage"><div class="row-fluid"></div><section class="container">
	<div class="form-register-wrapper form-register-wrapper--hp">
		<?php 
			$attr = array(
				'id' => 'form-verification',
				'class' => 'form-horizontal form-register box box-white box-shadow mb-30',
				'method' => 'post',
				'auto-complete' => 'off'
			);
			echo form_open('people/change_password', $attr); 
		?>
			<div class="text-center">
				<h3>Permintaan Ubah Kata Sandi</h3>
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
				<?php echo form_label('Kata Sandi lama', 'old-password', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'old_password', 'type' => 'password', 'id' => 'old-password', 'class' => 'input-login span12', 'value' => '')); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Kata Sandi baru', 'new-password1', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'new_password', 'type' => 'password', 'id' => 'new-password1', 'class' => 'input-login span12', 'value' => '')); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Konfirmasi Kata Sandi baru', 'new-password2', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'new_password2', 'type' => 'password', 'id' => 'new-password2', 'class' => 'input-login span12', 'value' => '')); ?>
				</div>			
			</div>
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<?php echo form_input(array('name' => 'uid', 'type' => 'hidden', 'value' => $user_id)); ?>
					<a class="span3 pull-left lh-40" href="edit">Batal</a>  <?php echo form_button(array('type' => 'submit', 'class' => 'btn pull-right btn-block btn-action span3', 'content' => 'Ubah'));?>
				</div>
			</div>
		</form>
	</div>
</section></div>