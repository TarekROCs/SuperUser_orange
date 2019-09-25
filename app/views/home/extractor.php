
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
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<!--icons-css-->
<link href="/SuperUser_orange/public/assets/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!-//skycons-icons-->
<link href="/SuperUser_orange/public/assets/css/demo-page.css" rel="stylesheet" media="all">
<link href="/SuperUser_orange/public/assets/css/hover.css" rel="stylesheet" media="all">
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
													<p><?php  echo $data['name'].' '.$data['lastname']; ?></p>
													<span><?php echo $data['sector']; ?></span>
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
    <div class="chart-main-block">
    	<!--//////////////////////////////////////////////////////////////-->
		<div class="chart-first-line" >
		        <!--//////////////////////////////////////////////////////////////-->
				<div class="col-md-6 chart-blo-1">
					<div class= "dygno">
						<p id="Messagetext" class="" style="text-align: center; display: none ;margin :auto; width : 40%" ></p> 
						<form method="POST">
							<label> Nom :</label><input onchange="testExt();" style="margin-left: 70px;width: 200px;" type="text" name="nom" id="nom"> <br>
							<textarea onchange="testExt();" style="margin-left: 116px;width: 200px;height: 200px" name="texte" id="texte"></textarea><br>
						</form>
						
						<button disabled="true"  onclick="Clear2();" name="clear" style="margin-left: 115px;height: 3em;" type="submit" value="HTML" id="clear" class="btn btn-lg btn-primary">Clear</button>
						
						<button  name="extraire" disabled="true" style="margin-left: 12px; height: 3em;" type="submit" value="HTML" id="extraire" class="btn btn-lg btn-primary">Extraire</button>

						<br><div id="loading" style="display: none;">Chargement ...</div>

					</div>
				</div>
				<!--//////////////////////////////////////////////////////////////-->
				<div class="col-md-6 chart-blo-1">
					<div class="dygno">
						<form  method="POST">	
						<label style="width: 150px;"> Nom :</label><input onchange="testIns()"  type="text" name="nom2" id="nom2"> <br>
						<label style="width: 146px;"> Adress :</label> <input onchange="testIns()"  type="text" name="adress" id="adress"><br>
						<label style="width: 150px;"> Code postal : </label><input onchange="testIns()"  type="text" name="codepostal" id="codepostal"><br>			
						<label style="width: 146px;"> Pays : </label>
							<?php 	
								echo $this->Charger('pays');
							 ?>
						<br> 
						<label style="width: 150px;"> Ville :	</label><input onchange="testIns()"  type="text" name="ville" id="ville"> <br>
						<label style="width: 146px;"> Téléphone :</label> <input onchange="testIns()" type="text" name="telephone" id="telephone"><br>
						<label style="width: 146px;"> Fax :</label> <input onchange="testIns()" type="text" name="fax" id="fax"><br>
						<label style="width: 150px;"> E-Mail : </label><input onchange="testIns()" style="" type="text" name="email"><br> 
						<label style="width: 150px;"> Site Web : </label><input onchange="testIns()" style="height: 28px;" type="text" name="siteweb" id="siteweb"><br> 
						<label style="width: 150px;"> Description : </label><input onchange="testIns()" type="text" name="description" id="description"><br> 
						
						<label style="width: 150px;"> Salon :	</label><select  style="width : 154px;height:28px;" onchange="testIns()" name = "salon" id = "salon" >
							<?php 								
								echo $this->ChargerSalon();
							?>


							<button  style="width: 30px;" onclick="" type="button" name="addS" id="addS" data-target="#myModal2" data-toggle="modal"><i class="icon icon-sign-out icon-lg"></i>+</button><br>				
						
						</form>
					</div>
				</div>
				<!--//////////////////////////////////////////////////////////////-->
		</div>
		<!--//////////////////////////////////////////////////////////////-->
        <div class="chart-second-line">
            <!--//////////////////////////////////////////////////////////////-->
        	
				<div class= "dygno">
					<div>
						<button class="btn btn-lg btn-primary" disabled="true"  style="margin-left: 0px;margin-top: 10px" type="submit" name="inserer" id="inserer">Insérer</button>
						<button class="btn btn-lg btn-success" disabled="true"  style="margin-left: 5px;margin-top: 10px" type="submit" name="valider" id="valider">Valider</button>
						<button class="btn btn-lg btn-warning" disabled="true" onclick='ResetTT()'' style=" margin-left: 5px;margin-top: 10px" type="submit" name="reset" id="reset">Reset</button>
						<button class="btn btn-lg btn-danger" disabled="true" data-target="#myModal" data-toggle="modal" style="margin-left: 5px;margin-top: 10px" type="submit"  name="supprimer" id="supprimer"><i class="icon icon-sign-out icon-lg"></i>Supprimer</button>
						<br><br>

					</div>
					<p id="Message" class="" style="text-align: center; display: none ;margin :auto; width : 40%" ></p> 
					      	<div id="mytab">
					      		<table id="myTable" style="font-size: 0.95em" class="table table-hover">
									<thead>
									    <tr> 
									        <th style="width: 180px;">Nom</th>
									        <th style="width: 180px;">Adresse</th>
									        <th style="width: 135px;">Téléphone</th>
									        <th style="width: 135px;">Fax</th>
									        <th style="width: 80px;">Pays</th>
									        <th>Ville</th>
									        <th>Web</th>
									        <th>Email</th>
									        <th style="width: 50px;">Supp<input disabled="true" style="margin-left: 10px;" onclick="SelectAll();" type="checkbox" id="select" name="select"></th>
									    </tr>
									</thead>
									<tbody id="tabIns">
									</tbody>
								</table>
							</div>						
				</div>
        </div>
        <!--//////////////////////////////////////////////////////////////-->	
	</div>
