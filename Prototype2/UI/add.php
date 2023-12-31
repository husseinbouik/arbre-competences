<?php
include "../Managers/GestionStagiaire.php";
if (file_exists('./Entities/Stagiaire.php')) {
  include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
  
} else {
  // Neither file exists, so handle the error here
  echo "Error: Stagiaire.php not found in either directory.";
}

// Trouver tous les employés depuis la base de données 
$gestionStagiaire = new GestionStagiaire();

if (!empty($_POST)) {
    $stagiaire = new   Stagiaire();
    $stagiaire->SetNom($_POST['Nom']);
    $stagiaire->setCne($_POST['CNE']);
    $gestionStagiaire->AjouterStagiaire($stagiaire->getNom(), $stagiaire->getCne());

	// Redirection vers la page index.php
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
  <title>Ajouter Stagiaire</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Edit/Add Stagiaire</h1>

   

    <!-- Add Form -->
    <form Id="add-form" action="" method="post">
      <div class="mb-3">
        <label for="Nom" class="form-label">Nom</label>
        <input type="text" class="form-control" Id="Nom" name="Nom" required>
      </div>
      <div class="mb-3">
        <label for="CNE" class="form-label">CNE</label>
        <input type="text" class="form-control" Id="CNE" name="CNE" required>
      </div>
      <div class="mb-3 d-flex gap-3">
      <button type="submit" class="btn btn-primary">Submit</button>
        <a  class="btn btn-secondary" href = "../index.php">anuller</a>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
