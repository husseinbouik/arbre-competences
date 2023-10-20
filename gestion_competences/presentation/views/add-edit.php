<?php
require_once('../layout/loader.php');
  // Create a new COMPE$competenceBLO object
  $competenceBLO = new CompetenceBLO();
  $competence = new Competence();
  if (isset($_GET['competenceID'])) {
    $competence = $competenceBLO->GetCompetence($_GET['competenceID']); // Load the competence by ID
  } 
// $id = $id ?? null;
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['competenceSubmitButton'])) {
      $id = $_POST['Id'];
      $reference = $_POST['Reference'];
      $code = $_POST['Code'];
      $nom = $_POST['Nom'];
      $description = $_POST['Description'];
      if (!empty($id)) {
          $competence = $competenceBLO->GetCompetence($id); // Load the competence by ID
  
          // Check if the competence exists
          if ($competence) {
              $competence->setId($id);
              $competence->setReference($reference);
              $competence->setCode($code);
              $competence->setNom($nom);
              $competence->setDescription($description);
               try {
                 $competenceBLO->UpdateCompetence($competence);
                 header('location:index.php');
                //  $errorMessage = $competenceBLO->errorMessage;
                } catch (Exception $e) {
                  $errorMessage = $e->getMessage();
               }
          } 
      
    } else {
              // Otherwise, we are adding a new Competence
              $competence = new Competence(); // Instantiate the Competence object
      $competence->setReference($reference);
      $competence->setCode($code);
      $competence->setNom($nom);
      $competence->setDescription($description);
        try {
          $competenceBLO->AddCompetence($competence);
          header('location:index.php');
         //  $errorMessage = $competenceBLO->errorMessage;
         } catch (Exception $e) {
           $errorMessage = $e->getMessage();
        }

    }
      
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Simple Tables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <script src="https://cdn.tiny.cloud/1/d2nq8cur7uv9c3ovyevwee5l5e5k2ym6hodsnpuuy1hyy1yf/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="../assets/img/WWW.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">Solicoders</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add your sidebar menu items here -->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-users"></i> <!-- Change the class to "fas fa-users" -->
                <p>Gestion des compétences</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i> <!-- Change the class to "fas fa-chart-line" -->
                <p>Gestions des niveaux</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <!-- Change the class to "fas fa-chalkboard-teacher" -->
                <p>Gestions des formateurs</p>
              </a>
            </li>

          </ul>
        </nav>
      </div>
    </aside>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?php if (isset($_GET['competenceID'])) {
                  echo 'Modifier' ;
                }else {
                  echo 'Ajouter' ;
                                  } ?> Competence</h3>
        </div>
        <div class="card-body  " >
        <?php if(!empty($errorMessage)):?>
    <div class="alert alert-danger text-center"><?php echo $errorMessage;?></div>
<?php endif;?>
          <form id="edit-form" action="add-edit.php?competenceID=<?php if (isset($_GET['competenceID'])) {
                  echo $competence->getId();
                } ?>" method="POST">
            <!-- Reference -->
            <div class="form-group">
              <input type="hIdden" name="Id" Id="Id"
                value="<?php if (isset($_GET['competenceID'])) {
                  echo $competence->getId();
                } ?>">
              <label for="reference">Reference<span class="text-red">*</span></label>
              <input type="text" class="form-control" id="reference" name="Reference" placeholder="Enter reference"
                value="<?php if (isset($_GET['competenceID'])) {
                  echo $competence->getReference();
                } ?>">
            </div>

            <!-- Code -->
            <div class="form-group">
              <label for="code">Code</label>
              <input type="text" class="form-control" id="code" name="Code" placeholder="Enter code"
                value="<?php if (isset($_GET['competenceID'])) {
                  echo $competence->getCode();
                } ?>">
            </div>

            <!-- Nom -->
            <div class="form-group">
              <label for="nom">Nom<span class="text-red">*</span></label>
              <input type="text" class="form-control" id="nom" name="Nom" placeholder="Enter nom"
                value="<?php if (isset($_GET['competenceID'])) {
                  echo $competence->getNom();
                } ?>">
            </div>

            <!-- Description -->
            <div class="form-group">
              <label for="description">Description</label>
              <textarea id="description" name="Description"
                value=""><?php if (isset($_GET['competenceID'])) {
                  echo $competence->getDescription();
                } ?></textarea>
            </div>


            <!-- Submit button -->
            <input type="submit" name="competenceSubmitButton" id="competenceSubmitButton" value="<?php if (isset($_GET['competenceID'])) {
                  echo 'Modifier' ;
                }else {
                  echo 'Ajouter' ;
                                  } ?>  Competence"
              class="btn btn-primary" />
          </form>
        </div>
      </div>

      <!-- Footer (Optional) -->
      <footer class="main-footer">
        <!-- Add your footer content here -->
      </footer>
    </div>
    <script>
      tinymce.init({
        selector: 'textarea#description',
        plugins: 'link image code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
        menubar: false,
      });
    </script>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>


    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/js/demo.js"></script>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../assets/plugins/moment/moment.min.js"></script>
    <script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/js/demo.js"></script>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../assets/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../assets/js/pages/dashboard.js"></script>


</body>

</html>