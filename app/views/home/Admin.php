<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<title> Algerian Partners </title>
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

<div class="inner-block" style="background: rgba(255, 165, 0, 0.49); height: 100%;">
			<div style="width: 100%;" class="col-md-6 chart-blo-1">
				<div class= "dygno">					
					<label style="margin-left: 150px;">Secteur</label>
					<label style="margin-left: 160px">Validé</label>
					<label style="margin-left: 130px">Super utilisateur</label>
					<br>
					<?php 
						echo $this->Charger('secteur');
					?>
					<select onchange="recharger();" style="margin-left: 10px;height: 40px;width: 201px" id="valide" name="valider">
						<option value="">Tout</option>
						<option value="Validé">Validé</option>
						<option value="Non validé">Non validé</option>
					</select>	
					<?php 
						echo $this->Charger('admin');
					?>
					<br><br>
					
							<div >					
						<div id="TableAdm">
						<table style="font-size: 0.95em" id="myTable">
							<thead>
							    <tr> 
							    	<th>Info</th>
							    	<th>N° entreprise</th>
							        <th>Nom entreprise</th>
							        <th>email</th>
							        <th>Téléphone</th>
							        <th>Fax</th>
							        <th>Super utilisateur</th>
							        <th>Secteur</th>
							        <th>Date insertion</th>
							        <th>Validation</th>							        
							    </tr>
							    
							</thead>
							<tbody id="tabAdm">
								<?php 							  
							    	$i=0;
							    	echo "<script>var tabPartenaire = []; var cpt =0; </script>";
							    	$activité = array('Industrie','Agriculture','Construction','IT Solution');
							    	$chaine='';
									while ($donnees = $data['table']->fetch(PDO::FETCH_ASSOC)) {
										$i++;
										$chaine .= '<tr><td><button onclick="Afficher('.$i.');" data-target="#myModal" data-toggle="modal" value="Gras"><img src="/SuperUser_orange/public/assets/images/inf.png" alt=""></button></td>';
									    $chaine .= '<td>'.$donnees['ID_Partenaire'].'</td>'; 
									    $chaine .= '<td>'.$donnees['Nom_Societe'].'</td>';
									    $chaine .= '<td>'.$donnees['Email_Societe'].'</td>';
									    $chaine .= '<td>'.$donnees['Tel_Societe'].'</td>'; 
									    $chaine .= '<td>'.$donnees['FAX_Societe'].'</td>'; 
									    $chaine .= '<td>'.$donnees['user_insertion'].'</td>';
									    $chaine .= '<td>'.$activité[intval($donnees['id_activite'])-1].'</td>';
									    $chaine .= '<td>'.$donnees['Date_Adhesion_Societe'].'</td>'; 
									    $vald="";
									    if (!intval($donnees['Validation_compte'])) {
									    	$vald = "Non validé";
									    	$chaine .="<script>
									    		$('ValiderT').ready(function() {											        
											    	document.getElementById('ValiderT').disabled = false;
											    });
									    			
									    		
									    		</script>";	
									    }
									    else $vald = "Validé";  
									    $chaine .= '<td>'.$vald.'</td></tr>'; 
									    $chaine .=" <script> ligne = {idpart:'".$donnees['ID_Partenaire']."',nomS:'".$donnees['Nom_Societe']."',email:'".$donnees['Email_Societe']."',telephone:'".$donnees['Tel_Societe']."',fax:'".$donnees['FAX_Societe']."',superuser:'".$donnees['user_insertion']."',secteur:'".$activité[intval($donnees['id_activite'])-1]."',date:'".$donnees['Date_Adhesion_Societe']."',valide:'".$vald."'};tabPartenaire.push(ligne);var tabInter = tabPartenaire;</script>";
									}						
									
									echo $chaine;
							     ?>
							</tbody>
						</table>											
					</div>
			</div>

			
		</div>
		<br>
		<div style="float: right;">							
				<button onclick="ValiderTT();" disabled="true" type="button" id="ValiderT" name="ValiderT" class="btn btn-lg btn-primary" style="margin-right: 5px;">Valider tout</button>
				<button disabled="true" type="button" id="sauvegarder" class="btn btn-lg btn-primary">Sauvegarder le contenu</button>				
		</div>
		<br><br><br>
		<p id="Message2" class="" style="text-align: center;margin :auto; width : 50%"></p> <br>
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            
            <div class="modal-header" style="background: #5a5050;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 style="text-align: center; color: white" class="modal-title">Informations du Partenaire</h4>
            </div>
            <div class="modal-body" style="background: rgb(234, 234, 234);">
            	<label id="IdPart" style="display: none;"></label>
                <label style="width: 170px; background: #ccc; margin-right: 10px">Numéro entreprise :</label><label id="NumE"></label><br>
                
                <label style="width: 170px; background: #ccc; margin-right: 10px">Nom entreprise :</label><label id="NE" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px; margin-right: 10px; margin-right: 10px">E-mail :</label>
                
                <label id="EM" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px;">Téléphone :</label><label id="Tel" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px">Fax :</label><label id="Fax" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px">Super utilisateur :</label><label id="SU" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px">Secteur :</label><label id="Sec" ></label><br>
                
                <label style="width: 170px;background: #ccc; margin-right: 10px">Date insertion :</label><label id="DI" ></label><br>
            </div>
            <div class="modal-footer" style="background: #4a4848;">
                <button id="ValiderS" onclick="Valider();" type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon icon-check icon-lg"></i> Valide</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal"><i class="icon icon-times icon-lg"></i>Fermer</button>
            </div>
        </div>
    </div>
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

