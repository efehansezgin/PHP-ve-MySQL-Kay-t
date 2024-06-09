<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kaydı</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Kullanıcı Kaydı</h2>
        </div>
        <div class="card-body">
            <form id="kayitFormu" action="islem.php" method="POST" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="isim">İsim</label>
                    <input type="text" class="form-control" id="isim" name="isim" required>
                </div>
                <div class="form-group">
                    <label for="soyisim">Soyisim</label>
                    <input type="text" class="form-control" id="soyisim" name="soyisim" required>
                </div>
                <div class="form-group">
                    <label for="eposta">E-posta</label>
                    <input type="email" class="form-control" id="eposta" name="eposta" required>
                </div>
                <div class="form-group">
                    <label for="sifre">Şifre</label>
                    <input type="password" class="form-control" id="sifre" name="sifre" required>
                </div>
                <div class="form-group">
                    <label for="sifre_tekrar">Şifre Tekrar</label>
                    <input type="password" class="form-control" id="sifre_tekrar" name="sifre_tekrar" required>
                </div>
                <div class="form-group">
                    <label for="dogum_tarihi">Doğum Tarihi</label>
                    <input type="date" class="form-control" id="dogum_tarihi" name="dogum_tarihi" required>
                </div>
                <div class="form-group">
                    <label for="cinsiyet">Cinsiyet</label>
                    <select class="form-control" id="cinsiyet" name="cinsiyet" required>
                        <option value="Erkek">Erkek</option>
                        <option value="Kadın">Kadın</option>
                        <option value="Diğer">Diğer</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Kaydol</button>
            </form>
        </div>
        <div class="card-footer text-right">
            <a href="goster.php" class="btn btn-secondary">Kayıtlı Kullanıcıları Gör</a>
        </div>
    </div>
</div>
<script>
function validateForm() {
    const isim = document.getElementById('isim').value;
    const soyisim = document.getElementById('soyisim').value;
    const eposta = document.getElementById('eposta').value;
    const sifre = document.getElementById('sifre').value;
    const sifreTekrar = document.getElementById('sifre_tekrar').value;
    const dogumTarihi = document.getElementById('dogum_tarihi').value;
    const cinsiyet = document.getElementById('cinsiyet').value;

    if (isim.trim() === '' || soyisim.trim() === '' || eposta.trim() === '' || sifre.trim() === '' || sifreTekrar.trim() === '' || dogumTarihi.trim() === '' || cinsiyet.trim() === '') {
        alert('Lütfen tüm alanları doldurun.');
        return false;
    }

    const epostaDeseni = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!epostaDeseni.test(eposta)) {
        alert('Lütfen geçerli bir e-posta adresi girin.');
        return false;
    }

    if (sifre.length < 6) {
        alert('Şifre en az 6 karakter uzunluğunda olmalıdır.');
        return false;
    }

    if (sifre !== sifreTekrar) {
        alert('Şifreler eşleşmiyor.');
        return false;
    }

    return true;
}
</script>

</body>
</html>
