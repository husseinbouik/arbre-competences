<?php

include __DIR__ . '/Stagiaire.php';

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
}

?>