</div>
<!--inner block end here-->

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
		        <li id="menu-home" ><a href="/SuperUser_orange/public/Admin/index"><i class="fa fa-cogs"></i><span>Gestion des Aministrateurs</span></a></li>
		        <li id="menu-home" ><a href="/SuperUser_orange/public/SuperUser/index"><i class="fa fa-tachometer"></i><span>Gestion des utilisateurs</span></a></li>
		        <li id="menu-home" ><a href="#"><i class="fa fa-envelope"></i><span>Mailing</span></a></li>
		        <li id="menu-home" ><a href="#"><i class="fa fa-file-text"></i><span>Carte visite</span></a></li>
		      </ul>
		    </div>
	 </div>
	<div class="clearfix"> </div>
</div>
<!-- Modale -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Suppression</h4>
            </div>
            <div id="MessageAvert" class="modal-body">
                Voulez vous vraiment supprimer ces éléments ? 
            </div>
            <div class="modal-footer">
                <button onclick="supprimerligne();" type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon icon-check icon-lg"></i> Valide</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal"><i class="icon icon-times icon-lg"></i> Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- Modale -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background: rgba(51, 122, 183, 0.42)" class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 style="text-align: center;" class="modal-title">Ajouter Salon</h4>
            </div>
            <div class="modal-body" style="background: rgba(32, 152, 209, 0.11)">
                <label style="width: 200px;margin-top: 7px;"> Titre du salon :</label><input style="width: 200px;" onchange="TestSalon()" type="text" name="NomS" id="NomS"><br>
                <label style="width: 200px;margin-top: 7px;"> Site Web :</label><input style="width: 200px;" onchange="TestSalon()"  type="text" name="LienS" id="LienS"><br>
                <label style="width: 200px;margin-top: 7px;"> Adress :</label><input style="width: 200px;" onchange="TestSalon()" type="text" name="AdressS" id="AdressS"><br>
                
                <label style="width: 200px;height: 10px;margin-top: 7px;"> Date début :</label><input style="width: 200px;" onchange="TestSalon()" placeholder="..." type="Date" name="dateD" id="dateD"><br>
                <label style="width: 200px;margin-top: 13px;"> Date fin :</label><input class="datepicker" style="width: 200px;" onchange="TestSalon()" placeholder="..." type="Date" name="dateF" id="dateF"><br>
                
                <label style="width: 200px;margin-top: 7px;"> Type du salon : </label><input type="text" style="width: 200px;" disabled="true" value="<?php echo $data['sector'] ?>" name="">
                </label><br>

            </div>
            <div class="modal-footer" style="background : rgba(51, 122, 183, 0.34)">
                <button id="ValiderS" disabled="true" type="button" class="btn btn-primary" data-dismiss="modal"><i class="icon icon-check icon-lg"></i> Valide</button>
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
		<!--//scrolling js-->