<!-- mother grid end here-->
<script type="text/javascript">



	var tabValider = [];
	var check = false;
	$("#sauvegarder").click(function(){
				$.post('/SuperUser_orange/public/Admin/index',				
								{
									tabValider : tabValider
								},
								function(daat){									
									daat = daat.substring(daat.length-7,daat.length);
						        	if (daat=="Success") {
						        		affiche2(0,"alert alert-success");
						        		document.getElementById('sauvegarder').disabled = true;
						        	}
						        	else{
						        		affiche2(1,"alert alert-danger");						        		
						        	}
								}
					);
			});


	function affiche2(key, Class) {
		var tabMessage = ['Sauvegarde efféctué avec succès','Erreur : Sauvegarde impossible !!'];
		document.getElementById("Message2").innerText = tabMessage[key];
		document.getElementById("Message2").className = Class;
		document.getElementById("Message2").style.display = 'block';
	    setTimeout(function(){document.getElementById("Message2").style.display = 'none';},2500);
	}

	function recharger(){		
		tabInter = tabPartenaire;		
		var chaine = "";
		var tabInit = [];
		if (document.getElementById('secteur').value != "") {
			for (var i = 0; i < tabInter.length; i++){
				if (tabInter[i].secteur == document.getElementById('secteur').value) {
					tabInit.push(tabInter[i]);
				}
			}
			tabInter = tabInit;
		}
		if (document.getElementById('valide').value != "") {			
			if (tabInit.length>0) {tabInit = [];}
			for (var i = 0; i < tabInter.length; i++){
				if(tabInter[i].valide == document.getElementById('valide').value) {

					tabInit.push(tabInter[i]);
				}
			}			
			tabInter = tabInit;									
		}
		if (document.getElementById('admin').value != ""){
			if (tabInit.length>0) {tabInit = [];}			
			for (var i = 0; i < tabInter.length; i++){				
				if (tabInter[i].superuser == document.getElementById('admin').value) {
					tabInit.push(tabInter[i]);
				}
			}
			tabInter = tabInit;
		}
		rechargerTADM(tabInter);
	}

	function Afficher(indice){		
		document.getElementById('IdPart').innerHTML = indice - 1;
		document.getElementById('NumE').innerHTML = tabInter[indice-1].idpart;
		document.getElementById('NE').innerHTML = tabInter[indice-1].nomS;
		document.getElementById('EM').innerHTML = tabInter[indice-1].email;
		document.getElementById('Tel').innerHTML = tabInter[indice-1].telephone;
		document.getElementById('Fax').innerHTML = tabInter[indice-1].fax;
		document.getElementById('SU').innerHTML = tabInter[indice-1].superuser;
		document.getElementById('Sec').innerHTML = tabInter[indice-1].secteur;
		document.getElementById('DI').innerHTML = tabInter[indice-1].date;
	}

	function Valider(){		
		if (tabInter[parseInt(document.getElementById('IdPart').innerHTML)].valide != 'Validé'){
			var i = 0; 
			while(tabPartenaire[i].email != tabInter[parseInt(document.getElementById('IdPart').innerHTML)].email)
			{
				i++;				
			}			
			tabPartenaire[i].valide = 'Validé';
			tabInter[parseInt(document.getElementById('IdPart').innerHTML)].valide = 'Validé';
			tabValider.push(tabPartenaire[i].idpart);
			recharger();
			if (document.getElementById('sauvegarder').disabled){
				document.getElementById('sauvegarder').disabled = false;
			}			
		}
	}

	function ValiderTT(){
		var ccpt=0;
		for (var i = 0; i < tabInter.length; i++) {
			if (tabInter[i].valide != 'Validé'){
				ccpt++;				
				var j = 0; 
				while(tabPartenaire[j].email != tabInter[j].email)
				{
					j++;				
				}
				tabPartenaire[j].valide = 'Validé';
				tabInter[i].valide = 'Validé';
				tabValider.push(tabPartenaire[i].idpart);					
			}
		}
		recharger(tabPartenaire);
		document.getElementById('ValiderT').disabled = true;
		if (ccpt!=0) {document.getElementById('sauvegarder').disabled = false;}

	}
	function destroy(){
		$.post("/SuperUser_orange/public/admin/index",{
			choix:'donne'
		},function(data) {
			
		});
	}

	$(document).ready(function(){		
    $('#myTable').DataTable();
});


function rechargerTADM(tab){	
	document.getElementById('TableAdm').innerHTML = '';
	var chaine = '<table style="font-size: 0.95em" id="myTable"><thead><tr> <th>Info</th><th>N° entreprise</th><th>Nom entreprise</th><th>email</th><th>Téléphone</th><th>Fax</th><th>Super utilisateur</th><th>Secteur</th><th>Date insertion</th><th>Validation</th></tr></thead><tbody id="tabAdm">';
	var i;	
	for(i=0;i<tab.length;i++) {
		chaine += '<tr><td><button onclick="Afficher('+(i+1)+');" data-target="#myModal" data-toggle="modal" value="Gras"><img src="/SuperUser_orange/public/assets/images/inf.png" alt=""></button></td>';
	    chaine += '<td>'+tab[i].idpart+'</td>'; 
	    chaine += '<td>'+tab[i].nomS+'</td>';
	    chaine += '<td>'+tab[i].email+'</td>';
	    chaine += '<td>'+tab[i].telephone+'</td>'; 
	    chaine += '<td>'+tab[i].fax+'</td>'; 
	    chaine += '<td>'+tab[i].superuser+'</td>';
	    chaine += '<td>'+tab[i].secteur+'</td>';
	    chaine += '<td>'+tab[i].date+'</td>'; 									    
	    chaine += '<td>'+tab[i].valide+'</td></tr>'; 									    
	}
	chaine +='</tbody></table';
	document.getElementById('TableAdm').innerHTML = chaine;
	$('#myTable').DataTable();
}

</script>

</body>
</html>
