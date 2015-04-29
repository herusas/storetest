<div class="maincontent-admin">
	<h1 class="mb-0 mb-30" style="word-break: break-all">
		<i class="icon-avatar-alt mr-10"></i><?php echo $name; ?>
	</h1>
	<ul class="horizontal-tab clear-b mt-20">
		<li class=""><a href="edit">Biodata Diri</a></li>
		<li class=""><a href="address">Daftar Alamat</a></li>
		<li class="active"><a href="bank">Rekening Bank</a></li>
		<li class=""><a href="notification">Notifikasi</a></li>
		<li class=""><a href="privacy">Atur Privasi</a></li>
	</ul>
	<div class="profile-info">
		<div class="pull-left mb-10">
			<small><a href="bank_new" class="add-bank-acc btn btn-action"><i class="icon-plus"></i> Tambah Rekening Bank</a></small>
		</div>
		<div class="clear-b"></div>
		<table class="table table-bordered"><tbody>
			<?php 
				if($result != ''){
					foreach($result as $data) { 
			?>
			<tr>
				<td class="span3">
					<div class="yellow-box"><a href="" class="selected-addr"><h5 class="text-center"><i class="icon-checked mr-5"></i><?php echo $data['bank_name']; ?></h5></a></div>
					<small><a href="bank_change/<?php echo $data['bank_account_id']; ?>" class="mr-10 edit-bank-acc" id="edit-986503"><i class="icon-pencil mr-5"></i>Ubah</a><a href="bank_delete/<?php echo $data['bank_account_id']; ?>" class="mr-10 delete-bank-acc" id="delete-986503"><i class="icon-delete mr-5"></i>Hapus</a><?php if($data['status'] != 2) { ?><a href="bank_default/<?php echo $data['bank_account_id']; ?>" class="mr-10 set-default-acc" id="default-986503"><i class="icon-checked mr-5"></i>Utama</a><?php } ?></small>
				</td>
				<td>
					<div class="mr-30 mb-10 pull-left"><img src="https://ecs1.tokopedia.net/img/icon-bca.gif" width="100" alt="" class="mt-5"></div><div class="detail-list"><ul class="inline"><li class="mr-30"><small><b>Nama Pemilik Rekening:</b></small><br><?php echo $data['account_name']; ?></li><li class="mr-30"><small><b>Nomor Rekening:</b></small><br><?php echo $data['account_number']; ?></li><li class="mr-30"><small><b>Nama Bank:</b></small><br><?php echo $data['bank_name']; ?></li><li class="mr-30"><small><b>Cabang:</b></small><br><?php echo $data['account_branch']; ?></li></ul></div>
					
				</td>
			</tr>		
				<?php }} ?>
		</tbody></table>
		<div class="row-fluid mb-20 text-center"><div class="span12 "><div class="pagination pull-right"><ul></ul></div></div></div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>