<script src="/SuperUser_orange/public/assets/js/bootstrap.js"> </script>



<script type="text/javascript">
    var check = false;
	tabPartenaire = [];
	var tabSalon = [];
	$("#ValiderS").click(
				function(){
				$.post('/SuperUser_orange/public/extractor/index',
				{
					choix:'4',
					NomS:$('[name="NomS"]').val(),
					LienS:$('[name="LienS"]').val(),
					AdressS:$('[name="AdressS"]').val(),
					dateD:$('[name="dateD"]').val(),
					dateF:$('[name="dateF"]').val(),
					Seteur:$('[name="CatS"]').val()									
				},			
				function(daat){
					lig = {nomS : document.getElementById('NomS').value, typeS : "<?php echo $data['sector'] ?>"};tabSalon.push(lig);					
					document.getElementById('salon').innerHTML += '<option value = "'+document.getElementById('NomS').value+'">'+document.getElementById('NomS').value+'</option>';
					$('[name="NomS"]').val("");
					$('[name="LienS"]').val("");
					$('[name="AdressS"]').val("");
					$('[name="dateD"]').val("");
					$('[name="dateF"]').val("");
					$('[name="CatS"]').val("");
				}
				);
				});

	$("#valider").click(function(){ 	
			$.post('/SuperUser_orange/public/extractor/index',			
								{
									choix:'3',
									tabPartenaire : tabPartenaire
								},
								function(daat){
									daat = daat.substring(2,3);
									if(daat!='0'){
										affiche(3,"alert alert-success");
									}
									else{
										affiche(4,"alert alert-warning");
									}
									for (var i = tabPartenaire.length - 1; i >= 0; i--) {
										tabPartenaire[i].valide =1;
									}									
									rechargerTP(tabPartenaire);
								}
								);
		});

	$("#extraire").click(function(){
			$.post('/SuperUser_orange/public/extractor/index',			
								{
									choix:'1',
									texte:$('[name="texte"]').val(),
									nom:$('[name="nom"]').val()
								},
							
							function(data){	

								data1=JSON.parse(data);
								$("#loading").hide(300);
								//Remplissage
								$('[name="email"]').val(data1.email);
								$('[name="pays"]').val(data1.pays);
								$('[name="siteweb"]').val(data1.siteweb);
								$('[name="codepostal"]').val(data1.codepostal);
								$('[name="adress"]').val(data1.adress);
								$('[name="ville"]').val(data1.ville);
								$('[name="telephone"]').val(data1.telephone);
								$('[name="fax"]').val(data1.fax);
								$('[name="description"]').val(data1.description);
								$('[name="nom2"]').val(data1.nom);
								document.getElementById('clear').disabled = false;
								document.getElementById('reset').disabled = false;
								document.getElementById('extraire').disabled = true;
							}
							);
							});

	$("#inserer").click(
		function(){
			$.post('/SuperUser_orange/public/extractor/index',
									{
										choix:'2',
										nom:$('[name="nom2"]').val(),
										email:$('[name="email"]').val(),
										pays:$('[name="pays"]').val(),
										siteweb:$('[name="siteweb"]').val(),
										codepostal:$('[name="codepostal"]').val(),
										adress:$('[name="adress"]').val(),
										ville:$('[name="ville"]').val(),
										telephone:$('[name="telephone"]').val(),
										fax:$('[name="fax"]').val(),										
										salon:$('[name="salon"]').val()
									},
									function(data){											
											ligne = {nom:$('[name="nom2"]').val(),
											email:$('[name="email"]').val(),
											pays:$('[name="pays"]').val(),
											siteweb:$('[name="siteweb"]').val(),
											codepostal:$('[name="codepostal"]').val(),
											adress:$('[name="adress"]').val(),
											ville:$('[name="ville"]').val(),
											telephone:$('[name="telephone"]').val(),
											fax:$('[name="fax"]').val(),
											salon:$('[name="salon"]').val(),
											description:$('[name="description"]').val(),
											valide: 0
											};
											tabPartenaire.push(ligne);
											rechargerTP(tabPartenaire);
											document.getElementById('extraire').disabled = true;  
											document.getElementById('valider').disabled = false;  
											document.getElementById('inserer').disabled = true;											  
											document.getElementById('clear').disabled = true;
											document.getElementById('select').disabled = false;
											$('[name="nom"]').val("");	
											$('[name="nom2"]').val("");	
											$('[name="texte"]').val("");	
											$('[name="adress"]').val("");	
											$('[name="codepostal"]').val("");	
											$('[name="pays"]').val("");	
											$('[name="ville"]').val("");	
											$('[name="telephone"]').val("");
											$('[name="fax"]').val("");	
											$('[name="siteweb"]').val("");	
											$('[name="salon"]').val("");	
											$('[name="secteur"]').val("");	
											$('[name="email"]').val("");	
											$('[name="description"]').val("");
										}									
									);
});


	

