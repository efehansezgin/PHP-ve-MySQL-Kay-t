<?php
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adınızı buraya girin
$password = ""; // Veritabanı şifrenizi buraya girin
$dbname = "kullanici_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT isim, soyisim, eposta, dogum_tarihi, cinsiyet FROM kullanicilar";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Listesi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            margin-top: 30px;
        }
        .table {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container table-container">
    <h2>Kullanıcı Listesi</h2>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>E-posta</th>
                <th>Doğum Tarihi</th>
                <th>Cinsiyet</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["isim"]. "</td>
                        <td>" . $row["soyisim"]. "</td>
                        <td>" . $row["eposta"]. "</td>
                        <td>" . $row["dogum_tarihi"]. "</td>
                        <td>" . $row["cinsiyet"]. "</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Hiç kullanıcı bulunamadı</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-success d-block">Kullanıcı Ekleme Alanına Git</a>

</div>
</body>
</html>
<?php
$conn->close();
?>
