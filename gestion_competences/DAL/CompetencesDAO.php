<?php
require_once('../../DB/DatabaseConnection.php');
class CompetenceDAO {
  private $pdo = null;
  public function __construct() {
    $databaseConnection = new DatabaseConnection();
    $this->pdo = $databaseConnection->connect();
  }

  public function GetAllCompetences()
  {
      $sql = 'SELECT Id, Reference, Code, Nom, Description FROM Competences'; // Retrieve Description field
      $stmt = $this->pdo->query($sql);
      $competences_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $competences = [];

      foreach ($competences_data as $competence_data) {
          $competence = new Competence();
          $competence->setId($competence_data['Id']);
          $competence->setReference($competence_data['Reference']);
          $competence->setCode($competence_data['Code']);
          $competence->setNom($competence_data['Nom']);
          $competence->setDescription($competence_data['Description']); // Set the Description field
          $competences[] = $competence;
      }

      return $competences;
  }
  
  

  public function GetCompetenceById($competenceId) {
    if ($competenceId <= 0) {
      return false;
    }
  
    $sql = "SELECT * FROM competences WHERE Id = :competenceId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':competenceId', $competenceId, PDO::PARAM_INT);
    $stmt->execute();
  
    $aCompetence = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if ($aCompetence !== false) {
      $competenceObj = new Competence();
      $competenceObj->setId($aCompetence['Id']);
      $competenceObj->setReference($aCompetence['Reference']);
      $competenceObj->setCode($aCompetence['Code']);
      $competenceObj->setNom($aCompetence['Nom']);
      $competenceObj->setDescription($aCompetence['Description']);
  
      return $competenceObj;
    }
  
    return false;
  }
  

  public function AddCompetence($competence) {
    $sql = "INSERT INTO competences (`Reference`, `Code`, `Nom`, `Description`) VALUES (:reference, :code, :nom, :description)";
    $stmt = $this->pdo->prepare($sql);

    $reference = $competence->getReference();
    $code = $competence->getCode();
    $nom = $competence->getNom();
    $description = $competence->getDescription();

    $stmt->bindParam(':reference', $reference);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);

    $stmt->execute();

    $lastInsertId = $this->pdo->lastInsertId();

    return $lastInsertId;
  }

  public function UpdateCompetence($competence) {
    $sql = "UPDATE competences
        SET
          Reference = :reference,
          Code = :code,
          Nom = :nom,
          Description = :description
        WHERE Id = :id";

    $stmt = $this->pdo->prepare($sql);

    $id = $competence->getId();
    $reference = $competence->getReference();
    $code = $competence->getCode();
    $nom = $competence->getNom();
    $description = $competence->getDescription();

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':reference', $reference);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);

    $stmt->execute();

    return $stmt->rowCount();
  }

  public function DeleteCompetence($competenceId) {
    $sql = "DELETE FROM competences WHERE Id = :competenceId";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':competenceId', $competenceId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->rowCount();
  }

  public function IsIdExists($id) {
    $sql = "SELECT * FROM competences WHERE Id = $id";
    $raw_result = $this->pdo->prepare($sql);
    $raw_result->execute();

    if (!$raw_result->rowCount() > 0) {
      return false;
    } else {
      return true;
    }
  }
}
?>
