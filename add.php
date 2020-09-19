<?php
include 'header_admin.php';
?>
<div class="container">
    <div class="page-header">
        <h1>Tambah Event</h1>
    </div>
    <form method="post" action="add.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama Event <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_even" />
                </div>
                <div class="form-group">
                    <label>Foto <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="foto" />
                </div>
                <div class="form-group">
                    <label>Startdate <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="lat" id="lat" />
                </div>
                <div class="form-group">
                    <label>Expiredate <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" id="lng" name="lng" />
                </div>
                <div class="form-group">
                    <label>Deskripsi Event <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="deskripsi" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="Submit"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                    <a class="btn btn-danger" href="admin.php?user=admin&pass="><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
                </div>
            </div>
        </div>
        
    </form>
</div>
<?php
// Check If form submitted, insert form data into users table.
if (isset($_POST['Submit'])) {

    $ekstensi_boleh = array('png', 'jpg');
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran    = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    $foto = "<img src='foto\\$namafoto' width='400' />";

    $nama = $_POST['nama_even'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $deskripsi = $_POST['deskripsi'];

    // include database connection file
    include_once("config.php");

    if (in_array($ekstensi, $ekstensi_boleh) === true) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, 'foto/' . $namafoto);
            // Insert user data into table
            $stmt = $mysqli->prepare("INSERT INTO data_survey(Nama_Even,Y,X,Foto,deskripsi) VALUES(?, ?, ?, ?,?)");
            $stmt->bind_param('sssss', $nama, $lat, $lng, $foto, $deskripsi);
            $stmt->execute();
            if ($stmt) {
                // Show message when user added
                echo "Data telah berhasil ditambahkan. <a href='admin.php?user=admin&pass=admin'>Dashboard Admin</a>";
            } else {
                echo "Error: " . $stmt . "<br>" . mysqli_error($mysqli) . ". <br>Data gagal ditambahkan. <a href='admin.php?user=admin&pass=admin'>Dashboard Admin</a>";
            }
        } else {
            echo "Ukuran Foto terlalu besar.";
        }
    } else {
        echo "Ekstensi Foto yang diupload tidak diperbolehkan.";
    }
}

include 'footer.php';
?>