<?php
include 'header.php';
// Create database connection using config file
?>
<div class="container">
    <div class="page-header">
    <?php
  // defenisikan koneksi
  require('config.php');
  // Cek apakah parameter ID ada
  if (isset($_GET['id'])) {
    // jika ada ambil nilai id
    $id = $_GET['id'];
  } else {
    // jika tidak ada redirect ke index.php
  }
 ?>
        <!-- -->
        <html lang="id" dir="ltr">
            <head>
                <title>Detail Event</title>
            </head>
            <body>
                <div class="row intro-first">
                    <div class="col-lg-7 order-lg-2"></div>
                </div>
            <?php
      //select data
      $mysql = "SELECT * FROM data_survey WHERE id='$id'";
      $userdata = mysqli_query($mysqli, $mysql);
      // variable untuk membuat tabel HTML

      $strTbl = "";
      $strTbl .= "<table border='0'>";
      
      
      if (mysqli_num_rows($userdata) > 0) {
        // jika ada tampilkan kedalam tabel
        $data = mysqli_fetch_assoc($userdata);
        $strTbl .= $data['Foto'];
        $strTbl .= "<tr>";
        $strTbl .= "<td colspan='2'><h1>". $data['Nama_Even'] ."</h1></td>";
        $strTbl .= "</tr>";
        $strTbl .= "<tr>";
        $strTbl .= "<td colspan='2'><h5>Nama Event : </h5>";
        $strTbl .= "<h3>". $data['Nama_Even'] ."</h3></td>";
        $strTbl .= "</tr>";
        $strTbl .= "<tr>";
        $strTbl .= "<td colspan='2'>Expired Date :</h5>";
        $strTbl .= "<h2>". $data['X'] ."</h2></td>";
        $strTbl .= "</tr>";
        $strTbl .= "<tr>";
        $strTbl .= "<td colspan='2'><h5>Deskripsi :</h5>";
        $strTbl .= "<h4>" .$data['deskripsi'] ."</h4></td>";
        $strTbl .= "</tr>";

      } else {
        // jika data tidak ada, tampilkan pesan didalam tabel
        $strTbl .="<tr><td>Ooouppsss... Maaf, data masih kosong, tambahkan data dari Database terlebih dahulu</td></tr>";
      }
      $strTbl .= "</table>";
      $strTbl .= "<a class='btn btn-success' href='index.php'>Kembali</a>";
      // tampilkan tabel pada halaman
      print($strTbl);    

      if (isset($_POST['Submit2']) ) {
        $jml = $_POST['jml'];
        //
        include_once("config.php");
        //
        $result = $mysqli->prepare("INSERT INTO ticket(Jumlah) VALUES('$jml')");
        $result->bind_param('s', $jml);
        $result->execute();  
        // Show message when user added
       //   if ($result) {
      //   echo "Berhasil Join, Silahkan kembali. <a href='admin.php?user=admin&pass=admin'>Dashboard Admin</a>";
      //  }else{echo "Error: " . $stmt . "<br>" . mysqli_error($mysqli) .".<br>Jumlah Penuh. <a href='admin.php?user=admin&pass=admin'>Kembali</a>";
      }
      
?>

            </body>
        </html>