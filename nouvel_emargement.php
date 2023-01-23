<?php require('assets/config/header.php');
?>
<!DOCTYPE html>
<html lang="Fr">

<body>
  <!-- ======= Sidebar ======= -->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Nouvel Enrergistrement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Nouvel Emargement</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card border-0 rounded-3 shadow-lg">
              <div class="card-body p-4">
                <div class="text-center">
                  <div class="h2 fw-light mb-4">FORMUALAIRE D'EMARGEMENT</div>
                </div>

                <form method="post">
                  <div class="form-floating mb-3">
                    <input class="form-control" name="nom" id="nom" type="text" placeholder="nom" required />
                    <label for="name">Nom</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control" name="prenom" id="prenom" type="text" placeholder="Prenom"  required />
                    <label for="prenom">Prenoms</label>
                  </div>

                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Genre" name="genre">
                      <option value="Veillez choisir un genre"selected>Veillez choisir un genre</option>
                      <option value="Masculin">Masculin</option>
                      <option value="Féminin">Feminin</option>
                    </select>
                    <label for="floatingSelect">Genre</label>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control" name="telephone" id="telephone" type="number" placeholder="Numero de télephone"  required />
                    <label for="telephone">Numero de télephone</label>
                  </div>

                  <!-- Email Input -->
                  <div class="form-floating mb-3">
                    <input class="form-control" name="email" id="email" type="email" placeholder="Adresse mail"  required />
                    <label for="email">Adresse mail</label>
                  </div>

                  <!-- Submit button -->
                  <div class="d-grid">
                    <button class="btn btn-outline-primary btn-lg" id="submitButton" type="submit">ENREGISTRER</button>
                  </div>
                  <div class="alert alert-primary mt-2" role="alert">
                      <?php 
                        if (!empty($_POST)) {
                          $nom = strtoupper($_POST['nom']);
                          $prenom = ucfirst($_POST['prenom']);
                          $genre = strtoupper($_POST['genre']);
                          $telephone = $_POST['telephone'];
                          $email = $_POST['email'];
                          if ($genre == "MASCULIN" OR $genre == "FEMININ") {
                            $stmt = $conn->prepare("INSERT INTO participant(Nom_participant,Prenom_participant,Genre_participant,Tel_participant,Mail_participant) VALUES (?,?,?,?,?)");
                            $stmt->execute([$nom,$prenom,$genre,$telephone,$email]);
                            echo"<h6 class='alert alert-success'>Inscription Reussie</h6>";
                          }else {
                            echo"<h6 class='alert alert-danger'>Veillez selectionner un genre</h6>";
                          }
                        }
                      ?>
                  </div>
                </form>
                <!-- End of contact form -->

              </div>
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>
