	<header class="navbar navbar-fixed-top" style="position: absolute; ">
		<div class="navbar-inner">
			<div class="container clearfix">
				<div class="topbar-logo-wrapper">
					<a href="<?php echo site_url('main/search'); ?>">J-Store Online<span class="site-logo"></span></a>
				</div>
				<ul class="topbar-nav inline pull-left">
					<li class="dropdown dropdown-topbar-category border-both">
						<a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo site_url('people/login'); ?>">Kategori</a>
						<div class="dropdown-menu">
							<div class="holder-dropdown-menu dropdown-category-thumb">
								<div class="row-fluid">
									<div class="span4">
										<ul>
											<li><a href="<?php echo site_url('product/pakaian'); ?>"><i class="icon-product-clothing icon-large"></i><span class="title">Pakaian</span></a></li>
											<li><a href="<?php echo site_url('product/fashion'); ?>"><i class="icon-product-fashion icon-large"></i><span class="title">Fashion &amp; Aksesoris</span></a></li>
											<li><a href="<?php echo site_url('p/kecantikan'); ?>"><i class="icon-product-beauty icon-large"></i><span class="title">Kecantikan</span></a></li>
											<li><a href="<?php echo site_url('p/kesehatan'); ?>"><i class="icon-product-health icon-large"></i><span class="title">Kesehatan</span></a></li>
											<li><a href="<?php echo site_url('p/rumah-tangga'); ?>"><i class="icon-product-home-appliances icon-large"></i><span class="title">Rumah Tangga</span></a></li>
											<li><a href="<?php echo site_url('p/dapur'); ?>"><i class=" icon-product-kitchen-dining icon-large"></i><span class="title">Dapur</span></a></li>
											<li><a href="<?php echo site_url('p/perawatan-bayi'); ?>"><i class="icon-product-baby icon-large"></i><span class="title">Perawatan Bayi</span></a></li>
										</ul>
									</div>
									<div class="span4">
										<ul>
											<li><a href="<?php echo site_url('p/handphone-tablet'); ?>"><i class="icon-product-phone-tablet icon-large"></i><span class="title">Handphone &amp; Tablet</span></a></li>
											<li><a href="<?php echo site_url('p/laptop-aksesoris'); ?>"><i class="icon-product-notebook icon-large"></i><span class="title">Laptop &amp; Aksesoris</span></a></li>
											<li><a href="<?php echo site_url('p/komputer-aksesoris'); ?>"><i class="icon-product-pc icon-large"></i><span class="title">Komputer &amp; Aksesoris</span></a></li>
											<li><a href="<?php echo site_url('p/elektronik'); ?>"><i class="icon-product-electronics icon-large"></i><span class="title">Elektronik</span></a></li>
											<li><a href="<?php echo site_url('p/kamera-foto-video'); ?>"><i class="icon-product-photography icon-large"></i><span class="title">Kamera, Foto &amp; Video</span></a></li>
											<li><a href="<?php echo site_url('p/otomotif'); ?>"><i class="icon-product-automotive icon-large"></i><span class="title">Otomotif</span></a></li>
											<li><a href="<?php echo site_url('p/olahraga'); ?>"><i class="icon-product-sports icon-large"></i><span class="title">Olahraga</span></a></li>
										</ul>
									</div>
									<div class="span4">
										<ul>
											<li><a href="<?php echo site_url('p/office-stationery'); ?>"><i class=" icon-product-office-stationery icon-large"></i><span class="title">Office &amp; Stationery</span></a></li>
											<li><a href="<?php echo site_url('p/souvenir-kado-hadiah'); ?>"><i class=" icon-product-gift icon-large"></i><span class="title">Souvenir, Kado &amp; Hadiah</span></a></li>
											<li><a href="<?php echo site_url('p/mainan-hobi'); ?>"><i class="icon-product-toys-hobbies icon-large"></i><span class="title">Mainan &amp; Hobi</span></a></li>
											<li><a href="<?php echo site_url('p/makanan-minuman'); ?>"><i class="icon-product-food-beverages icon-large"></i><span class="title">Makanan &amp; Minuman</span></a></li>
											<li><a href="<?php echo site_url('p/buku'); ?>"><i class="icon-product-books icon-large"></i><span class="title">Buku</span></a></li>
											<li><a href="<?php echo site_url('p/software'); ?>"><i class="icon-product-softwares icon-large"></i><span class="title">Software</span></a></li>
											<li><a href="<?php echo site_url('p/film-musik-game'); ?>"><i class="icon-product-movies-games-music icon-large"></i><span class="title">Film, Musik &amp; Game</span></a></li>
										</ul>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span12 text-center"><small><b><a class="all-cat" href="<?php echo site_url('products'); ?>">Semua Kategori</a></b></small></div>
								</div>
							</div>
						</div>
					</li>
				</ul>
				<div class="pull-right">
					<ul id="b-nav" class="topbar-nav">
						<li class="dropdown border-left"><a href="<?php echo site_url('bantuan'); ?>" target="_blank">Bantuan</a></li>
						<?php if($logged_in) { ?>
						<li id="notification" class="dropdown dropdown-right border-left">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="relative"><i class="icon-new-message fs-20"></i><span class="text-price notification-counter hide old-counter">7</span></div></a>
							<ul class="dropdown-menu dropdown-basic" id="notification-ul" role="menu" aria-labelledby="dropdownMenu">
								<li>
									<a href="<?php echo site_url(); ?>inbox-message.pl">Pesan&nbsp;<strong><span class="count-unread-inbox count"><span class="count-unread-inbox-value cv">7</span></span></strong></a>
								</li>
								<li><a href="<?php echo site_url(); ?>inbox-talk.pl">Diskusi Produk</a></li>
								<li><a href="<?php echo site_url(); ?>inbox-review.pl">Review</a></li>
								<li><a href="<?php echo site_url(); ?>inbox-price-alert.pl">Notifikasi Harga</a></li>
								<li><a href="<?php echo site_url(); ?>inbox-ticket.pl">Layanan Pengguna</a></li>
								<li id="before-sales"><a href="<?php echo site_url(); ?>resolution-center.pl">Pusat Resolusi</a></li>
							</ul>
						</li>
						<li id="shop-tab" class="dropdown dropdown-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img width="27" src="https://ecs1.tokopedia.net/img/cache/100-square/default_v3-shopnophoto.png" alt="RuRu Store" class="imgshop img-27"></a>
							<ul class="dropdown-menu dropdown-basic" role="menu" aria-labelledby="dropdownMenu">
								<li><a href="<?php echo site_url(); ?>rurustore"><div class="dropdown-twoline"><strong>RuRu Store</strong></div><small class="small-gray">Toko Saya</small></a></li>
								<li class="divider"></li><li><a href="<?php echo site_url(); ?>myshop_order.pl">Penjualan<strong><span class="sales-total-value"></span></strong></a></li>
								<li><a href="<?php echo site_url(); ?>product-add.pl">Tambah Produk</a></li>
								<li><a href="<?php echo site_url(); ?>manage-product.pl">Daftar Produk</a></li>
								<li><a href="<?php echo site_url(); ?>myshop-editor.pl">Pengaturan Toko</a></li>
								<li><a href="<?php echo site_url(); ?>user-management.pl">Pengaturan Admin</a></li>
								<li><a href="https://gold.tokopedia.com?ref_tkpd=v3_sticky_top" target="_blank"><small class="small-gray">Keanggotaan</small><div class="dropdown-twoline"><strong>Regular Merchant</strong></div><div class="clear-b mt-10 mb-5"><img src="https://ecs1.tokopedia.net/img/newtkpd/header.png" alt="GM Banner"></div><div class="clear-b"><small class="small-gray">Upgrade ke Gold Merchant <i class="icon-arrow-right"></i></small></div></a></li>
							</ul>
						</li>
						<li id="user-tab" class="dropdown dropdown-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="imgprofile img-27" width="27" src="https://ecs1.tokopedia.net/img/cache/100-square/default_v3-usrnophoto1.png" alt="Heru"></a>
							<ul class="dropdown-menu dropdown-basic" role="menu" aria-labelledby="dropdownMenu">
								<li><a id="user-profile" href="<?php echo site_url(); ?>people/203111"><div class="dropdown-twoline"><strong>Heru</strong></div><small class="small-gray">Profil Saya</small></a></li>
								<li class="header-deposit-container"><a href="<?php echo site_url(); ?>deposit.pl" class="deposit-link" style="" toggle="1"><div class="dropdown-twoline"><strong id="header-deposit-amount">Rp 0</strong></div><small class="small-gray">Saldo</small></a></li>
								<li class="divider"></li>
								<li><a href="<?php echo site_url(); ?>tx_payment_confirm.pl">Pembelian<strong><span class="purchase-total-value"></span></strong></a></li>
								<li><a href="<?php echo site_url(); ?>people/203111/edit">Pengaturan</a></li>
								<li class="divider"></li>
								<li class="holder-elements holder-elements-basic"><a href="<?php echo site_url(); ?>logout.pl"><i class="icon-off"></i>&nbsp;Keluar</a></li>
							</ul>
						</li>
						<li class="dropdown-right dropdown-last border-both">
							<a href="<?php echo site_url(); ?>tx.pl" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-shopping-cart icon-very-large"></i>&nbsp;<span id="total-item-cart">0</span></a>
							<div class="dropdown-menu dropdown-cart-empty">
								<a href="<?php echo site_url(); ?>tx.pl"><p><strong>Keranjang belanja Anda kosong.</strong></p><p class="last muted">Silakan pilih produk yang Anda inginkan lalu tekan tombol "Beli".</p></a>
							</div>
						</li>
						<?php } else { ?>
						<li class="dropdown-single border-left"><a href="<?php echo site_url('people/register'); ?>">Daftar</a></li>
						<li class="dropdown dropdown-right border-both">
							<a href="./Masuk _ Tokopedia_files/Masuk _ Tokopedia.html" id="login-ddl-link" class="dropdown-toggle" onclick="javascript:return false;" data-toggle="dropdown">Masuk</a>
							<ul class="dropdown-menu dropdown-basic" role="menu" aria-labelledby="dropdownMenu"><li></li></ul>
						</li>
						<?php } ?>
					</ul>
				</div>
				<form id="navbar-search" action="<?php echo site_url('search'); ?>" class="navbar-search" method="get">
					<input type="hidden" name="st" value="product"><div class="search-parent-older">
						<div class="search-parent">
							<input name="q" class="input-wrapper" id="search-keyword" type="text" placeholder="Cari produk / toko" value="">
							<div class="cat-wrapper permanent-active">
								<div class=" cat-result-wrapper">
									<ul class="inline cat-result">
										<li class="cat-result-toggle">Semua Kategori</li><li><i class="icon-caret-down"></i></li>
									</ul>
								</div>
								<select name="sc" id="cat-select" class="cat-select absolute">
									<option value="0">Semua Kategori</option>
									<option class="ml-10" value="78">Pakaian</option>
									<option class="ml-10" value="79">Fashion &amp; Aksesoris</option>
									<option class="ml-10" value="61">Kecantikan</option>
									<option class="ml-10" value="715">Kesehatan</option>
									<option class="ml-10" value="984">Rumah Tangga</option>
									<option class="ml-10" value="983">Dapur</option>
									<option class="ml-10" value="56">Perawatan Bayi</option>
									<option class="ml-10" value="65">Handphone &amp; Tablet</option>
									<option class="ml-10" value="288">Laptop &amp; Aksesoris</option>
									<option class="ml-10" value="297">Komputer &amp; Aksesoris</option>
									<option class="ml-10" value="60">Elektronik</option>
									<option class="ml-10" value="578">Kamera, Foto &amp; Video</option>
									<option class="ml-10" value="63">Otomotif</option>
									<option class="ml-10" value="62">Olahraga</option>
									<option class="ml-10" value="642">Office &amp; Stationery</option>
									<option class="ml-10" value="54">Souvenir, Kado &amp; Hadiah</option>
									<option class="ml-10" value="55">Mainan &amp; Hobi</option>
									<option class="ml-10" value="35">Makanan &amp; Minuman</option>
									<option class="ml-10" value="8">Buku</option>
									<option class="ml-10" value="20">Software</option>
									<option class="ml-10" value="57">Film, Musik &amp; Game</option>
									<option class="ml-10" value="36">Produk Lainnya</option>
								</select>
							</div>
							<span class="btn-search-wrapper">
								<button class="btn btn-search" type="submit"><i class="icon-search icon-large orange"></i></button>
							</span>
						</div>
					</div>
				</form>
				</div>
		</div>
	</header>
	<div id="content-container">
		<div class="container-fluid">
			<div class="row-fluid">