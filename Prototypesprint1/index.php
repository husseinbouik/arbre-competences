<?php
require_once('./Presentation/layout/loader.php');

// Trouver tous les employés depuis la base de données
$gestionStagiaire = new StagiaireDAO();
$stagiaires = $gestionStagiaire->AfficherTous();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wIdth=device-wIdth, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Gestion des stagiaires</title>
</head>
<body>
  <div class="table-responsive">
              <a href="add.php" class="btn btn-primary">ajouter</a>
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Cne</th>
          <th>Ville</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stagiaires as $stagiaire){ ?>
          <tr>
            <td><?= $stagiaire->getNom() ?></td>
            <td><?= $stagiaire->getCne() ?></td>
            <td><?= $stagiaire->getVille() ?></td>
            <td>
              <a href="delete.php?Id=<?php echo $stagiaire->getId(); ?>" class="btn btn-danger">Supprimer</a>
              <a href="edit_stagiaire.php?Id=<?php echo $stagiaire->getId(); ?>" class="btn btn-primary">Modifier</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>



  </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>
</html>
