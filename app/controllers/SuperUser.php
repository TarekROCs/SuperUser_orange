<?php
session_start() ; 
Class SuperUser extends Controller 
{
	private $adminManager ; 
	public function index(){
		

		if (isset($_SESSION['id'])){
			if(isset($_POST['choix'])){
                session_destroy();
            }
            else
            {
            	$requete = "";
				$this->adminManager = $this->model('AdministrateurManager') ; 
				$q = $this->adminManager->executerRequete("SELECT  `nom_admin` ,  `prenom_admin` ,  `ID_Activite` ,  `Nom_Activite_FR` ,  `email_admin` ,  `password_admin` , `date_creation_admin` , `type_admin` FROM admin s LEFT JOIN activites a ON a.ID_Activite = s.droit_admin");

		       	if(isset($_POST['Op'])){
					$tabResultat = $_POST['tabResultat'];			
					switch ($_POST['Op']) {
						case 'Ajout':
							$motdepasse = md5($tabResultat['PWA']);
							$requete = "INSERT INTO `admin` (`nom_admin`, `prenom_admin`, `email_admin`, `password_admin`,`date_creation_admin`, `visite_admin`, `ip_admin`, `photo_admin`,`droit_admin`,`type_admin`,`chemin_repertoire`, `etat_admin`)VALUES ('".$tabResultat['nomA']."','".$tabResultat['prenomA']."','".$tabResultat['emailA']."','".$motdepasse."','".$tabResultat['dateCreat']."','0000-00-00 00:00:00','','',".$tabResultat['idAct'].",'".$tabResultat['Admin']."','', 1)";
								$this->adminManager->executerRequete($requete);
								echo $requete;								
							break;
						case 'Modef':							
							$requete = "SELECT * FROM `admin` WHERE  `email_admin` LIKE  '".$_POST['emailToSearch']."'";
							$d =$this->adminManager->executerRequete($requete);
							$do = $d->fetch(PDO::FETCH_ASSOC);
							if ($do['password_admin'] != $tabResultat['PWA']) {
								$motdepasse = md5($tabResultat['PWA']);
							}
							else {
								$motdepasse = $tabResultat['PWA'];
							}
							$requete = "UPDATE `admin` SET`nom_admin`='".$tabResultat['nomA']."',`prenom_admin`='".$tabResultat['prenomA']."',`email_admin`='".$tabResultat['emailA']."',`password_admin`='".$motdepasse."',`type_admin`='".$tabResultat['Admin']."', `droit_admin`='".$tabResultat['idAct']."' WHERE  `email_admin` LIKE  '".$_POST['emailToSearch']."'";
							$this->adminManager->executerRequete($requete);
							echo $motdepasse;
							break;
						default:
							echo 'Error';
							break;
					}
				}
				elseif (isset($_POST['tabSupp'])) {
					
					try {
						$chaine ='';
						$tab = $_POST['tabSupp'];
						for ($i=0; $i <count($tab); $i++) { 
							$requete = "DELETE FROM `admin` WHERE  `email_admin` LIKE  '".$tab[$i]."'";					
							$this->adminManager->executerRequete($requete);
						}
						echo "Success";	
					} catch (Exception $e) {
						echo "Error";
					}
				}
				else{
						//$this->view('home/SuperUser',['name'=>'nom','lastname'=>'prenom','sector'=>'IT Solution','nbp'=>[120,120,120,200],'table'=>$q]);
						$this->view('home/superUser',['name'=>$_SESSION['nom'],'lastname'=>$_SESSION['prenom'],'sector'=>$_SESSION['secteur'],'nbp'=> $_SESSION['nbt'],'table'=>$q]) ;
						$reponse = '1';
						echo $reponse;
					}
	            	$_POST['name'] = $_SESSION['nom'];
					$_POST['lastname'] = $_SESSION['prenom'];

            }
			
		}
        else
        {
           header ('location:/SuperUser_orange/public/home/index');
		}

		
			
	}
}