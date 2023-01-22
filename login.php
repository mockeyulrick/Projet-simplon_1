<?php
    session_start();
    ob_start();
    require('assets/config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Simplon Emargement</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/icon_simplon.png" rel="icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body style="background-image:url(assets/img/background.jpg)">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="login.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/icon_simplon.png" alt="">
                  <span class="d-none d-lg-block text-white">Simplon Emargement</span>
                </a>
              </div>

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4 text-danger">Connectez vous</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Adresse Mail</label>
                      <div class="input-group has-validation">
                        <input type="email" name="adresse_mail" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Entrez votre votre adresse mail</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="mot_de_passe" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Entrez votre mot de passe</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-outline-danger w-100 fw-bold" type="submit">Login</button>
                    </div>
                  </form>
                <?php 
                  if (!empty($_POST)) {
                      $adresse_mail = $_POST['adresse_mail'];
                      $mot_de_passe = $_POST['mot_de_passe'];
                      $stmt = $conn->prepare("SELECT * FROM administrateur WHERE Mail = ?");
                      $stmt->execute([$adresse_mail]);
                      $user = $stmt->fetch();
                      if ($user && (password_verify($mot_de_passe,$user['Mot_de_passe'])))
                      {
                        $_SESSION["login"]="1";
                        header('Location:index.php',true);
                      } else {
                        echo "<h6 class='alert alert-danger'>Nom d'utilisateur ou mot de passe erroné</h6>";
                  }
                }
                ?>
                </div>
              </div>

              <div class="credits text-white">
               Designed by <a href="#" class="text-danger bold fw-bold">Ulrick</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
<?php ob_end_flush(); ?>