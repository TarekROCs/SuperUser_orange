<?php
session_start() ; 
Class Extractor extends Controller 
{
	private $adminManager ; 	
	public function index () 	
	{

		if (isset($_SESSION['id'] ))
        {
        	$_POST['name'] =  $_SESSION['nom'];
		    $_POST['lastname'] = $_SESSION['prenom'];
        	if(isset($_POST['choix2'])){
                session_destroy();
            }
            else 
            {
	        	
	        	if (isset($_POST['choix'])) {
	        		if($_POST['choix'] == '1')
					{
						$_POST['texte'] = str_replace("'", "''",$_POST['texte']);

						$email = $this->findMail($_POST['texte']);
						$siteweb = $this->findSiteWeb($_POST['texte']); 
						$telephone = $this->findTelephone($_POST['texte']);
						$codepostal = $this->findCPostale($_POST['texte']);
						$ville = $this->findVille($this->findAdress($_POST['texte']));
						$adress = $this->findAdress($_POST['texte']);
						$fax = $this->findFax($_POST['texte']);
						if ((!($pays = $this->findPays($this->findTelephone($_POST['texte']))))) {
							$pays = $this->findPays($this->findFax($_POST['texte']));
						}
						$description = $this->findDescription($_POST['texte']);
						$tab = (array('nom' =>$_POST['nom'],'siteweb' =>$siteweb,'email'=>$email, 'telephone' => $telephone, 'codepostal' => $codepostal, 'ville'=>$ville, 'adress'=>$adress, 'fax' =>$fax, 'description' => $description, 'pays'=>$pays));
						$reponse = json_encode($tab);
					}
					elseif($_POST['choix'] == '2')
					{	
						$reponse = $this->InsererTab($_POST);			
					}
					elseif($_POST['choix'] == '3'){ 	              		             	
		             	$cpt = count($_POST['tabPartenaire']);
		             	for ($i=0; $i < count($_POST['tabPartenaire']) ; $i++){ 
		             		$tab = $_POST['tabPartenaire'][$i]; 
		             		$cpt -= $this->Inserer($tab);
		             	}
		             	$reponse = $cpt;
		       		}
		       		elseif ($_POST['choix']=='4'){	       			
		       			try {
		       					$activité = array('Industrie','Agriculture','Construction','IT Solution');
		       			      	$requette = "INSERT INTO `salon`(`titre_salon`, `lien_salon`, `date_salon`, `date_fin_salon`, `etat_salon`, `id_activite`, `adresse_salon`) VALUES ('".$_POST['NomS']."', '".$_POST['LienS']."', '".$_POST['dateD']."', '".$_POST['dateF']."',true, ".(array_search($_SESSION['secteur'], $activité)+1).", '".$_POST['AdressS']."')";
					       			$this->adminManager = $this->model('AdministrateurManager') ;        				
				       				$q = $this->adminManager->executerRequete($requette);
				       				$reponse = $requette;
		       			    } catch (Exception $e) {
		       			      	$reponse = 0;
		       			    }    
		       		}
		       		echo $reponse;   		
	        	}
				else{
					$this->view('home/extractor',['name'=>$_SESSION['nom'],'lastname'=>$_SESSION['prenom'],'sector'=>$_SESSION['secteur'],'nbp'=>$_SESSION['nbt']]) ;
				}			

            }

    		
        }
        else
        {
           header ('location:/SuperUser_orange/public/home/index');
        }
	}

	function Inserer($tab){

		$this->adminManager = $this->model('AdministrateurManager') ; 
		$req1 = "SELECT * FROM  `partenaires` WHERE `Email_Societe` LIKE '".$tab['email']."'";
		$q = $this->adminManager->executerRequete($req1);      
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
    	if(isset($donnees['Nom_Societe'])){        	
        	return 1;
        }      
        else{
	        $this->adminManager = $this->model('AdministrateurManager') ; 
			$q = $this->adminManager->executerRequete("SELECT * FROM  `activites` WHERE  `Nom_Activite_FR` LIKE ".$_SESSION['secteur']."");
	        $donnees = $q->fetch(PDO::FETCH_ASSOC);
	        $id_activite = $donnees['ID_Activite'];  			          
	        $q = $this->adminManager->executerRequete("SELECT * FROM  `pays` WHERE  `Nom_Pays_FR` LIKE  '".$tab['pays']."'");
	        $donnees2= $q->fetch(PDO::FETCH_ASSOC);
	        $id_pays = $donnees2['ID_Pays'];
	        $req = "INSERT INTO `partenaires` (`Nom_Partenaire`,`Prenom_Partenaire`, `Mobile_Partenaire`, `Email_Partenaire`,`Tel_partenaire`, `Email_login`, `Pwd`, `Validation_compte`, `Nb_tentatif_connexion`,`Notif_nouveau_compte`, `Nom_Societe`, `Tel_Societe`, `FAX_Societe`, `Email_Societe`, `Carte_visite`, `ID_Pay_Societe`, `Ville_Societe`, `Code_Postal_Societe`, `Adresse_Societe`, `Date_Adhesion_Societe`, `Image_Societe`,`Description_Societe`, `Complement_ADR`, `fonction_Partenaire`, `id_activite`, `Confirmation_mail`, `nb_vues`, `Nb_vues_recherche`,`visite_partenaire`,`user_insertion`,  `accepte_mail`, `id_etat_compte`, `id_etat_inscription`,	`id_categorie_Societe`) VALUES ( '','','".$tab['telephone']."','".$tab['email']."', NULL,'','Aroua2017', 0, 0, 0, '".$tab['nom']."','".$tab['telephone']."','".$tab['fax']."','".$tab['email']."', NULL,".$id_pays.", '".$tab['ville']."' ,'".$tab['codepostal']."','" .$tab['adress']."','".(new \DateTime())->format('Y-m-d H:i:s')."', '','".$tab['description']."','' , '' , ".$id_activite.", 1,0 , 0,'".(new \DateTime())->format('Y-m-d H:i:s')."' ,'".$_POST['name']." ".$_POST['lastname']."', 1 , 1, 1, NULL)";
	        $q = $this->adminManager->executerRequete($req);
	        return 0;
        }
	}

	function findMail($text){
		if (preg_match('#\w([-_.]?\w)*@\w([-_.]?\w)*\.([a-z]{2,4})#',$text,$t, PREG_OFFSET_CAPTURE)) return $t[0][0];
		else return "";
	}

	function findSiteWeb($txt){
	if(preg_match('#(http://)?(www.)+(\w*[-_\.]*)*\.[a-z]{2,4}#',$txt,$t, PREG_OFFSET_CAPTURE)) 
		return $t[0][0];	
	else return "";
	}

	function findAdress($text){
		if(preg_match('#(.)*\n[A-Z0-9]*\-(.)*#',$text,$t, PREG_OFFSET_CAPTURE)) return trim($t[0][0]);
		else return "";

	}

	function Charger($type){
		$req='';
		$nomcln='Nom_Pays_FR';
		$chaine ='<select onchange="testIns();" style="width : 189px;margin-bottom:2px;height:28px;" name = "pays" id = "pays" >
		<option value = ""></option>';
		$req = "SELECT ".$nomcln." FROM ".$type;
        $this->adminManager = $this->model('AdministrateurManager') ; 
		$q = $this->adminManager->executerRequete($req);
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			$chaine.= 	'<option value = "'.$donnees[$nomcln]. '" >'.$donnees[$nomcln].' </option>';
		}
		$chaine.= '</select>';
		return  $chaine;
	}


	function findCPostale($text){
		if(preg_match('#\d{4,6}#',$text,$t)) return trim($t[0]);
		else return "";
	}

	function findVille($text){
		if(preg_match('#(\n.*)$#',$text,$t)){
			$var = trim($t[0]);
			$inter = substr($var,0,5);
			if (preg_match("#[A-Z]{1,3}[\-][0-9]#", $inter)) {
				preg_match("# .*#", $var,$t);
			}
			else {
				preg_match("#[a-zA-Z0-9\,\-]*[^0-9]{4,}#", $var, $t);
				$var = $t[0];
				preg_match("#\-.*#",$var, $t);
				$var = $t[0];
				$var = str_replace("-", "",$var);
				return $var;
			}
			return $t[0];
		}
		else return "";
	}

	function findTelephone($text){
		if (preg_match("#Tel.:[ ]?\+[0-9 ]+#", $text,$t)) {
			return trim(str_replace("Tel.:", "", $t[0]));
		}
		else return "";
	}

	function findFax($text){
		if (preg_match("#Fax:[ ]?\+[0-9 ]+#", $text,$t)) {
			return trim(str_replace("Fax:", "", $t[0]));
		}
		else return "";
	}

	function findDescription($text){
		$var = $this->findMail($text);
		if (preg_match('#\w([-_.]?\w)*@\w([-_.]?\w)*\.[a-z]{2,4}(\s*.*\s*)*#',$text,$t, PREG_OFFSET_CAPTURE)){			
			$var = str_replace($var,"",trim($t[0][0]));			
			return $var;
		}
		else return "";
	}

	function findPays($text){
			
		if(preg_match("#\+[0-9]*#",$text,$t)){
			$code= str_replace("+", "", $t[0]);
			$fic = fopen('../app/includes/code.Properties','r');
			$contenu = file_get_contents('../app/includes/code.Properties');
			$nbligne = substr_count($contenu, "\n");
			for ($i=0; $i<= $nbligne; $i++) {
					 $chaine = trim(fgets($fic));
					 $pays = substr($chaine, 0, strlen($code));
					 if (!strcmp($code, $pays)){		 	
					 	preg_match("#\=[ ]?.*#", $chaine,$t);
					 	$pays = $t[0];
					 	$pays = trim(str_replace("=", "", $pays));
                        
				        $this->adminManager = $this->model('AdministrateurManager') ; 
						$q = $this->adminManager->executerRequete("SELECT * FROM  `pays` WHERE  `ID_Pays` =".$pays);
						$donnees = $q->fetch(PDO::FETCH_ASSOC);
						$pays = $donnees['Nom_Pays_FR'];
					 	break;
					 }
				}
			return $pays;
			fclose($fic);
		}
		else return "";
	}

	function InsererTab($tab){
	    $chaine = '<tr> <td>'.$tab['nom'].'</td>';
	    $chaine .= '<td>'.$tab['adress'].'</td>'; 
	    $chaine .= '<td>'.$tab['telephone'].'</td>'; 
	    $chaine .= '<td>'.$tab['fax'].'</td>'; 
	    $chaine .= '<td>'.$tab['pays'].'</td>'; 
	    $chaine .= '<td>'.$tab['ville'].'</td>'; 
	    $chaine .= '<td>'.$tab['siteweb'].'</td>'; 
	    $chaine .= '<td>'.$tab['email'].'</td>';
	    $chaine .= '<td><input type="checkbox" id="supp" name="supp" style="display: block;margin :auto;"></td></tr>';
	    return $chaine;
	}

	function ChargerSalon(){
	$activité = array('Industrie','Agriculture','Construction','IT Solution');
	$chaine = '<option value = ""></option>';
	$this->adminManager = $this->model('AdministrateurManager') ; 
	$tableS = $this->adminManager->executerRequete("SELECT * FROM salon" );	

	while ($donnees = $tableS->fetch(PDO::FETCH_ASSOC)) {
		if ($_SESSION['secteur'] == $activité[intval($donnees["id_activite"])-1]){	
			$chaine .= '<option value = "'.$donnees["titre_salon"]. '" >'.$donnees["titre_salon"].' </option>';
		}
	}
	$chaine .= '</select>';
	return $chaine;
	}
}