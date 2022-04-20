<?PHP

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/BidangDivisi.class.php");

$bidang = new BidangDivisi($db_host, $db_user, $db_pass, $db_name);
$bidang->open();
$bidang->getBidangDivisi();

if (!empty($_GET['id_update'])) {
	$id_update = $_GET['id_update'];
	$nama_update = $_GET['nama'];
	$semester_update = $_GET['semester'];
	$jabatan_update = $_GET['jabatan'];
}

?>

<!DOCTYPE html>
<html>
	<head>
		<!-- Metadata -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Satria Pinandita Abyatarsyah">
		<meta name="description" content="Ujian Tengah Semester Praktikum mata kuliah Desain & Pemrograman Web">
		
		<title>Form Pengurus</title>
		
		<!-- Logo Title -->
		<link rel="icon" href="https://i.postimg.cc/fbfTzmDb/logo.png">
		<!-- Icon -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-sm container-md">
				<a class="navbar-brand" href="index.php">
					<img src="https://i.postimg.cc/fbfTzmDb/logo.png" alt="logo drestanta tiyasa" width="30" height="30">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="form.php">Tambah Pengurus</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<main class="container-sm container-md" style="margin-top: 100px; margin-bottom: 100px;">
			<div class="col-lg-6 col-md-4 col-sm-4 col-4 m-auto">
				<div class="card p-5 mr-3">
					<?PHP

					if (!empty($_GET['id_update'])) {
						echo "<h2 class='card-title'>Update Pengurus</h2>";
					}
					else {
						echo "<h2 class='card-title'>Tambah Pengurus</h2>";

					}
					
					?>
					<form action="index.php" method="POST">
						<div class="form-row">
							<div class="form-group col">
								<label for="tnim">NIM</label>
								<?PHP
								
								if (!empty($_GET['id_update'])) {
									echo "<input type='text' class='form-control' name='tnim' value='" . $id_update . "' required />";
								}
								else {
									echo "<input type='text' class='form-control' name='tnim' required />";
								}

								?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label for="tnama">Nama</label>
								<?PHP
								
								if (!empty($_GET['nama'])) {
									echo "<input type='text' class='form-control' name='tnama' value='" . $nama_update . "' required />";
								}
								else {
									echo "<input type='text' class='form-control' name='tnama' required />";
								}

								?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label for="tsemester">Semester</label>
								<?PHP
								
								if (!empty($_GET['semester'])) {
									echo "<input type='number' min='1' max='8' class='form-control' name='tsemester' value='" . $semester_update . "' required />";
								}
								else {
									echo "<input type='number' min='1' max='8' class='form-control' name='tsemester' required />";
								}

								?>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col">
								<label for="tjabatan">Jabatan</label>
								<select class="form-select form-control" name="tjabatan" id="tjabatan" required>
									<?PHP
					
									if (empty($_GET['jabatan'])) {
										echo "<option selected>Pilih Jabatan</option>";
									}
									
									while (list($id_bidang, $jabatan, $id_divisi) = $bidang->getResult()) {
										if ($jabatan_update == $jabatan) {
											echo "<option selected value='". $id_bidang ."'>" . $jabatan ."</option>";
										} else {
											echo "<option value='". $id_bidang ."'>" . $jabatan ."</option>";
										}
									}

									?>
								</select>
							</div>
						</div>
						<?PHP

						if (!empty($_GET['id_update'])) {
							echo "<button type='submit' name='update' id='update' class='btn btn-success mt-3'>Update</button>";
						}
						else {
							echo "<button type='submit' name='add' id='add' class='btn btn-success mt-3'>Tambah</button>";

						}
						
						?>
					</form>
				</div>
			</div>
		</main>
	</body>
</html>