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

  public function GetCompetence($competenceId) {
    return $this->competenceDao->GetCompetence($competenceId);
  }

  public function AddCompetence($competence) {
    $insertedId = 0;

    if ($competence->getReference() == '' || $competence->getCode() == '' || $competence->getNom() == '') {
      $this->errorMessage = 'Competence Reference, Code and Nom is required.';
      return $insertedId;
    }

    if ($this->IsValidCompetence($competence)) {
      $insertedId = (int)$this->competenceDao->AddCompetence($competence);
    }

    return $insertedId;
  }

  public function UpdateCompetence($competence) {
    $affectedRows = 0;

    if ($competence->getReference() == '' || $competence->getCode() == '' || $competence->getNom() == '') {
      $this->errorMessage = 'Competence Reference, Code and Nom is required.';
      return $affectedRows;
    }

    if ($this->IsValidCompetence($competence)) {
      $affectedRows = (int)$this->competenceDao->UpdateCompetence($competence);
    }

    return $affectedRows;
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

  public function IsValidCompetence($competence) {
    if ($this->IsReferenceExists($competence->getReference(), $competence->getId())) {
      $this->errorMessage = 'Competence Reference ' . $competence->getReference() . ' already exists. Try a different one.';
      return false;
    } else {
      return true;
    }
  }

  public function IsIdExists($id) {
    return $this->competenceDao->IsIdExists($id);
  }

  public function IsReferenceExists($reference, $id) {
    return $this->competenceDao->IsReferenceExists($reference, $id);
  }
}
?>
