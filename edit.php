<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama_even'];
    $foto = $_POST['foto'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $deskripsi =$_POST['deskripsi'];

    // update user data
    $stmt = $mysqli->prepare("UPDATE data_survey SET Nama_even=?, Y=?, X=?, Foto=?, deskripsi=? WHERE ID=?");
    $stmt->bind_param('sssssi', $nama, $lat, $lng, $foto, $deskripsi, $id);
    $stmt->execute();
    if ($stmt) {
        // Redirect to homepage to display updated user in list
        header("Location: admin.php?user=admin&pass=admin");
    } else {
        echo "Error: " . $stmt . "<br>" . mysqli_error($mysqli) . ". <br>Data gagal diupdate. <a href='admin.php?user=admin&pass=admin'>Dashboard Admin</a>";
    }
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM data_survey WHERE ID=$id");

while ($data = mysqli_fetch_array($result)) {
    $nama = $data['Nama_Even'];
    $lat = $data['Y'];
    $lng = $data['X'];
    $foto = $data['Foto'];
    $deskripsi = $data['deskripsi'];
}

include 'header_admin.php';
?>
<div class="container">
    <div class="page-header">
        <h1>Edit Event</h1>
    </div>
    <form method="post" action="edit.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nama Event
                        <span class="text-danger">*</span></label>
                    <input
                        class="form-control"
                        type="text"
                        name="nama_even"
                        value="<?php echo $nama; ?>"/>
                </div>
                <div class="form-group">
                    <label>Foto
                        <span class="text-danger">*</span></label>
                    <input
                        class="form-control"
                        type="text"
                        name="foto"
                        value="<?php echo $foto; ?>"/>
                </div>
                <div class="form-group">
                    <label>Startdate
                        <span class="text-danger">*</span></label>
                    <input
                        class="form-control"
                        type="date"
                        name="lat"
                        id="lat"
                        value="<?php echo $lat; ?>"/>
                </div>
                <div class="form-group">
                    <label>Expired date
                        <span class="text-danger">*</span></label>
                    <input
                        class="form-control"
                        type="date"
                        id="lng"
                        name="lng"
                        value="<?php echo $lng; ?>"/>
                </div>
                <div class="form-group">
                    <label>Deskripsi
                        <span class="text-danger">*</span></label>
                    <input
                        class="form-control"
                        type="text"
                        id="deskripsi"
                        name="deskripsi"
                        value="<?php echo $deskripsi; ?>"/>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
                    <button class="btn btn-primary" type="submit" name="update">
                        <span class="glyphicon glyphicon-save"></span>
                        Update</button>
                    <a class="btn btn-danger" href="admin.php?user=admin&pass=admin">
                        <span class="glyphicon glyphicon-arrow-left"></span>
                        Kembali</a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>