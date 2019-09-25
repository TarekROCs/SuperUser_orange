<?php
require_once '../app/models/GeneralManager.php';
require_once '../app/beans/Administrateur.php';
class AdministrateurManager extends GeneralManager 
{
      public function getAdmin($mail,$password)
      {
          $sql = 'SELECT * FROM admin WHERE email_admin = :mail and password_admin = :password';
            $q = $this->executerRequete($sql,array('mail' => $mail, 'password' => $password));
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            if($donnees != null ) 
            {
              $data['id'] = $donnees['id_admin']; 
              $data['name'] = $donnees['nom_admin'];
              $data['lastName'] = $donnees['prenom_admin'];
              $data['type'] = $donnees['type_admin'];
              if(strstr($mail, "@") )
              {
                preg_match("#\@.*#", $mail,$tab);
                $chaine = $tab[0];
                $chaine = substr($chaine,1,strlen($chaine)-1);
                $data['sector'] = $chaine; 

              }
              else 
              {
                $data['sector'] = 'admin' ; 
              }
              $data['email'] = $donnees['email_admin'];
              
              $admin =  new Administrateur($data);
              return $admin ; 
            }
            else return null;
      }
      public function getNbPartenaireParSecteur($nom,$prenom)
      {
          $nbt = [] ; 
          
          $sql = 'SELECT COUNT(*) as nbp FROM partenaires WHERE user_insertion = :user and id_activite = 4  ';
          $q = $this->executerRequete($sql,array('user' => $prenom.' '.$nom ));
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbt[0] = $nb['nbp']   ; 
          
          $sql = 'SELECT COUNT(*) as nbpa FROM partenaires WHERE user_insertion = :user and id_activite = 1  ';
          $q = $this->executerRequete($sql,array('user' => $prenom.' '.$nom ));
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbt[1] = $nb['nbpa']   ;
          //construction
          $sql = 'SELECT COUNT(*) as nbpc FROM partenaires WHERE user_insertion = :user and id_activite = 3  ';
          $q = $this->executerRequete($sql,array('user' => $prenom.' '.$nom ));
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbt[2] = $nb['nbpc']   ;
           
          $sql = 'SELECT COUNT(*) as nbpit FROM partenaires WHERE user_insertion = :user and id_activite = 2  ';
          $q = $this->executerRequete($sql,array('user' => $prenom.' '.$nom ));
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbt[3] = $nb['nbpit']   ;  
          return $nbt ;    
      }
      public function getNombreTotalPartenairesParSecteur()
      {
          $nbp = [] ; 
          //industrie
          $sql = 'SELECT COUNT(*) as nbp FROM partenaires WHERE id_activite = 1  ';
          $q = $this->executerRequete($sql);
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbp[0] = $nb['nbp']   ; 
          //agriculture
          $sql = 'SELECT COUNT(*) as nbpa FROM partenaires WHERE id_activite = 2  ';
          $q = $this->executerRequete($sql);
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbp[1] = $nb['nbpa']   ;
          //construction
          $sql = 'SELECT COUNT(*) as nbpc FROM partenaires WHERE id_activite = 3  ';
          $q = $this->executerRequete($sql);
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbp[2] = $nb['nbpc']   ;
          //itsolution 
          $sql = 'SELECT COUNT(*) as nbpit FROM partenaires WHERE id_activite = 4  ';
          $q = $this->executerRequete($sql);
          $nb = $q->fetch(PDO::FETCH_ASSOC);
          $nbp[3] = $nb['nbpit']   ;  
          return $nbp ; 


      }
      public function getPaysMax()
      {
            $sql1 = ('select nom from (select Nom_Pays_FR as nom, count(*) as nb from (SELECT * FROM partenaires as pr JOIN pays as py on pr.ID_Pay_Societe = py.ID_Pays) as q1 group by nom order by nb desc limit 12) as q2');
            $q = $this->executerRequete($sql1);
            $pays =[];
            while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
              $pays[] = $donnees['nom'];
            }
            return $pays;
      }
      public function getNbPartenaires($id)
      {
          $sql1 = ('(select id from (select ID_Pay_Societe as id, count(*) as nb from (SELECT * FROM partenaires as pr JOIN pays as py on pr.ID_Pay_Societe = py.ID_Pays) as q1 group by id order by nb desc limit 12) as q2) as q3');
          $sql2 = ('(SELECT ID_Pay_Societe , count(*) as nb FROM partenaires WHERE id_activite= :id group by ID_Pay_Societe) as q4') ;
          $sql3 = "(select id , nb from ".$sql1."  join ".$sql2." on id = ID_Pay_Societe) as q5 " ;

          $sql4 = "select q3.id , nb from ". $sql1 ."  join ". $sql3. " on q3.id = q5.id " ; 




          $q = $this->executerRequete($sql4,array('id' => $id ));
          $tpp= [] ; 

          
          while($donnees = $q->fetch(PDO::FETCH_ASSOC)){
              $tpp[] = $donnees['nb'];
          }
          return $tpp ;
      }
      /* réservé ;) 
      public function class ( $class )
        {
        require_once '../app/beans/'.$class.'.php' ;
      }
      */
}