<?php
session_start() ; 
include("../app/includes/pChart/class/pData.class.php");
include("../app/includes/pChart/class/pDraw.class.php");
include("../app/includes/pChart/class/pImage.class.php");
include("../app/includes/pChart/class/pPie.class.php");

Class Stat extends Controller 
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
                $admin = $this->adminManager->getAdmin($_SESSION['email'] ,md5($_SESSION['password']) ); 
                $nbt = $this->adminManager->getNbPartenaireParSecteur($admin->getName(),$admin->getLastName());
                $nbp = $this->adminManager->getNombreTotalPartenairesParSecteur();
                ////////////////// 
                $this->generateBarChart("./assets/images/barChart1.png",700, 300, 80, 50, 700, 250,['ItSolution  '.$nbp[0],'Industrie  '.$nbp[1] ,'Construction  '.$nbp[2] , 'Agriculture  '.$nbp[3]], "Secteurs", "",$nbp, "nombre de partenaires" , "" ) ;
                //////////////////
               $snbp = $nbp[0] + $nbp[1] +$nbp[2] + $nbp[3];
               //////////////////
               $this->generatePieChart ("./assets/images/pieChart1.png",700, 300, ['ItSolution   '.intval($nbp[0]/$snbp*100),'Industrie   '.intval($nbp[1]/$snbp*100),'Construction   '.intval($nbp[2]/$snbp*100),'Agriculture   '.intval($nbp[3]/$snbp*100)], "Secteurs", "",$nbp, "nombre de partenaires" , "" ) ;
               //////////////////
               $pays = [] ; 
               $pays = $this->adminManager->getPaysMax();
               $ind = $this->adminManager->getNbPartenaires(1) ; 
               $agr = $this->adminManager->getNbPartenaires(2) ; 
               $con = $this->adminManager->getNbPartenaires(3) ; 
               $it = $this->adminManager->getNbPartenaires(4) ;
               $this->generateLevelBarChart($pays,$ind, $agr , $con , $it );
               $this->view('home/stat',['name'=>$admin->getName(),'lastname'=>$admin->getLastName(),'sector'=>$admin->getSector(),'nbp'=>$nbt]) ;

            }

        }
        else 
        {
            header ('location:/SuperUser_orange/public/home/index');
        }
    }

    function generateBarChart ($chart_filename, $hight, $width,  $X,$Y,$Xb,$Yb , $abscisse, $abscisse_name , $abscisse_unit  , $ordonne , $ordonne_name, $ordonne_unit  )
    {
        $myData = new pData();
        $myData->addPoints($ordonne,"ordonne");
        $myData->addPoints($abscisse,"abscisse");
        $myData->setAbscissa("abscisse");
        $myData->setAxisName(0,$ordonne_name);
        $myData->setAxisUnit(0,$ordonne_unit);
        $myData->loadPalette("../app/includes/pChart/palettes/light.color", TRUE);
        $myPicture = new pImage($hight,$width,$myData,TRUE);
        /* Define the boundaries of the graph area */
        $myPicture->setGraphArea($X,$Y,$Xb,$Yb);
        $myPicture->drawText( $hight/2,$width-2,$abscisse_name ,array("FontSize"=>10,"FontName"=>"../app/includes/pChart/fonts/verdana.ttf"));
        /* Choose a nice font */
        $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/verdana.ttf","FontSize"=>8));
        $Settings = array("R"=>100, "G"=>100, "B"=>180, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
        $myPicture->drawFilledRectangle(0,0,700,390,$Settings);
        $Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
        $myPicture->drawGradientArea(0,0,700,390,DIRECTION_VERTICAL,$Settings);
        $myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>80));
        $myPicture->drawRectangle(0,0,699,389,array("R"=>0,"G"=>0,"B"=>0));
        $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/Silkscreen.ttf","FontSize"=>6));
        $myPicture->drawText(10,13," ",array("R"=>255,"G"=>255,"B"=>255));
        $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/Forgotte.ttf","FontSize"=>11));
        $myPicture->drawText( $hight/2,$width-8,$abscisse_name ,array("FontSize"=>10,"FontName"=>"../app/includes/pChart/fonts/verdana.ttf"));
        /* Draw the scale, keep everything automatic */
        $myPicture->setShadow($Enabled=TRUE,$Format=array("X"=>10,"Y"=>10,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
        $Palette = array("0"=>array("R"=>46,"G"=>151,"B"=>224,"Alpha"=>100),
            "1"=>array("R"=>128,"G"=>128,"B"=>128,"Alpha"=>100),
            "2"=>array("R"=>204,"G"=>102,"B"=>0,"Alpha"=>100),
            "3"=>array("R"=>0,"G"=>153,"B"=>0,"Alpha"=>100),
            "4"=>array("R"=>176,"G"=>46,"B"=>224,"Alpha"=>100),
            "5"=>array("R"=>224,"G"=>46,"B"=>117,"Alpha"=>100),
            "6"=>array("R"=>92,"G"=>224,"B"=>46,"Alpha"=>100),
            "7"=>array("R"=>224,"G"=>176,"B"=>46,"Alpha"=>100));
        $myPicture->drawScale();
        $myPicture->drawBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>false ,"Rounded"=>TRUE,"Surrounding"=>30,"OverrideColors"=>$Palette));
        $myPicture->Render ("$chart_filename") ;
    }
    function generatePieChart ($chart_filename, $hight, $width , $abscisse, $abscisse_name , $abscisse_unit  , $ordonne , $ordonne_name, $ordonne_unit )
    {
        $MyData = new pData();   
        $MyData->addPoints($ordonne,"ScoreA");  
        $MyData->setSerieDescription("ScoreA","Application A");
        /* Define the absissa serie */
        $MyData->addPoints( $abscisse,"Labels");
        $MyData->setAbscissa("Labels");
        /* Create the pChart object */
        $myPicture = new pImage(500,360,$MyData);
        /* Draw a solid background */
        $Settings = array("R"=>100, "G"=>142, "B"=>37, "Dash"=>1, "DashR"=>120, "DashG"=>162, "DashB"=>57);
        $myPicture->drawFilledRectangle(0,0,700,390,$Settings);
        /* Overlay with a gradient */
        $Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
        //  $myPicture->drawGradientArea(0,0,700,390,DIRECTION_VERTICAL,$Settings);
          $myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,array("StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>80));
        /* Add a border to the picture */
        $myPicture->drawRectangle(0,0,700,400,array("R"=>0,"G"=>0,"B"=>0));
        /* Write the picture title */ 
        $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/Silkscreen.ttf","FontSize"=>6));
        $myPicture->drawText(10,13,"",array("R"=>255,"G"=>255,"B"=>255));
        $myPicture->setShadow($Enabled=TRUE,$Format=array("X"=>10,"Y"=>10,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>20));
        /* Set the default font properties */ 
        $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/Forgotte.ttf","FontSize"=>10));
        /* Create the pPie object */ 
        $PieChart = new pPie($myPicture,$MyData);
        /* Draw an AA pie chart */ 


        $PieChart->setSliceColor(0, array("R"=>46,"G"=>151,"B"=>224));
        $PieChart->setSliceColor(1, array("R"=>128,"G"=>128,"B"=>128));
        $PieChart->setSliceColor(2, array("R"=>204,"G"=>102,"B"=>0));
        $PieChart->setSliceColor(3, array("R"=>0,"G"=>153,"B"=>0,));

        $PieChart->draw3DPie(260,180,array("Radius"=>70,"DrawLabels"=>TRUE,"LabelStacked"=>TRUE,"Border"=>TRUE));
        /* Write the legend box */ 
        $myPicture->setShadow(TRUE);
        $PieChart->drawPieLegend(15,280,array("Alpha"=>20));
        /* Render the picture (choose the best way) */
        $myPicture->Render ("$chart_filename");
    }
    function generateLevelBarChart($pays,$ind,$agr,$con,$it)
    {
        /* Create and populate the pData object */
         $MyData = new pData();  
         $MyData->addPoints($it,"IT solution");
         $MyData->addPoints($ind ,"Industrie");
         $MyData->addPoints($con,"Construction");
         $MyData->addPoints($agr,"Agriculture");
         $MyData->setAxisName(0,"Nombre de partenaires");
         $MyData->addPoints($pays,"Labels");
         $MyData->setSerieDescription("Labels","Months");
         $MyData->setAbscissa("Labels");
         $Palette = array("0"=>array("R"=>46,"G"=>151,"B"=>224,"Alpha"=>100),
            "1"=>array("R"=>128,"G"=>128,"B"=>128,"Alpha"=>100),
            "2"=>array("R"=>204,"G"=>102,"B"=>0,"Alpha"=>100),
            "3"=>array("R"=>0,"G"=>153,"B"=>0,"Alpha"=>100),
            );
        $MyData->setPalette("IT solution",array("R"=>46,"G"=>151,"B"=>224,"Alpha"=>100)) ; 
        $MyData->setPalette("Industrie",array("R"=>128,"G"=>128,"B"=>128,"Alpha"=>100)) ; 
        $MyData->setPalette("Construction",array("R"=>204,"G"=>102,"B"=>0,"Alpha"=>100)) ;
        $MyData->setPalette("Agriculture",array("R"=>0,"G"=>153,"B"=>0,"Alpha"=>100)) ;


        $myPicture = new pImage(700,230,$MyData);
         $Settings = array("R"=>194, "G"=>92, "B"=>4, "Dash"=>1, "DashR"=>204, "DashG"=>102, "DashB"=>14);
        $myPicture->drawFilledRectangle(0,0,700,390,$Settings);
         /* Create the pChart object */
         $myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100));
         $myPicture->drawGradientArea(0,0,700,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20));
         /* Set the default font properties */
         $myPicture->setFontProperties(array("FontName"=>"../app/includes/pChart/fonts/pf_arma_five.ttf","FontSize"=>6));
         /* Draw the scale and the chart */
         $myPicture->setGraphArea(60,20,680,190);
         $myPicture->drawScale(array("DrawSubTicks"=>TRUE,"Mode"=>SCALE_MODE_ADDALL_START0));
         $myPicture->setShadow(FALSE);
         

         $myPicture->drawStackedBarChart(array("DisplayPos"=>LABEL_POS_INSIDE,"DisplayValues"=>false ,"Rounded"=>TRUE,"Surrounding"=>30));
         /* Write the chart legend */
         $myPicture->drawLegend(380,210,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
         /* Render the picture (choose the best way) */
         $myPicture->Render("assets/images/barLevelChart1.png");
    }
}


