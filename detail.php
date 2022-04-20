<?PHP

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");

$nim = $_GET['nim'];
$nama = $_GET['nama'];
$semester = $_GET['semester'];
$jabatan = $_GET['jabatan'];

$data = null;
$data2 = null;

$data .= "<div class='col-6 p-3 m-auto'>
				<div class='card p-2  text-decoration-none' style='border-radius: 10px;'>
					<div style='background-color: #212529; height: 200px; border-radius: 10px;'></div>
					<div class='p-2'>
						<div class='row'>
							<h6 class='col-3'>Nama</h6>
							<h6 class='col-1 text-end'>:</h6>
							<h6 class='col-8 fw-light'>" . $nama . "</h6>
						</div>
						<div class='row'>
							<h6 class='col-3'>NIM</h6>
							<h6 class='col-1 text-end'>:</h6>
							<h6 class='col-8 fw-light'>" . $nim . "</h6>
						</div>
						<div class='row'>
							<h6 class='col-3'>Semester</h6>
							<h6 class='col-1 text-end'>:</h6>
							<h6 class='col-8 fw-light'>" . $semester . "</h6>
						</div>
						<div class='row'>
							<h6 class='col-3'>Jabatan</h6>
							<h6 class='col-1 text-end'>:</h6>
							<h6 class='col-8 fw-light'>" . $jabatan . "</h6>
						</div>
					</div>
				</div>
			</div>";

$data2 .= "<div class='row'>
				<div class='col-6 px-3 m-auto text-end'>
					<a class='col text-decoration-none' href='form.php?id_update=$nim&nama=$nama&semester=$semester&jabatan=$jabatan'>
						<button class='btn btn-success'>Update</button>
					</a>
					<a class='col text-decoration-none' href='index.php?id_hapus=$nim'>
						<button class='btn btn-danger'>Delete</button>
					</a>
				</div>
			</div>";

$tpl = new Template("templates/detail.html");
$tpl->replace("DETAIL_CARD", $data);
$tpl->replace("DETAIL_BUTTON", $data2);
$tpl->write();

?>