<div class="container" itemscope="" itemtype="http://schema.org/WebPage"><div class="row-fluid"></div><section class="container">
	<div class="form-register-wrapper form-register-wrapper--hp">
		<?php 
			$attr = array(
				'id' => 'add-bank-acc',
				'class' => 'form-horizontal form-register box box-white box-shadow mb-30',
				'method' => 'post',
				'auto-complete' => 'off'
			);
			echo form_open('people/bank_new', $attr); 
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
				<?php echo form_label('Nama Akun', 'account_name', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'account_name', 'type' => 'text', 'id' => 'account_name', 'class' => 'input-login span12', 'value' => $account_name)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Nomor Rekening', 'account_number', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'account_number', 'type' => 'text', 'id' => 'account_number', 'class' => 'input-login span12', 'value' => $account_number)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Nama Bank', 'bank_id', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_dropdown('bank_id', $bank_list, $bank_id, "id = 'bank_id'  class = 'input-login span12'"); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Cabang', 'account_branch', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'account_branch', 'type' => 'text', 'id' => 'account_branch', 'class' => 'input-login span12', 'value' => $account_branch)); ?>
				</div>			
			</div>
			<div id="form1" class="row-fluid control-group">
				<?php echo form_label('Kata Sandi', 'password', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input(array('name' => 'password', 'type' => 'password', 'id' => 'password', 'class' => 'input-login span12', 'value' => '')); ?>
				</div>			
			</div>
			<hr>
			<div class="row-fluid">
				<div class="span12">
					<?php echo form_input(array('name' => 'uid', 'type' => 'hidden', 'value' => $user_id)); ?>
					<a class="span3 pull-left lh-40" href="edit">Batal</a>  <?php echo form_button(array('type' => 'submit', 'class' => 'btn pull-right btn-block btn-action span3', 'content' => 'Simpan'));?>
				</div>
			</div>
		</form>
	</div>
</section></div>