<?php
// Create database connection using config file
include_once("config.php");
$user = $_GET['user'];
$pass = $_GET['pass'];
if ($user != 'admin' && $pass != 'admin') {
    header('Location: login.php');
} else {
    include 'header_admin.php';

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM data_survey");
?>

<div class="container">
    <div class="page-header">
        <h1>Dashboard Admin</h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <form class="form-inline">
                <div class="form-group">
                    <button class="btn btn-success">
                        <span class="glyphicon glyphicon-refresh"></span>
                        Refresh</button>
                    <a class="btn btn-primary" href="add.php">
                        <span class="glyphicon glyphicon-plus"></span>
                        Tambah</a>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr class="nw">
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Event</th>
                        <th>Start</th>
                        <th>Expired</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                    while ($user_data = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $user_data['ID'] . "</td>";
                        echo "<td>" . $user_data['Foto'] . "</td>";
                        echo "<td>" . $user_data['Nama_Even'] . "</td>";
                        echo "<td>" . $user_data['Y'] . "</td>";
                        echo "<td>" . $user_data['X'] . "</td>";
                        echo "<td><a class='btn btn-xs btn-warning' href='edit.php?id=$user_data[ID]'><span class='glyphicon glyphicon-edit'></span>Edit</a>
                         | <a class='btn btn-xs btn-danger' href='delete.php?id=$user_data[ID]' onclick='return confirm('Hapus data?')'><span class='glyphicon glyphicon-trash'>Delete</a>
                         | <a class='btn btn-xs  btn-success' href='detailadmin.php?id=$user_data[ID]' onclick='return confirm('Hapus data?')'><span class='glyphicon glyphicon-arrow-right'>Detail</a>
                         </a></td></tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</div>
<?php
}
include 'footer.php';
?>