<div class="maincontent-admin">
	<h1 class="mb-0 mb-30" style="word-break: break-all">
		<i class="icon-avatar-alt mr-10"></i>Heru<?php //echo $name; ?>
	</h1>
	<ul class="horizontal-tab clear-b mt-20">
		<li class=""><a href="edit">Biodata Diri</a></li>
		<li class=""><a href="address">Daftar Alamat</a></li>
		<li class=""><a href="bank">Rekening Bank</a></li>
		<li class="active"><a href="notification">Notifikasi</a></li>
		<li class=""><a href="privacy">Atur Privasi</a></li>
	</ul>
	<div id="edit-notification" class="row-fluid mt-10">
		<div class="span12">
			<form id="frm_notification" name="frm_notification" class="form-horizontal">
			
			<?php 
				$attr = array(
					'name' => 'frm_notification',
					'id' => 'frm_notification',
					'class' => 'form-horizontal',
					'method' => 'post',
					'auto-complete' => 'off'
				);
				echo form_open('people/notification', $attr); 
			?>
				<input type="hidden" name="token" value="aca815fdcb56a92b74240f23db87f99e">
				<div class="well">
					<div class="control-group">
						<label class="span4" for=""><b>Buletin</b> </label>
						<div class="control">
							<label class="checkbox">
							<?php
								$attr = array(
									'name' => 'f_notice_news_letter',
									'id' => 'f-notice-news-letter',
									'type' => 'checkbox'
								);
								echo form_checkbox($attr);
							?>
							&nbsp;Setiap promosi, tips &amp; tricks, informasi update seputar Tokopedia</label>
						</div>
					</div>
					<div class="control-group">
						<label class="span4" for=""><b>Review</b> </label>
						<div class="control">
							<label class="checkbox">
							<?php
								$attr = array(
									'name' => 'f_notice_review',
									'id' => 'f-notice-review',
									'type' => 'checkbox'
								);
								echo form_checkbox($attr);
							?>
							&nbsp;Setiap Review dan Komentar yang saya terima</label>
						</div>
					</div>
					<div class="control-group">
						<label class="span4" for=""><b>Diskusi Produk</b> </label>
						<div class="control">
							<label class="checkbox">
							<?php
								$attr = array(
									'name' => 'f_notice_talk_product',
									'id' => 'f-notice--talk-product',
									'type' => 'checkbox'
								);
								echo form_checkbox($attr);
							?>
							&nbsp;Setiap Diskusi Produk dan Komentar yang saya terima</label>
						</div>
					</div>
					<div class="control-group">
						<label class="span4" for=""><b>Pesan Pribadi</b> </label>
						<div class="control">
							<label class="checkbox">
							<?php
								$attr = array(
									'name' => 'f_notice_pm',
									'id' => 'f-notice-pm',
									'type' => 'checkbox'
								);
								echo form_checkbox($attr);
							?>
							&nbsp;Setiap Pesan Pribadi yang saya terima</label>
						</div>
					</div>
					<div class="control-group">
						<label class="span4" for=""><b>Pesan Pribadi dari Admin</b> </label>
						<div class="control">
							<label class="checkbox">
							<?php
								$attr = array(
									'name' => 'f_notice_pm_from_admin',
									'id' => 'f-notice-pm-from-admin',
									'type' => 'checkbox'
								);
								echo form_checkbox($attr);
							?>
							&nbsp;Setiap Pesan Pribadi dari admin yang saya terima</label>
						</div>
					</div>
				</div>
				<?php 
					echo form_button(array('type' => 'submit', 'class' => 'btn btn-action', 'value' => 'submit', 'content' => 'Simpan'));
				?>
			</form>
		</div>
	</div>
</div>