<!DOCTYPE html>
<html lang="Fr">

<body>
<?php 
  require('assets/config/header.php');
?>
  
  <!-- ======= Sidebar ======= -->
  <script src="assets/js/jquery.min.js"></script>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Liste</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
          <li class="breadcrumb-item active">Liste des Enregistrement</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        

        <div class="col-lg-12" id="invoice">
            <div class="col-12">
              <div class="card top-selling overflow-auto">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-md-7">
                    <h5 class="card-title fw-bold">Tous les enregistrements</h5>
                    </div>
                  </div>
                  <?php
                    $stmt3 = $conn->query("SELECT * FROM participant ORDER BY Id_participant DESC");
                    echo'<table class="table table-bordered table-hover fs-6">
                      <thead>
                        <tr class="table-primary">
                          <th class="fs-6" scope="col">NUMERO</th>
                          <th class="fs-6" scope="col">NOM</th>
                          <th class="fs-6" scope="col">PRENOMS</th>
                          <th class="fs-6" scope="col">GENRE</th>
                          <th class="fs-6" scope="col">TELEPHONE</th>
                          <th class="fs-6" scope="col">EMAIL</th>
                          <th class="fs-6" scope="col">DATE</th>
                          <th class="fs-6" scope="col">HEURE D\'ARRIVEE</th>
                        </tr>
                      </thead>
                      <tbody>'?>
                      <?php   
                        $i=1; 
                        while($row=$stmt3->fetch()) {
                        echo"<tr>".
                        "<td>".$i++."</td>".
                        "<td class='fw-bold'>".$row["Nom_participant"]."</td>".
                        "<td class='fw-bold'>".$row["Prenom_participant"]."</td>".
                        "<td>".$row["Genre_participant"]."</td>".
                        "<td>".$row["Tel_participant"]."</td>".
                        "<td>".$row["Mail_participant"]."</td>".
                        "<td>".$row["Date_enregistrement"]."</td>".
                        "<td>".$row["Heure_enregistrement"]."</td>".
                        "</tr>";
                        }
                      echo "</tbody>
                    </table>";?>
                  <div class="card-body pb-0">
                    <div class="row">
                      <div class="col-md-3">
                        <a href="" class="btn-download"><h5 class="card-title fw-bold text-success">Exporter en PDF ? <i class="bi bi-file-earmark-arrow-down-fill"></i></h5></a>
                      </div>
                    <div>
                  <div>    
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
    filename: 'Tous les enregistrement.pdf',
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