function rechargerTP(tab){	
	document.getElementById('myTable').innerHTML = '';
	var chaine = '<table id="myTable" style="font-size: 0.95em" class="table table-hover"><thead><tr> <th style="width: 180px;">Nom</th><th style="width: 180px;">Adresse</th><th style="width: 135px;">Téléphone</th><th style="width: 135px;">Fax</th><th style="width: 80px;">Pays</th><th>Ville</th><th>Web</th><th>Email</th><th style="width: 50px;">Supp<input style="margin-left: 10px;" onclick="SelectAll();" type="checkbox" id="select" name="select"></th></tr></thead><tbody id="tabIns">';
	var i;	
	for(i=0;i<tab.length;i++) {		
	    chaine += '<tr ';
	    if (tab[i].valide == 1) {	    	
	    	chaine += 'style="background-color: rgba(72, 208, 106, 0.31);"';
	    }
	    chaine += '><td>'+tab[i].nom+'</td>'; 
	    chaine += '<td>'+tab[i].adress+'</td>';
	    chaine += '<td>'+tab[i].telephone+'</td>';
	    chaine += '<td>'+tab[i].fax+'</td>'; 
	    chaine += '<td>'+tab[i].pays+'</td>'; 
	    chaine += '<td>'+tab[i].ville+'</td>';
	    chaine += '<td>'+tab[i].siteweb+'</td>';
	    chaine += '<td>'+tab[i].email+'</td>'; 									    
	    chaine += '<td style="text-align:center;"><input onchange="testSupp();" type="checkbox"> </td></tr>'; 									    
	}
	chaine +='</tbody></table>';
	document.getElementById('mytab').innerHTML = chaine;
	$('#myTable').DataTable();
	testSupp();
}

function SelectAll() {
		check = !check;
		var table =document.getElementById("tabIns").rows;
		for (var i = 0; i < table.length; i++){

			var Row = table[i];
			var Cells = Row.getElementsByTagName("td");
			Cells[8].firstChild.checked= check;
		}
		document.getElementById('supprimer').disabled = !check;
	}

function testSupp(){
	document.getElementById('supprimer').disabled =true;
	var table =document.getElementById("tabIns").rows;
		for (var i = 0; i < table.length; i++){

			var Row = table[i];
			var Cells = Row.getElementsByTagName("td");
			if(Cells[8].firstChild.checked) document.getElementById('supprimer').disabled =false;break;			
		}
}

function resetSalon(){
	document.getElementById('NomS').value ='';
	document.getElementById('LienS').value ='';
	document.getElementById('LienS').value ='';
	document.getElementById('dateD').value ='';
	document.getElementById('dateF').value ='';
	document.getElementById('AdressS').value = '';	
	document.getElementById('Nombre').value = '';
	document.getElementById('ValiderS').disabled = true;
}

