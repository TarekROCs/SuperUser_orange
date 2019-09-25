<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<title>  Algerian Partners </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="/SuperUser_orange/public/assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="/SuperUser_orange/public/assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
<!--js-->
<script src="/SuperUser_orange/public/assets/js/jquery-2.1.1.min.js"></script> 

<!--icons-css-->
<link href="/SuperUser_orange/public/assets/css/font-awesome.css" rel="stylesheet"> 

<!--Google Fonts-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//skycons-icons-->
<link href="/SuperUser_orange/public/assets/css/demo-page.css" rel="stylesheet" media="all">
<link href="/SuperUser_orange/public/assets/css/hover.css" rel="stylesheet" media="all">
<!--//skycons-icons-->
</head>
<body>	
<div class="page-container">		
   <div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<div class="header-main">
					<div class="header-left">
							<div class="logo-name">
									 <a href="index.html"> <h1>DATA EXTRACTOR</h1> 
									<!--<img id="logo" src="" alt="Logo"/>--> 
								  </a> 								
							</div>
							<!--search-box-->
						
							<div class="clearfix"> </div>
						 </div>
						 <div class="header-right">
							<div class="profile_details">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<div class="profile_img">	
												<span class="prfil-img"><img src="/SuperUser_orange/public/assets/images/p1.png" alt=""> </span> 
												<div class="user-name">
													<p><?php echo $data['name'].' '.$data['lastname']; ?></p>
													<span><?php echo $data['sector'];?></span>
												</div>
												<i class="fa fa-angle-down lnr"></i>
												<i class="fa fa-angle-up lnr"></i>
												<div class="clearfix"></div>	
											</div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="/SuperUser_orange/public/profil/index"><i class="fa fa-user"></i> Profile</a> </li> 
											<li > <a href="/SuperUser_orange/public/home/index" onclick="destroy()"  ><i class="fa fa-sign-out" ></i> Se deconnecter</a> </li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="clearfix"> </div>				
						</div>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block" style="background: rgba(255, 165, 0, 0.49);">
    	<!--//////////////////////////////////////////////////////////////-->
	<div class="chart-main-block">	
		<div class="chart-first-line" >
		        <!--//////////////////////////////////////////////////////////////-->
				<div class="col-md-6 chart-blo-1">
					<div class="w3l_grid">
						<br>
						<form  method="POST">	
						<label style="display: none;" id="indice"></label>						
						<label style="width: 235px;"> Nom :</label><input style="width: 300px;" onchange="Activer();" type="text" name="nom" id="nom"><br>
						<label style="width: 230px;margin-top: 7px;"> Prénom :</label>  <input  style="width: 300px;" onchange="Activer();" type="text" name="prenom" id="prenom"><br>
						<label style="width: 230px;margin-top: 7px;"> Secteur d'activié : </label> <select onchange="Activer();" style="height: 30px;width: 300px;" name="secteur" id="secteur">
						<option></option>
						<option>Industrie</option>
						<option>Agriculture</option>
						<option>Construction</option>
						<option>IT Solution</option>
						</select>
						<br>				
						<label style="width: 235px;margin-top: 7px;"> E-mail :</label><input  style="width: 300px;" onchange="Activer();" type="email" name="email" id="email"> <br>
						<label style="width: 235px;margin-top: 7px;"> Mot de passe : </label><input  style="width: 300px;" onchange="Activer();" type="password" name="mpasse" id="mpasse"> <br>
						<label style="width: 230px;margin-top: 7px;"> Confirmer le mot de passe :</label> <input style="width: 300px;" onchange="Activer();" type="password" name="conf" id="conf"> <br>						
						
						<label style="width: 230px;margin-top: 10px">Admin :</label><input style="display:inline-block; width: 4s0px;" type="checkbox" id="admin" name="admin">

						<p id="Message" class="" style="text-align: center;margin :auto; width : 50%"></p> <br>
						
						<button onclick="Reset();" class="btn btn-lg btn-warning" disabled="true"  style="margin-top: 10px" type="button" name="reset" id="reset">Reset</button>
						<button onclick="test();" class="btn btn-lg btn-warning" disabled="true"  style="margin-left: 7px;margin-top: 10px" type="button" name="ajouter" id="ajouter">Ajouter</button>
						<button onclick="test2(parseInt(document.getElementById('indice').value));" class="btn btn-lg btn-warning" disabled="true"  style="margin-left: 7px;margin-top: 10px" type="button" name="modifier" id="modifier">Modifier</button>					

						</form>
					</div>
				</div>
				<!--//////////////////////////////////////////////////////////////-->
				<div class="col-md-6 chart-blo-1">
					<br>
					<div class="w3l_grid">
							<textarea style="height: 380px; width: 100%;" name="texte" id="texte"></textarea>
					</div>
				</div>
				<!--//////////////////////////////////////////////////////////////-->
		</div>
		<!--//////////////////////////////////////////////////////////////-->
        <div class="chart-second-line">
            <!--//////////////////////////////////////////////////////////////-->        		
				<div class= "dygno">						
						<dir>												
							<!--<button class="btn btn-lg btn-primary" style="margin-left: 57px;margin-top: 10px" type="submit" name="actualiser" id="actualiser">Ajouter répertoire</button>-->							
							<button onclick="supprimerligne();" disabled="true" class="btn btn-lg btn-danger" style="margin-left: 80px;margin-top: 10px" type="submit"  name="supprimer" id="supprimer">supprimer</button>				
							<p id="Message2" class="" style="text-align: center;margin :auto; width : 50%"></p> <br>
						</dir>
						      	<div id="mytab">
						      		<table id="myTable">
									<thead>
									    <tr> 
									    	<th>Num</th>
									        <th>Nom</th>
									        <th>Prénom</th>
									        <th>Secteur</th>						        
									       	<th>Select<input onclick="SelectAll();" type="checkbox" id="select" name="select" style="display: block;margin :auto;"></th>
									    </tr>						    
									</thead>
									<tbody id="tabIns" >
										<?php 							  							    	
										    	echo "<script>var tabAdmin = []; </script>";
										    	$activité = array('Industrie','Agriculture','Construction','IT Solution');
										    	$chaine='';
										    	$i=1;
												while ($donnees = $data['table']->fetch(PDO::FETCH_ASSOC)){
													$chaine .= '<tr onclick="Afficher('.($i-1).');"><td>'.$i.'</td>';
													$chaine .= '<td>'.$donnees['nom_admin'].'</td>'; 
												    $chaine .= '<td>'.$donnees['prenom_admin'].'</td>';
												    $chaine .= '<td>'.$donnees['Nom_Activite_FR' ].'</td>';									    
												    $chaine .= '<td><input onclick="CheckTab();" type="checkbox" id="supp" name="supp" style="display: block;margin :auto;"></td></tr>';
												   $chaine .=" <script> ligne = {nomA:'".$donnees['nom_admin']."',prenomA:'".$donnees[ 'prenom_admin']."',idAct:'".$donnees['ID_Activite']."',nomAct:'".$donnees['Nom_Activite_FR']."',PWA:'".$donnees['password_admin']."',dateCreat:'".$donnees['date_creation_admin']."',emailA:'".$donnees['email_admin']."', admin : '".$donnees['type_admin']."'};tabAdmin.push(ligne);</script>";
												   $i++;
												}
												echo $chaine;
										     ?>
									</tbody>
									</table>
								</div>					
		</div>
	</div>
