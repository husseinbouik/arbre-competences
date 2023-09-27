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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stagiaires as $stagiaire){ ?>
          <tr>
            <td><?= $stagiaire->getNom() ?></td>
            <td><?= $stagiaire->getCne() ?></td>
            <td>
              <a href="./UI/delete.php?id=<?php echo $stagiaire->getId(); ?>" class="btn btn-danger">Supprimer</a>
              <a href="./UI/edit_stagiaire.php?id=<?php echo $stagiaire->getId(); ?>" class="btn btn-primary">Modifier</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
<canvas id="myChart"></canvas>

<script>
    const mysql = require('mysql');

const connection = new mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'my_database'
});

// Create the `chart_data` table if it doesn't exist
connection.query(`CREATE TABLE IF NOT EXISTS chart_data (
  label VARCHAR(255) NOT NULL,
  value INT NOT NULL
)`);

// Populate the `chart_data` table with data
const data = [
  { label: 'January', value: 100 },
  { label: 'February', value: 200 },
  { label: 'March', value: 300 },
  { label: 'April', value: 400 },
  { label: 'May', value: 500 },
  { label: 'June', value: 600 },
  { label: 'July', value: 700 }
];

data.forEach(row => {
  connection.query(`INSERT INTO chart_data (label, value) VALUES ('${row.label}', '${row.value}')`);
});

// Close the database connection
connection.end();

const ctx = document.getElementById('myChart').getContext('2d');

const data = {
  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
  datasets: [{
    label: '# of Votes',
    data: [12, 19, 3, 5, 2, 3],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(255, 159, 64, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(153, 102, 255)',
      'rgb(255, 159, 64)'
    ],
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

new Chart(ctx, config);
</script>

  </div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

</body>
</html>