function TestSalon(){
	if(document.getElementById('NomS').value =='' || 
		document.getElementById('LienS').value =='' ||
		document.getElementById('LienS').value =='' ||
		document.getElementById('dateD').value =='' ||
		document.getElementById('dateF').value =='')
	document.getElementById('ValiderS').disabled = true;

	else document.getElementById('ValiderS').disabled = false; 
}

function Clear2(){
	document.getElementById('texte').value ='';
	document.getElementById('nom').value ='';
	document.getElementById('clear').disabled = true;
	document.getElementById('extraire').disabled = true;
}

function testExt(){
	if (document.getElementById('texte').value =='' || document.getElementById('nom').value =='') {
		document.getElementById('extraire').disabled = true;
		document.getElementById('clear').disabled = true;
	}
	else {
		document.getElementById('extraire').disabled = false;
		document.getElementById('clear').disabled = false; 
	}
}

$(document).ready(function(){		
    $('#myTable').DataTable();
});

function testIns(){
	if (document.getElementById('nom').value =='' || 
		document.getElementById('salon').value =='' ||
		document.getElementById('pays').value =='' || 
		document.getElementById('adress').value =='' || 
		document.getElementById('siteweb').value ==''
		) 
			document.getElementById('inserer').disabled=true; 

	else document.getElementById('inserer').disabled = false;
}




	
function ResetTT()
{	
	$('[name="nom2"]').val("");		
	$('[name="adress"]').val("");
	$('[name="codepostal"]').val("");
	$('[name="pays"]').val("");
	$('[name="ville"]').val("");	
	$('[name="telephone"]').val("");	
	$('[name="fax"]').val("");
	$('[name="siteweb"]').val("");	
	$('[name="salon"]').val("");	
	$('[name="email"]').val("");	
	$('[name="description"]').val("");	
	var tabPartenaires = document.getElementById("tabIns").rows;
	while(tabPartenaires.length>0){
		document.getElementById("tabIns").deleteRow(0);
	}
	tabPartenaire = [];
	document.getElementById('valider').disabled = true;  
	document.getElementById('clear').disabled = true;
	document.getElementById('reset').disabled = true;
	document.getElementById('supprimer').disabled = true;    
}



function affiche(key, Class){
	var tabMessage = ['Aucun élement à supprimer !!', 'Acune case n\'est cochée !! \nVeuillez préciser les case à supprimer]' , 'Suppression avec sucès','Sauvegarde terminé avec succès', 'Attention : Les partenaires que vous voulez sauvegarder existent déjà dans la base de données.'];
	document.getElementById("Message").innerText = tabMessage[key];
	document.getElementById("Message").className = Class;
	document.getElementById("Message").style.display = 'block';
    setTimeout(function(){document.getElementById("Message").style.display = 'none';},2500);
}


function supprimerligne(){
		var tabInter= [];
		var tailletab = (i=document.getElementById("tabIns").rows.length);
		if (!(tailletab)) {			
			affiche(0,"alert alert-warning");
		}
		else{		
			var coché = false;
			while(i>0 && !coché){				
				var Row = document.getElementById("tabIns").rows[i-1];
				var Cells = Row.getElementsByTagName("td");				
				if(Cells[8].firstChild.checked) coché = true;				
				i--;
			}		
			if (!coché) {
				affiche(1,"alert alert-warning");
			}
			else{
				while(tailletab>0){
				var Row = document.getElementById("tabIns").rows[tailletab-1];
				var Cells = Row.getElementsByTagName("td");	
				if(Cells[8].firstChild.checked) document.getElementById("tabIns").deleteRow(tailletab-1);
				else tabInter.push(tabPartenaire[tailletab-1]);
				tailletab--;
				}
				affiche(2,"alert alert-success");
				tabPartenaire = tabInter;
			}
			
		}	
		document.getElementById('select').checked = false;
		document.getElementById('select').disabled = true;
	}

	function destroy(){
		$.post("/SuperUser_orange/public/extractor/index",{
			choix2:'donne'
		},function(data) {
			
		});
	}

	

	

</script>


<!-- mother grid end here-->
</body>
</html>


                      
						
