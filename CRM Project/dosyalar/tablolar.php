<?php //Müşteri listesi sayfası
session_start();
if (!isset($_SESSION["username"])) {
	if (!isset($_SESSION["sifre"])) {
		header('location:../index.php');
	}
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
	<title>Kayıtlar</title>
	<style>
		#show_up {
			width: 200px;
			height: 200px;
			border: 1px solid #ddd;
			display: none;
		}

		#show_up a {
			border-bottom: 1px solid #ddd;
			display: block;
			padding: 5px;
		}
	</style>
	<?php
	include_once('partials/head.php');
	include_once('fonksiyonlar.php');
	error_reporting(0);
	$kayitlar = $baglan->logoGoster($sql);
	foreach ($kayitlar as $satir) {
		$resim = $satir->resim();
	?>
		<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
			<div class="navbar-header">
				<ul class="nav navbar-nav flex-row">
					<li class="nav-item mr-auto"><a class="navbar-brand" href="tablolar.php"><?php echo "<img class='brand-logo' src='uploads/$resim' alt='logo'>";
																						} ?>
						<h3 class="brand-text">CRM Yazılımı</h3>
						</a></li>
					<li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
				</ul>
			</div>
			<div class="main-menu-content">
				<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
					<li class=" nav-item"><a href="tablolar.php"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Müşteriler</span></a>
					</li>
					<li class=" nav-item"><a href="musteri-formu.php"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Müşteri Ekle</span></a>
					</li>
					<li class=" nav-item"><a href="logo.php"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Logo Değiştir</span></a>
					</li>
					<li class=" nav-item"><a href="cikis.php"><i class="ft-power"></i><span class="menu-title" data-i18n="">Çıkış</span></a>
					</li> 
				</ul>
			</div>
			<div class="navigation-background"></div>
		</div>

		<div class="app-content content">
			<div class="content-wrapper">
				<div class="content-wrapper-before"></div>
				<div class="content-header row">
					<div class="content-header-left col-md-4 col-12 mb-2">
						<h3 class="content-header-title">Müşteri Tablosu</h3>
					</div>
					<div class="content-header-right col-md-8 col-12">
						<div class="breadcrumbs-top float-md-right">
						</div>
					</div>
				</div>


				<!-- Bordered table start -->
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Müşteri Kayıtları</h4>
								<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
								<div class="heading-elements">
									<ul class="list-inline mb-0">
										<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
										<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
										<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
										<li><input class="" id="myInput" type="text" placeholder="Ara.."></li>
										<li><a href="csv.php" class="btn btn-icon btn-success mr-1"><b>CSV<i class="ft-paperclip"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-content collapse show">
								<div class="table-responsive">
									<table class="table table-bordered table-striped mb-0">
										<thead>
											<tr>
												<th>#</th>
												<th>Adı Soyadı</th>
												<th>Şirket Adı</th>
												<th>Bağlı Olduğu Vergi Dairesi</th>
												<th>Vergi No</th>
												<th>Telefon</th>
												<th>E-Posta</th>
												<th>Adres</th>
												<th>Şirket Logosu</th>
												<th>Düzenle</th>
												<th>Sil</th>
											</tr>
										</thead>
										<tbody id="myTable">
											<?php 
											$tablolar = $baglan->musteriKayitlari($sql); //Kayıtları tablolar içerisinde yazdırma
											foreach ($tablolar as $satir) {
												$sirketID = $satir->sirketID();
												$adsoyad = $satir->adsoyad();
												$sirketad = $satir->sirketad();
												$vergidaire = $satir->vergidaire();
												$vergino = $satir->vergino();
												$telefon = $satir->telefon();
												$email = $satir->email();
												$adres = $satir->adres();
												$sirketlogo = $satir->sirketlogo();
											?>
												<tr>
													<td><?php echo $sirketID ?></th>
													<td><?php echo $adsoyad ?></td>
													<td><?php echo $sirketad ?></td>
													<td><?php echo $vergidaire ?></td>
													<td><?php echo $vergino ?></td>
													<td><?php echo $telefon ?></td>
													<td><?php echo $email ?></td>
													<td><?php echo $adres  ?></td>
													<td><?php echo "<img class='brand-logo' src='uploads/sirketlogolari/$sirketlogo' alt='logo' width='50px'>"  ?></td>
													<td><a href="duzenle.php?id=<?php echo $sirketID ?>" class="btn btn-info">Düzenle</a></td>
													<td><a href="sil.php?id=<?php echo $sirketID ?>" onclick="if (!confirm('Kaydı silmek istediğinize emin misiniz?')) return false;" class="btn btn-danger">Sil</a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- Arama yapma jQuery-->
							<script>
								$(document).ready(function() {
									$("#myInput").on("keyup", function() {
										var value = $(this).val().toLowerCase();
										$("#myTable tr").filter(function() {
											$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
										});
									});
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>


		<?php
		include_once('partials/footer.php');
		?>