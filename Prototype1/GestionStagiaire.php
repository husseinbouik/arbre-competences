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
        $sql = 'SELECT id, nom, cne FROM personne';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $stagiaires = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $stagiaire_data) {
            $stagiaire = new Stagiaire();
            $stagiaire->setId($stagiaire_data['id']);
            $stagiaire->setNom($stagiaire_data['nom']);
            $stagiaire->setCne($stagiaire_data['cne']);

            $stagiaires[] = $stagiaire;
        }

        return $stagiaires;
    }
}

?>
