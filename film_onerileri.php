<?php
include 'db_connect.php';
$host = "localhost"; // veritabanı sunucusu
$dbname = "film_onerileri"; // veritabanı adı
$username = "serkur"; // veritabanı kullanıcı adı
$password = "190525"; // veritabanı şifresi

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  // PDO sınıfı kullanarak veritabanına bağlanma
} catch(PDOException $e) {
  die("Veritabanı bağlantısı sağlanamadı: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Öneri Sitesi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Film Öneri Sitesi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Ana Sayfa <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Film Önerileri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">İletişim</a>
                </li>
            </ul>
        </div>
    </nav>
    <form><div class="form-group">
    <label for="tur">Film Türü:</label>
    <select class="form-control" name="tur" id="tur">
        <option value="Tümü">Tümü</option>
        <option value="Aksiyon">Aksiyon</option>
        <option value="Drama">Drama</option>
        <option value="Komedi">Komedi</option>
        <option value="Romantik">Romantik</option>
    </select>
</div>

</form>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Film Önerileri</h1>
            </div>
        </div>

        <?php
// Veritabanı bağlantısını yapalım
$servername = "localhost";
$username = "serkur";
$password = "190525";
$dbname = "film_onerileri";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Bağlantı kontrolü yapalım
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Veritabanından verileri çekelim
$sql = "SELECT film_adi, yonetmen, yapim_yili, aciklama, puan FROM filmler";
$result = mysqli_query($conn, $sql);

// Verileri tablo şeklinde ekrana yazdıralım
if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Film Adı</th><th>Yönetmen</th><th>Yapım Yılı</th><th>Açıklama</th><th>Puan</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["film_adi"]."</td><td>".$row["yonetmen"]."</td><td>".$row["yapim_yili"]."</td><td>".$row["aciklama"]."</td><td>".$row["puan"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Bağlantıyı kapatalım
mysqli_close($conn);
?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