</div>

</div>
<!--inner block end here-->

<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
		  	<div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
			      <!--<img id="logo" src="" alt="Logo"/>--> 
			  </a> </div>		  
		    <div class="menu">
		      <ul id="menu" >
		    		<li id="menu-home" ><a href="/SuperUser_orange/public/stat/index"><i class="fa fa-bar-chart"></i><span>Tableau de board</span></a></li>
		        <li id="menu-home" ><a href="/SuperUser_orange/public/extractor/index"><i class="fa fa-book nav_icon"></i><span>Extraction de données</span></a></li>
		        <li id="menu-home" ><a href="/SuperUser_orange/public/Admin/index"><i class="fa fa-cogs"></i><span>Exploitation de données</span></a></li>
		        <li id="menu-home" ><a href="/SuperUser_orange/public/SuperUser/index"><i class="fa fa-tachometer"></i><span>Gestion des utilisateurs</span></a></li>
		        <li id="menu-home" ><a href="#"><i class="fa fa-envelope"></i><span>Mailing</span></a></li>
		        <li id="menu-home" ><a href="#"><i class="fa fa-file-text"></i><span>Carte visite</span></a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>



<!--slide bar menu end here-->
<script>

var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<!--scrolling js-->
<script src="/SuperUser_orange/public/assets/js/jquery.nicescroll.js"></script>
		<script src="/SuperUser_orange/public/assets/js/scripts.js"></script>
