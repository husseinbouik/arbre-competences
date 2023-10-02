<?php

include "./Managers/GestionStagiaire.php";

// Trouver tous les employés depuis la base de données
$gestionStagiaire = new GestionStagiaire();
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
              <a href="./UI/add.php" class="btn btn-primary">ajouter</a>
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
              <a href="./UI/delete.php?Id=<?php echo $stagiaire->getId(); ?>" class="btn btn-danger">Supprimer</a>
              <a href="./UI/edit_stagiaire.php?Id=<?php echo $stagiaire->getId(); ?>" class="btn btn-primary">Modifier</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
<?php 
  $con = new mysqli('localhost', 'root', '', 'arbre_competence');
  // $query = $con->query("
  //   SELECT v.Nom as city,
  //          COUNT(p.Id) as population
  //   FROM ville v
  //   LEFT JOIN personne p ON v.Id = p.Ville_Id
  //   GROUP BY v.Nom
  // ");
  $query = $con->query("
    SELECT v.Nom as city,
           COUNT(p.Id) as population
    FROM ville v
    INNER JOIN personne p ON v.Id = p.Ville_Id
    GROUP BY v.Nom
");


  $cities = [];
  $population = [];

  foreach ($query as $data) {
    $cities[] = $data['city'];
    $population[] = $data['population'];
  }
?>

<div style="width: 800px;">
  <canvas id="myChart"></canvas>
</div>

<script>
  const labels = <?php echo json_encode($cities) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'City Population',
      data: <?php echo json_encode($population) ?>,
      backgroundColor: 'rgba(75, 192, 192, 0.2)',
      borderColor: 'rgb(75, 192, 192)',
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  };

  // Make sure Chart.js is loaded before creating the chart
  document.addEventListener('DOMContentLoaded', function () {
    var myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
  });
</script>
  </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</body>
</html>
