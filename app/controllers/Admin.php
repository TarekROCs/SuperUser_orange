<?php
session_start() ; 
Class Admin extends Controller 
{
	private $adminManager ; 
	public function index () 	
	{		
		if (isset($_SESSION['id'] ))
        {
        	if(isset($_POST['choix'])){
                session_destroy();
            } 
            else
            {
            	$this->adminManager = $this->model('AdministrateurManager') ; 
				$q = $this->adminManager->executerRequete("SELECT * FROM  `partenaires`");
		       	if (isset($_POST['tabValider'])){       		  	
		       		  	$reqette="";
		       		  	try {
		       		  		$tabV = $_POST['tabValider'];     
		       		  		for ($i=0; $i <count($tabV); $i++){
		       		  			$reqette = "  UPDATE `partenaires` SET `Validation_compte`= '1' WHERE `ID_Partenaire`=".$tabV[$i];
		       		  			$this->adminManager = $this->model('AdministrateurManager');
		       		  			$q = $this->adminManager->executerRequete($reqette);
		       		  		}       		  		
		       		  		echo "Success";
		       		  	} 
		       		  	catch (Exception $e) {
		       		  		echo('Error');
		       		  	}
			    }
			    else{
			    	$this->view('home/Admin',['name'=>$_SESSION['nom'],'lastname'=>$_SESSION['prenom'],'sector'=>$_SESSION['secteur'],'nbp'=>$_SESSION['nbt'], 'table'=>$q]) ;
					echo "1";
			    }

            }

		}
		else
        {
            header ('location:/SuperUser_orange/public/home/index');
        }
	}
	    
	function Charger($type){
		$nomcln = '';
		$chaine ='';
		$req='';
		switch ($type) {
			case 'admin':
				$nomcln = "nom_admin , prenom_admin";
				$chaine = '<select onclick="recharger();" style="margin-left: 10px;height: 40px;width: 201px" name="admin" id = "admin" >
				<option value="">Tout</option>';
				break;
			case 'secteur':
				$type = 'activites';
				$nomcln = 'Nom_Activite_FR';
				$chaine = '<select onclick="recharger();" style="margin-left: 80px;height: 40px;width: 201px"  name = "secteur" id = "secteur">
				<option value="">Tout</option>';
				break;
		}
		$req = "SELECT DISTINCT ".$nomcln." FROM ".$type;
        $this->adminManager = $this->model('AdministrateurManager') ; 
		$q = $this->adminManager->executerRequete($req);
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
			if ($type == 'admin'){
				$chaine.= '<option value = "'.$donnees['nom_admin'].' '.$donnees['prenom_admin'].'"" >'.$donnees['nom_admin'].' '.$donnees['prenom_admin'].' </option>';
			}
			else{
				$chaine.= '<option value = "'.$donnees[$nomcln]. '" >'.$donnees[$nomcln].' </option>';
			}
		}
		$chaine.= '</select>';		
		return  $chaine;
	}
}

