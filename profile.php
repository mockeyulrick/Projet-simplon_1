<!DOCTYPE html>
<html lang="Fr">
<body>
<?php 
  require('assets/config/header.php');
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?php 
              $stmt4 = $conn->query("SELECT * FROM administrateur");
              $resusltat = $stmt4->fetch();
            ?>
              <img src="assets/img/user.png" alt="Profile" class="rounded-circle">
              <h2><?= $resusltat["Prenoms"];?> <?= $resusltat["Nom"];?></h2>
              <h3>Administrateur</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

<div class="card">
  <div class="card-body pt-3">
  <form method="post">

<div class="row mb-3">
  <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
  <div class="col-md-8 col-lg-9">
    <input name="nom" type="text" class="form-control" id="nom" value="<?= $resusltat["Nom"];?>" required>
  </div>
</div>

<div class="row mb-3">
  <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prenom</label>
  <div class="col-md-8 col-lg-9">
    <input name="prenom" type="text" class="form-control" id="prenom" value="<?= $resusltat["Prenoms"];?>" required>
  </div>
</div>

<div class="row mb-3">
  <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
  <div class="col-md-8 col-lg-9">
    <input name="email" type="email" class="form-control" id="email" value="<?= $resusltat["Mail"];?>" required>
  </div>
</div>

<div class="text-center">
  <button type="submit" name="submit" class="btn btn-primary">Mettre a jour</button>
</div>
    <?php 
        if (isset($_POST['submit'])) {
          $nom = $_POST['nom'];
          $prenom = $_POST['prenom'];
          $email= $_POST['email'];
          $stmt5 = $conn->prepare("UPDATE administrateur SET Nom = ?, Prenoms=?, Mail=?");
          $stmt5->execute([$nom,$prenom,$email]);
          echo"<script> window.location.href = 'profile.php';</script>;";
          echo"<h6 class='alert alert-success'>Le profil a été mis a jour</h6>";
        }
    ?>
</form>

            </div>
          </div>
          <div class="card">
  <div class="card-body pt-3">
  <form method="post">

<div class="row mb-3">
  <label for="ancienpas" class="col-md-4 col-lg-3 col-form-label">Ancien mot de passe</label>
  <div class="col-md-8 col-lg-9">
    <input name="ancienpas" type="password" class="form-control" id="ancienpas" value="" required>
  </div>
</div>

<div class="row mb-3">
  <label for="newpass" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
  <div class="col-md-8 col-lg-9">
    <input name="newpass" type="password" class="form-control" id="newpass" required>
  </div>
</div>

<div class="row mb-3">
  <label for="rnewpass" class="col-md-4 col-lg-3 col-form-label">Retaper le nouveau mot de passe</label>
  <div class="col-md-8 col-lg-9">
    <input name="rnewpass" type="password" class="form-control" id="rnewpass" required>
  </div>
</div>

<div class="text-center"> 
  <button type="passsubmit" name="passsubmit" class="btn btn-danger">Mettre a jour le mot de passe</button>
</div>
    <?php
        if (isset($_POST['passsubmit'])) {
          $ancienpas = $_POST['ancienpas'];
          $newpass = $_POST['newpass'];
          $rnewpass= $_POST['rnewpass'];
          $stmt6 = $conn->prepare("SELECT * FROM administrateur WHERE Id = '1'");
          $stmt6->execute();
          $resultatadm=$stmt6->fetch();
          if ($newpass == $rnewpass) {
            if (password_verify($ancienpas,$resultatadm['Mot_de_passe'])) {
              $stmt6 = $conn->prepare("UPDATE administrateur SET Mot_de_passe = ?");
              $hashnewpass=password_hash($newpass,PASSWORD_DEFAULT);
              $stmt6->execute([$hashnewpass]);
              echo"<h6 class='alert alert-success'>Mot de passe mis a jour</h6>";
            }
          }
          
        }
    ?>
</form>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Simplon Emargement</span></strong>. All Rights Reserved
    </div>
    <div class="credits">Designed by <a href="#">Ulrick</a></div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>