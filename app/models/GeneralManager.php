<?php
abstract class GeneralManager {

  // Objet PDO d'accès à la BD
  private $db;
   // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
  private function getBdd() {
    if ($this->db == null) {
      // Création de la connexion
      try {
        $this->db = new PDO('mysql:host=localhost;dbname=alger794579;charset=utf8',
      'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        
      } catch (Exception $e) {
        
      }

    }
    return $this->db;
  }

  // Exécute une requête SQL éventuellement paramétrée
  public function executerRequete($sql, $params = null) {
    if ($params == null) {
      try {
        $resultat = $this->getBdd()->query($sql);    // exécution directe     
      } catch (Exception $e) {
        
      }
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);
        // requête préparée
      try {
        $resultat->execute($params);
        
      } catch (Exception $e) {
        
      }
    }
    return $resultat;
  }

}