<script src="/SuperUser_orange/public/assets/js/bootstrap.js"> </script>

<script type="text/javascript">

	var check = false;
	var mp="";

	$(document).ready(function(){		
    	$('#myTable').DataTable();
	});

	function rechargerTA(tab){	
		document.getElementById('myTable').innerHTML = '';
		var chaine = '<table id="myTable" class="table table-hover"><thead><tr> <th>Num</th><th>Nom</th><th>Prénom</th><th>Secteur</th><th>Select<input onclick="SelectAll();" type="checkbox" id="select" name="select" style="display: block;margin :auto;"></th></tr></thead><tbody id="tabIns">';
		var i;
		for(i=0;i<tab.length;i++) {		
			chaine += '<tr onclick="Afficher('+i+');"><td>'+(i+1)+'</td>';
			chaine += '<td>'+tabAdmin[i].nomA+'</td>'; 
		    chaine += '<td>'+tabAdmin[i].prenomA+'</td>';
		    chaine += '<td>'+tabAdmin[i].nomAct+'</td>';									    
		    chaine += '<td><input onclick="CheckTab();" type="checkbox" id="supp" name="supp" style="display: block;margin :auto;"></td></tr>';
			}								    
		chaine +='</tbody></table>';
		document.getElementById('mytab').innerHTML = chaine;
		$('#myTable').DataTable();	
	}

	function SelectAll() {
		check = !check;
		var table =document.getElementById("tabIns").rows;
		for (var i = 0; i < table.length; i++){

			var Row = table[i];
			var Cells = Row.getElementsByTagName("td");
			Cells[4].firstChild.checked= check;
		}
		document.getElementById('supprimer').disabled = !check;
	}
	

	function Activer(){
		if(document.getElementById('nom').value != "" && document.getElementById('prenom').value != "" &&  document.getElementById('mpasse').value != "" && document.getElementById('conf').value != "" && document.getElementById('email').value != "" && document.getElementById('modifier').disabled == true){
			document.getElementById('ajouter').disabled = false;
		}
		else {
			document.getElementById('ajouter').disabled = true;
			document.getElementById('reset').disabled = true;
		}

		if(document.getElementById('nom').value != "" || document.getElementById('prenom').value != "" || document.getElementById('secteur').value != "" || document.getElementById('mpasse').value != "" || document.getElementById('conf').value != "" || document.getElementById('email').value != ""){
			document.getElementById('reset').disabled = false;
		}
	}

    function affiche(key, Class){
		var tabMessage = ['Erreur : E-mail incorrecte !!', 'Erreur : E-mail existe déjà !!', 'Erreur : Veuillez réécrir le mot de passe correctement', 'Erreur : Mot de passe doit contenir au moins 8 caractères et au moins un chiffre et une lettre majuscule','Ajout avec succès','Modéfication effectuée avec succès', "Attention : Aucune modéfication n'est effectée !!"];
		document.getElementById("Message").innerText = tabMessage[key];
		document.getElementById("Message").className = Class;
		document.getElementById("Message").style.display = 'block';
	    setTimeout(function(){document.getElementById("Message").style.display = 'none';},2500);
	}


	function test(){
		var activité = ['Industrie','Agriculture','Construction','IT Solution']
		if(!verifMail(document.getElementById('email'))) {affiche(0,"alert alert-warning");}
		else{
			if (!((/^[a-zA-Z0-9]{8,}$/i.test(document.getElementById('mpasse').value))&& document.getElementById('mpasse').value.replace(/[a-z]/ig,'').length>1)) {
				affiche(3,"alert alert-warning");
			}
			else{
				if (document.getElementById('mpasse').value != document.getElementById('conf').value) {
					affiche(2,"alert alert-warning");
				}
				else{
					if(RechercherAdmin()){
						affiche(1,"alert alert-warning");
					}
					else{

						var admin;
						if(document.getElementById('admin').checked){
							admin = 'Admin';
						}
						else admin = 'User';
						var now = new Date();
						var dateNow = now.getFullYear()+'-';
						if(String((now.getMonth() + 1)).length == 1) dateNow += '0';						
						dateNow += (now.getMonth() + 1)+'-';
						if(String((now.getDate())).length == 1) dateNow += '0';
						dateNow += now.getDate()+' '+ now.getHours()+':'+ now.getMinutes()+':'+ now.getSeconds();

						var ligne = {nomA:document.getElementById('nom').value,prenomA: document.getElementById('prenom').value,idAct: activité.indexOf(document.getElementById('secteur').value)+1,nomAct: document.getElementById('secteur').value,PWA: document.getElementById('mpasse').value,dateCreat: dateNow,emailA: document.getElementById('email').value, Admin : admin};
						$.post("/SuperUser_orange/public/SuperUser/index",						
						        {
						        	Op : 'Ajout',
						        	tabResultat : ligne						        	
						        },
						        function(daat){									
						        	ligne.PWA = daat;						        	
						        	ligne1 = {nomA:ligne.nomA,prenomA: ligne.prenomA,idAct: ligne.idAct,nomAct: ligne.nomAct,PWA: ligne.PWA,dateCreat: ligne.dateCreat, emailA: ligne.emailA,admin: ligne.admin };
						        	tabAdmin.push(ligne1);
						        	rechargerTA(tabAdmin);
						        }
						    );

						
						document.getElementById("nom").value = "";
						document.getElementById("prenom").value = "";
						document.getElementById("secteur").value = "";
						document.getElementById("email").value = "";
						document.getElementById("mpasse").value = "";
						document.getElementById("conf").value = "";
						document.getElementById('texte').innerHTML ="";
						document.getElementById('admin').checked = false;
						affiche(4,"alert alert-success");
					}
										
				}
			}
		}
	}


	function test2(ind){
		var newMPA = false;
		var activité = ['Industrie','Agriculture','Construction','IT Solution'];
		if (tabAdmin[ind].nomA == document.getElementById('nom').value &&
					tabAdmin[ind].prenomA == document.getElementById('prenom').value &&
					tabAdmin[ind].idAct == activité.indexOf(document.getElementById('secteur').value)+1 &&
					tabAdmin[ind].nomAct == document.getElementById('secteur').value &&
					tabAdmin[ind].PWA == document.getElementById('mpasse').value &&			
					tabAdmin[ind].emailA == document.getElementById('email').value) {
			affiche(6,"alert alert-warning");
		}
		else{
			var mp2 = document.getElementById('mpasse').value;		
			if(!verifMail(document.getElementById('email'))) {affiche(0,"alert alert-warning");}
			else{			
				
				if (document.getElementById('mpasse').value != document.getElementById('conf').value) {
					affiche(2,"alert alert-warning");
				}
				else{				
					var admin;
					if(document.getElementById('admin').checked){
						admin = 'Admin';
					}
					else admin = 'User';					
					var dateNow = tabAdmin[ind].dateCreat;	
					var emailSupp = tabAdmin[ind].emailA;
					tabAdmin[ind].nomA = document.getElementById('nom').value;
					tabAdmin[ind].prenomA = document.getElementById('prenom').value;
					tabAdmin[ind].idAct = activité.indexOf(document.getElementById('secteur').value)+1;
					tabAdmin[ind].nomAct = document.getElementById('secteur').value;
					tabAdmin[ind].PWA = document.getElementById('mpasse').value;
					tabAdmin[ind].dateCreat = dateNow;
					tabAdmin[ind].emailA = document.getElementById('email').value;
					tabAdmin[ind].Admin = admin;						
					$.post("/SuperUser_orange/public/SuperUser/index",
					        {
					        	Op : 'Modef',
					        	emailToSearch : emailSupp,
					        	tabResultat : tabAdmin[ind]
					        },
					        function(daat){					        							        	
					        	if (daat != mp2) {
					      			tabAdmin[ind].PWA = daat;	
					        	}
					        	rechargerTA(tabAdmin);
					        }
					    )
					document.getElementById("nom").value = "";
					document.getElementById("prenom").value = "";
					document.getElementById("secteur").value = "";
					document.getElementById("email").value = "";
					document.getElementById("mpasse").value = "";
					document.getElementById("conf").value = "";
					document.getElementById('texte').innerHTML ="";
					document.getElementById('admin').checked = false;
					affiche(5,"alert alert-success");
					Reset();
					}
			}
		}
		
	}

	var nbcoché = 0;

	function CheckTab(){
		var tailletab = (i=document.getElementById("tabIns").rows.length -1);
		if (tailletab>0){		
			var coché = false;
			while(i>=0 && !coché){
				var Row = document.getElementById("tabIns").rows[i];
				var Cells = Row.getElementsByTagName("td");	
				if(Cells[4].firstChild.checked) {coché = true;}
				i--;
			}
		}
		if (!coché) document.getElementById('supprimer').disabled = true;
		else document.getElementById('supprimer').disabled = false;
	}

	function supprimerligne(){
		var tabSupp = [];
		var tabInter = [];
		var tailletab = (document.getElementById("tabIns").rows.length -1);	
		while(tailletab>=0){
			var Row = document.getElementById("tabIns").rows[tailletab];
			var Cells = Row.getElementsByTagName("td");	
			if(Cells[4].firstChild.checked){
				tabSupp.push(tabAdmin[tailletab].emailA);				
			}
			else{
				tabInter.unshift(tabAdmin[tailletab]);
			}
			tailletab--;
		}
		tabAdmin = tabInter;
		rechargerTA(tabAdmin);	
		$.post("/SuperUser_orange/public/SuperUser/index",
					        {					        	
					        	tabSupp : tabSupp					        	
					        },
					        function(daat){
					        	daat = daat.substring(daat.length-7,daat.length);					        	
					        	if (daat=="Success") {
					        		affiche2(0,"alert alert-success");
					        		document.getElementById("nom").value = "";
									document.getElementById("prenom").value = "";
									document.getElementById("secteur").value = "";
									document.getElementById("email").value = "";
									document.getElementById("mpasse").value = "";
									document.getElementById("conf").value = "";
									document.getElementById('texte').innerHTML ="";
									document.getElementById('admin').checked = false;
					        	}
					        	else{
					        		affiche2(1,"alert alert-danger");
					        	}
					        }
					    )
		document.getElementById('supprimer').disabled = true;
		document.getElementById('reset').disabled = true;
		document.getElementById('modifier').disabled = true;
		
	}

	function RechercherAdmin(){
		var trouve =false;
		for (var i = 0; i < tabAdmin.length; i++) {						
			if (tabAdmin[i].emailA == document.getElementById('email').value){								
				trouve = true;
				break;
			}
		}
		return trouve;
	}


	function verifMail(champ)
	{
	    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}$/;
	    if(!regex.test(champ.value))
	    {
	   		return false;
	    }
	    else
	    {	    	
	    	return true;
	    }
	}

	function Reset(){		
		document.getElementById('nom').value = ""; 
		document.getElementById('prenom').value = "" ;
		document.getElementById('secteur').value = "" ;
		document.getElementById('mpasse').value = "" ;
		document.getElementById('conf').value = "" ;
		document.getElementById('email').value = "";
		document.getElementById('texte').innerHTML ="";
		document.getElementById('reset').disabled = true;
		document.getElementById('ajouter').disabled = true;
		document.getElementById('modifier').disabled = true;
		document.getElementById('admin').checked = false;
	}

	function Afficher(ind){		
		mp =document.getElementById('mpasse').value ;
		document.getElementById('indice').value = ind;
		document.getElementById('nom').value = tabAdmin[ind].nomA;
		document.getElementById('prenom').value = tabAdmin[ind].prenomA ;
		document.getElementById('secteur').value = tabAdmin[ind].nomAct ;
		document.getElementById('mpasse').value = tabAdmin[ind].PWA ;
		document.getElementById('conf').value = tabAdmin[ind].PWA;
		document.getElementById('email').value = tabAdmin[ind].emailA;
		document.getElementById('texte').innerHTML = "Nom du super utilisateur: "+tabAdmin[ind].nomA+".\nPrenom du super utilisateur: "+tabAdmin[ind].prenomA+". \nSecteur d'activité: "+tabAdmin[ind].nomAct+". \nLogin: "+tabAdmin[ind].emailA+". \nDate de création :" +tabAdmin[ind].dateCreat+".";
		document.getElementById('reset').disabled = false;
		document.getElementById('modifier').disabled = false;
		document.getElementById('ajouter').disabled = true;
		if (tabAdmin[ind].admin == 'Admin') {
			document.getElementById('admin').checked = true;
		}
		else document.getElementById('admin').checked = false;
			
	}

	function affiche2(key, Class) {
		var tabMessage = ['Suppression efféctuée avec succès','Erreur : Suppression impossible !!'];
		document.getElementById("Message2").innerText = tabMessage[key];
		document.getElementById("Message2").className = Class;
		document.getElementById("Message2").style.display = 'block';
	    setTimeout(function(){document.getElementById("Message2").style.display = 'none';},2500);
	}
	function destroy(){
		$.post("/SuperUser_orange/public/SuperUser/index",{
			choix:'donne'
		},function(data) {
			
		});
	}

	


</script>'

<!-- mother grid end here-->

</body>
</html>