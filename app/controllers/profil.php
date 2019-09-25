<?php
session_start() ; 
Class Profil extends Controller 
{
    public function index () 
    {

       if (isset($_SESSION['id'] ))
        { 
            if(isset($_POST['choix']))
            {
                session_destroy();
            }
            else
            {
                
                $this->view('home/profil',['name'=>$_SESSION['nom'],'lastname'=>$_SESSION['prenom'],'sector'=>$_SESSION['secteur'],'nbp'=>$_SESSION['nbt']]) ;
            } 
       }
       else 
       {
          header ('location:/SuperUser_orange/public/home/index');
          exit();
     }
    }
}