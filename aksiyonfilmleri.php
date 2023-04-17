<?php
include 'db_connect.php';
include 'film_onerileri.php';

$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);
if (!$conn) {
  die("Bağlantı hatası: " . mysqli_connect_error());
}

$sql = "SELECT film_adi, yonetmen, yapim_yili, aciklama, puan FROM filmler";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row["film_adi"]."</td><td>".$row["yonetmen"]."</td><td>".$row["yapim_yili"]."</td><td>".$row["aciklama"]."</td><td>".$row["puan"]."</td></tr>";
  }
} else {
  echo "0 sonuç";
}

mysqli_close($conn);
?>
