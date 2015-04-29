<div class="maincontent-admin">
	<h1 class="mb-0 mb-30" style="word-break: break-all">
		<i class="icon-avatar-alt mr-10"></i><?php echo $name; ?>
	</h1>
	<ul class="horizontal-tab clear-b mt-20">
		<li class=""><a href="edit">Biodata Diri</a></li>
		<li class="active"><a href="address">Daftar Alamat</a></li>
		<li class=""><a href="bank">Rekening Bank</a></li>
		<li class=""><a href="notification">Notifikasi</a></li>
		<li class=""><a href="privacy">Atur Privasi</a></li>
	</ul>
	<div class="profile-info">
		<div class="row-fluid mb-15">
			<div class="span12">
				<div class="form-inline mt-5 pull-right" id="search-div">
					<div class="input-append mr-10">
						<input type="text" autofocus="autofocus" id="siteSearchBox" placeholder="Cari alamat" class="w-120" value=""><button class="btn" id="siteSearchSubmit"><i class="icon-search"></i></button>
					</div>
					<select id="address-order-by" name="order_by" class="w-140 mb-0 dropdown selectBox" style="display: none;">
						<option value="1" selected="true">Alamat Terbaru</option>
						<option value="2">Nama Alamat</option>
						<option value="3">Nama Penerima</option>
					</select>
					<a class="selectBox w-140 mb-0 dropdown select-normal selectBox-dropdown" title="" tabindex="0" style="width: 140px; display: inline-block;">
						<span class="selectBox-label" style="width: 106px;">Alamat Terbaru</span>
						<span class="selectBox-arrow"></span></a>
				</div>
				<div class="pull-left mt-5">
					<small><a href="address_new" class="actionlink-newadd-tab btn btn-action"><i class="icon-plus"></i> Tambah Alamat Baru</a></small>
				</div>
			</div>
		</div>
		<div class="clear-b"></div>
		<table class="table table-bordered"><tbody>
			<?php 
				if($result != ''){
					foreach($result as $data) { 
			?>
			<tr>
				<td class="span3">
					<div class="yellow-box"><a class="selected-addr"><h5 class="word-break"><i class="icon-checked mr-5"></i><?php echo $data['alias']; ?></h5></a><ul><li><small><b>Nama Penerima:</b></small> <br><?php echo $data['receiver_name']; ?></li><li><small><b>Telepon:</b></small> <br> <?php echo $data['phone_number']; ?></li></ul></div><small><a href="" class="mr-10 edit-address" id="edit-3980175"><i class="icon-pencil mr-5"></i>Ubah</a><a href="" class="mr-10 delete-address" id="delete-3980175"><i class="icon-delete mr-5"></i>Hapus</a></small>
				</td>
				<td>
					<ul class="address-content"><li><small><b>Alamat Pengiriman:</b></small> <br>  <?php echo $data['address']; ?> <?php echo $data['post_code']; ?><div class="detail-list"><ul class="inline"><li><small><b>Kecamatan:</b></small> <br> <?php echo $data['district']; ?></li><li><small><b>Kotamadya:</b></small> <br> <?php echo $data['city']; ?></li><li><small><b>Provinsi:</b></small> <br><?php echo $data['province']; ?></li><li><small><b>Negara:</b></small> <br> <?php echo $data['country']; ?></li></ul></div></li></ul>
				</td>
			</tr>		
				<?php }} ?>
		</tbody></table>
		<div class="row-fluid mb-20 text-center"><div class="span12 "><div class="pagination pull-right"><ul></ul></div></div></div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>