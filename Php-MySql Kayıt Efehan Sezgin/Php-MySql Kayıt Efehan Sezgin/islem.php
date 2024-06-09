<?php
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adınızı buraya girin
$password = ""; // Veritabanı şifrenizi buraya girin
$dbname = "kullanici_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$isim = $_POST['isim'];
$soyisim = $_POST['soyisim'];
$eposta = $_POST['eposta'];
$sifre = $_POST['sifre'];
$sifre_tekrar = $_POST['sifre_tekrar'];
$dogum_tarihi = $_POST['dogum_tarihi'];
$cinsiyet = $_POST['cinsiyet'];

if ($sifre !== $sifre_tekrar) {
    die("Şifreler eşleşmiyor.");
}

$sifre_hash = password_hash($sifre, PASSWORD_BCRYPT);

$sql = "INSERT INTO kullanicilar (isim, soyisim, eposta, sifre, dogum_tarihi, cinsiyet) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $isim, $soyisim, $eposta, $sifre_hash, $dogum_tarihi, $cinsiyet);

if ($stmt->execute()) {
    header("Location:goster.php");
    exit();
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
