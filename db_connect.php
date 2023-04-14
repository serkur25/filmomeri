<?php
$servername = "localhost"; // sunucu adı
$username = "serkur"; // kullanıcı adı
$password = "190525"; // şifre
$dbname = "film_onerileri"; // veritabanı adı


$conn = mysqli_connect($servername, $username, $password, $dbname);

// Bağlantı kontrolü yapın
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}
