<?php
class CompetenceBLO {
  private $competenceDao;
  public $errorMessage;

  public function __construct() {
    $this->competenceDao = new CompetenceDAO();
  }

  public function GetAllCompetences() {
    return $this->competenceDao->GetAllCompetences();
  }

  public function GetCompetence($competenceID) {
        return $this->competenceDao->GetCompetence($competenceID);
    }


    public function AddCompetence($competence) {
      $insertedId = 0;
  
      $reference = $competence->getReference();
      $nom = $competence->getNom();
  
      // Check if Reference is empty
      if (empty($reference) && !empty($nom)) {
          $this->errorMessage = 'Competence Reference is required.';
      }
      // Check if Nom is empty
      elseif (!empty($reference) && empty($nom)) {
          $this->errorMessage = 'Competence Nom is required.';
      }
      // Check if both Reference and Nom are empty
      elseif (empty($reference) && empty($nom)) {
          $this->errorMessage = 'Competence Reference, Code, and Nom are required.';
      } else {
          $insertedId = (int)$this->competenceDao->AddCompetence($competence);
          header('Location: index.php');
      }
  
      return $insertedId;
  }
  

  public function UpdateCompetence(Competence $competence) {
      
    $reference = $competence->getReference();
    $nom = $competence->getNom();

    // Check if Reference is empty
    if (empty($reference) && !empty($nom)) {
        $this->errorMessage = 'Competence Reference is required.';
    }
    // Check if Nom is empty
    elseif (!empty($reference) && empty($nom)) {
        $this->errorMessage = 'Competence Nom is required.';
    }
    // Check if both Reference and Nom are empty
    elseif (empty($reference) && empty($nom)) {
        $this->errorMessage = 'Competence Reference, Code, and Nom are required.';
    } else {
        $affectedRows = (int) $this->competenceDao->UpdateCompetence($competence);
        header('Location: index.php');
        return $affectedRows;
    }


}

  public function DeleteCompetence($competenceId) {
    $affectedRows = 0;

    if ($competenceId > 0) {
      if ($this->IsIdExists($competenceId)) {
        $affectedRows = (int)$this->competenceDao->DeleteCompetence($competenceId);
      } else {
        $this->errorMessage = 'Record not found.';
      }
    } else {
      $this->errorMessage = 'Invalid Id.';
    }

    return $affectedRows;
  }



  public function IsIdExists($id) {
    return $this->competenceDao->IsIdExists($id);
  }


}
?>