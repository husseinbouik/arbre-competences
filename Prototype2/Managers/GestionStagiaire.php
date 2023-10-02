<?php

if (file_exists('./Entities/Stagiaire.php')) {
    include './Entities/Stagiaire.php';
} elseif (file_exists('../Entities/Stagiaire.php')) {
    include '../Entities/Stagiaire.php';
} else {
    // Neither file exists, so handle the error here
    echo "Error: Stagiaire.php not found in either directory.";
}

class GestionStagiaire
{

    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=arbre_competence', 'root', '');
    }

    public function AfficherTous()
    {
        $sql = 'SELECT Id, Nom, CNE FROM personne';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $stagiaires = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['Id']);
            $stagiaire->setNom($stagiaire_data['Nom']);
            $stagiaire->setCne($stagiaire_data['CNE']);

            $stagiaires[] = $stagiaire;
        }

        return $stagiaires;
    }

    public function SupprimerStagiaire($Id)
    {
        $sql = 'DELETE FROM personne WHERE Id = :Id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Id', $Id);
        $stmt->execute();
    }

    public function ModifierStagiaire($Id, $Nom, $CNE)
    {
        $sql = 'UPDATE personne SET Nom = :Nom, CNE = :CNE WHERE Id = :Id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Id', $Id);
        $stmt->bindValue(':Nom', $Nom);
        $stmt->bindValue(':CNE', $CNE);
        $stmt->execute();
    }
    public function AjouterStagiaire($Nom, $CNE)
    {
        $sql = 'INSERT INTO personne (Nom, CNE) VALUES (:Nom, :CNE)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':Nom', $Nom);
        $stmt->bindValue(':CNE', $CNE);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }
    public function GetStagiaireById($Id)
    {
      $sql = "SELECT * FROM personne WHERE Id = :Id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindValue(':Id', $Id);
      $stmt->execute();
    
      $stagiaire = null;
      if ($stmt->rowCount() > 0) {
        $stagiaire_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $stagiaire = new Stagiaire();
        $stagiaire->setId($stagiaire_data['Id']);
        $stagiaire->setNom($stagiaire_data['Nom']);
        $stagiaire->setCne($stagiaire_data['CNE']);
      }
    
      return $stagiaire;
    }
}

?>
