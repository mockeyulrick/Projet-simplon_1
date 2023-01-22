<!DOCTYPE html>
<html lang="Fr">

<body>
<?php 
  require('assets/config/header.php');
  setlocale(LC_ALL, 'fr_CI.UTF8', 'fr_CI','fr','fr','fra','fr_CI@euro');
?>

  <script src="assets/js/jquery.min.js"></script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau De Bord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard" >
      <div class="row" id="invoice">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h2 class="card-title fw-bold text-danger">Presents Aujourd'hui</h2>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people-fill text-danger"></i>
                    </div>
                    <div class="ps-5">
                      <?php 
                        $stmtsum = $conn->query("SELECT COUNT(*) FROM participant WHERE Date_enregistrement = CURDATE()");
                        $sum=$stmtsum->fetchColumn();
                      ?>
                      <h6 class="text-danger"> <?= $sum; ?> </h6>
                      </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title bold fw-bold">Hommes</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-person-fill"></i>
                    </div>
                    <div class="ps-5">
                      <?php 
                          $stmtsumH = $conn->query("SELECT COUNT(*) FROM participant WHERE Date_enregistrement = CURDATE() && Genre_participant = 'Masculin'");
                          $sumH=$stmtsumH->fetchColumn();
                        ?>
                      <h6><?= $sumH; ?></h6>
                      </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title fw-bold">Femmes</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-file-person"></i>
                    </div>
                    <div class="ps-5">
                    <?php 
                          $stmtsumF = $conn->query("SELECT COUNT(*) FROM participant WHERE Date_enregistrement = CURDATE() && Genre_participant = 'Feminin'");
                          $sumF=$stmtsumF->fetchColumn();
                        ?>
                      <h6><?= $sumF; ?></h6>
                      </div>
                  </div>
                </div>

              </div>
            </div>
            
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-md-7">
                    <h5 class="card-title fw-bold">Enregistrer Ce jour </h5>
                    </div>
                    <div class="col-md-5">
                    <h5 class="card-title fw-bold text-danger"> <?=ucfirst(strftime("%A %d %B %Y")); ?></h5>
                  </div>
                  </div>
                  <?php
                    $stmt2 = $conn->query("SELECT * FROM participant WHERE Date_enregistrement = CURDATE() ORDER BY Id_participant DESC");
                    echo'<table class="table table-bordered table-hover fs-6">
                      <thead>
                        <tr class="table-primary">
                          <th class="fs-6" scope="col">NUMERO</th>
                          <th class="fs-6" scope="col">NOM</th>
                          <th class="fs-6" scope="col">PRENOMS</th>
                          <th class="fs-6" scope="col">GENRE</th>
                          <th class="fs-6" scope="col">TELEPHONE</th>
                          <th class="fs-6" scope="col">EMAIL</th>
                          <th class="fs-6" scope="col">HEURE D\'ARRIVEE</th>
                        </tr>
                      </thead>
                      <tbody>'?>
                      <?php   
                        $i=1; 
                        while($row=$stmt2->fetch()) {
                        echo"<tr>".
                        "<td>".$i++."</td>".
                        "<td class='fw-bold'>".$row["Nom_participant"]."</td>".
                        "<td class='fw-bold'>".$row["Prenom_participant"]."</td>".
                        "<td>".$row["Genre_participant"]."</td>".
                        "<td>".$row["Tel_participant"]."</td>".
                        "<td>".$row["Mail_participant"]."</td>".
                        "<td>".$row["Heure_enregistrement"]."</td>".
                        "</tr>";
                        }
                      echo "</tbody>
                    </table>";?>
                  <div class="card-body pb-0">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="javascript:void(0)" class="btn-download"><h5 class="card-title fw-bold text-success">Exporter en PDF ? <i class="bi bi-file-earmark-arrow-down-fill"></i></h5></a>
                      </div>
                    <div>
                  <div>    
                </div>

              </div>
            </div>

          </div>
        </div><!-- End Left side columns -->
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
  <script src="assets/js/jspdf.debug.js"></script>
  <script src="assets/js/html2canvas.min.js"></script>
  <script src="assets/js/html2pdf.min.js"></script>
<script>
  var date = new Date();
  var jour  = date.getDate()+1;
  var mois  = date.getMonth()+1;
  var annee  = date.getFullYear();
  const options = {
    margin: 0.5,
    filename: 'Liste de presence du ' +jour+ '-' + mois+ '-' +annee+'.pdf',
    image: { 
      type: 'jpeg', 
      quality: 1
    },
    html2canvas: { 
      scale: 1 
    },
    jsPDF: { 
      unit: 'in', 
      format: 'letter', 
      orientation: 'landscape' 
    }
  }

  $('.btn-download').click(function(e){
    e.preventDefault();
    const element = document.getElementById('invoice');
    html2pdf().from(element).set(options).save();
  });


  function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML;
  var originalContents = document.body.innerHTML;

  document.body.innerHTML = printContents;

  window.print();

  document.body.innerHTML = originalContents;
  }
</script>
</body>

</html>