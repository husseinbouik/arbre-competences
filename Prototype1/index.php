<?php

include "GestionStagiaire.php";

// Trouver tous les employés depuis la base de données
$gestionStagiaire = new GestionStagiaire();
$stagiaires = $gestionStagiaire->AfficherTous();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Gestion des stagiaires</title>
</head>
<body>
  <div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Cne</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stagiaires as $stagiaire){ ?>
          <tr>
            <td><?= $stagiaire->getNom() ?></td>
            <td><?= $stagiaire->getCne() ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>
