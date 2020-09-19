<?php
include 'header.php';
// Create database connection using config file
include_once("config.php");

    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM data_survey");
?>

<!-- -->
<div class="container">
    <div class="page-header">
        <h1>BOB EVENT <img class="pull-right" src="img/about/bsp.jpg" alt="" width="170px"></h1>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"></div>
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
                        echo "<td><a class='btn btn-success' href='detail_event.php?id=$user_data[ID]'><span class='glyphicon glyphicon-arrow-right'></span>Detail</a>
                         </a></td></tr>";
                    }
                    ?>
            </table>
        </div>
    </div>
</div>
<?php

include 'footer.php';
?>