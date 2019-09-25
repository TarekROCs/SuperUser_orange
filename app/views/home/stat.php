
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
<!--js-->
<script src="/SuperUser_orange/public/assets/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="/SuperUser_orange/public/assets/css/font-awesome.css" rel="stylesheet"> 

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
<div class="inner-block"  style="background: rgba(255, 165, 0, 0.49);" >
    <div class="price-block-main">
    	<div class="prices-head">
    		<h2>Tableau de board</h2>
    	</div>
    	<div class="price-tables" style = "float :left ">
	    		<div class="col-md-12 price-grid" >
	    		   <div class="price-block">
		    			<div class="price-gd-top pric-clr1" >
		    				<h4>Nombre total de partenaires par secteurs  </h4>

		    			</div>
		    			<div class="price-gd-bottom">
		    				<div class="price-list">
			    				<ul>
			    					<li  >  <img src='../assets/images/barChart1.png'
			    					width="800" height="500"></li>

			    				</ul>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		<div class="col-md-12 price-grid" >
	    		   <div class="price-block">
		    			<div class="price-gd-top pric-clr2" >
		    				<h4>Pourcentage des partenaires par secteurs  </h4>

		    			</div>
		    			<div class="price-gd-bottom">
		    				<div class="price-list">
			    				<ul>
			    					<li  >  <img src='../assets/images/pieChart1.png'
			    					width="600" height="500"></li>

			    				</ul>
		    				</div>
		    			</div>
		    		</div>
	    		</div>
	    		<div class="col-md-12 price-grid">
	    			<div class="price-block"> 
		    			<div class="price-gd-top pric-clr3" >
		    				<h4>Pourcentage des partenaires par secteurs et par pays</h4>

		    			</div>
		    			<div class="price-gd-bottom">
		    				<div class="price-list">
			    				<ul>
			    					<li   ><img src='../assets/images/barLevelChart1.png'
			    					width="800" height="500"></li>
			    				</ul>
		    				</div>
		    			</div>
		    		</div>
    	       </div>



    	  
	    		
    	  <div class="clearfix"> </div>
    	  </div>
   </div>
</div>
<!--inner block end here-->
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
		        <li id="menu-home" ><a href="/SuperUser_orange/public/Admin/index"><i class="fa fa-cogs"></i><span>Gestion des Administrateurs</span></a></li>
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
function destroy(){
		$.post("/SuperUser_orange/public/stat/index",{
			choix:'donne'
		},function(data) {
			
		});
	}
</script>
<!--scrolling js-->
		<script src="/SuperUser_orange/public/assets/js/jquery.nicescroll.js"></script>
		<script src="/SuperUser_orange/public/assets/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="/SuperUser_orange/public/assets/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>


                      
						
