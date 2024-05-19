
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Sitem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="stylelogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Sedan+SC&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Emirhan Çoruh</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Ana Sayfa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hakkında.html">Hakkında</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="özgeçmiş.html">Özgeçmiş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="şehrim.html">Şehrim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="takımımız.html">Takımımız</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="iletisim.html">İletişim</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <section class="p-5 text-center hakkimizda">
            <div class="container">
                <h2 class="mb-5 font-weight-bold">GİRİŞ EKRANI SONUCU</h2>
                <hr class="ayrac"><i class="fas fa-key ikon"></i>
            </div>
        </section>
    </header>
    <div class="hakkimizda">
        <?php
        session_start();
        include("kullanıcı.php");
        if ($_POST["email"] == $username && $_POST["password"] == $password) {
            $_SESSION["login"] = "true";
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            $kullaniciAdi = substr($username, 0, strrpos($username, "@"));

            echo '<h1>Sisteme Giriş Başarılı</h1><br><h3>HOŞGELDİNİZ Sayın</h3><h2>' . $kullaniciAdi . '</h2><h3>Sisteme Giriş Başardınız</h3>';
            header("Refresh: 10; url=login.html");
        } else {
            echo '<h1>Başarısız Giriş</h1><br><h3>Kullanıcı Adı veya Şifre Yanlış Girdiniz</h3><br><h3>Lütfen kontrol edip tekrar deneyin</h3>';
            header("Refresh: 10; url=login.html");
        }
        ?>
        <a href="login.html">
            <input type="button" class="btn btn-dark" value="Giriş Ekranına Geri Dön">
        </a>
        <a href="index.html">
            <input type="button" class="btn btn-dark" value="Ana Sayfaya Geri Dön">
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <footer class="py-5 text-white text-center static-bottom">
        Web Teknolojileri Projesi © Emirhan Çoruh 2024
    </footer>
</body>
</html>
