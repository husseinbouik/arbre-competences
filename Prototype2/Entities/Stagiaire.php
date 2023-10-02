<?php

class Stagiaire{

    private $Id;
    private $Nom;
    private $CNE;
   




    public function getId() {
        return $this->Id;
    }
    public function setId($ID) {
        $this->Id = $ID;
    }

    public function getNom() {
        return $this->Nom;
    }
    public function setNom($NOM) {
        $this->Nom = $NOM;
    }

    public function getCne() {
        return $this->CNE;
    }
    public function setCne($CNE) {
        $this->CNE = $CNE;
    }
}
     
?>