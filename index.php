<?PHP

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Pengurus.class.php");

$pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
$jabatan = new Pengurus($db_host, $db_user, $db_pass, $db_name);
$pengurus->open();
$jabatan->open();
$pengurus->getPengurus();
$data = null;

while (list($nim, $nama, $semester, $id_bidang) = $pengurus->getResult()) {
	$sebagai = $jabatan->getJabatan($id_bidang);
    $data .= "<div class='col-lg-4 p-3'>
				<a href='detail.php?nim=$nim&nama=$nama&semester=$semester&jabatan=$sebagai' class='card p-2  text-decoration-none' style='border-radius: 10px;'>
					<div style='background-color: #212529; height: 200px; border-radius: 10px;'></div>
					<h4 class='mb-0 text-black'>" . $nama . "</h4>
					<h6 class='align-items-center text-black-50'>" . $sebagai . "</h6>
				</a>
			</div>";
}

$pengurus->close();
$tpl = new Template("templates/index.html");
$tpl->replace("CARD", $data);
$tpl->write();

?>