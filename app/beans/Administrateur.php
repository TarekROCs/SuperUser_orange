<?php
class administrateur
{
	private  $id;
    private  $name;
    private  $lastName;
    private  $email;
    private  $sector;
    private  $nbPartenaireIndustrie ; 
    private  $nbPartenaireAgriculture ; 
    private  $nbPartenaireConstruction ; 
    private  $nbPartenaireItSolution ; 
    private  $type;
    public function __construct ($data=[]) {
        $this->id= $data['id'];
        $this->name= $data['name'];
        $this->lastName = $data['lastName'];
        $this->sector= $data['sector'];
        $this->email= $data['email'];
        $this->type= $data['type'];
    }
    public function getType()
    {
        return $this->type ; 
    }
    
    public function getName()
    {
     	return $this->name ;
         
    }
    
    public function getLastName()
    {
    	return $this->lastName ;
         
    }
    
    public function getSector()
    {
     	return $this->sector ;                
	}
    
     public function getEmail()
    {
        return $this->email ;
     
    }
    public function getId()
    {
        return $this->id ;
     
    }
    public function getnbPartenaireIndustrie()
    {
        return $this->nbPartenaireIndustrie;
     
    }
    public function getnbPartenaireAgriculture()
    {
        return $this->nbPartenaireAgriculture;
     
    }
    public function getnbPartenaireConstruction()
    {
        return $this->nbPartenaireConstruction;
     
    }
    public function getnbPartenaireItSolution()
    {
        return $this->nbPartenaireItSolution;
     
    }
    public function setnbPartenaireIndustrie($nb)
    {
        $this->nbPartenaireIndustrie = $nb;
     
    }
    public function setnbPartenaireAgriculture($nb)
    {
        $this->nbPartenaireAgriculture = $nb;
     
    }
    public function setnbPartenaireConstruction($nb)
    {
        $this->nbPartenaireConstruction = $nb;
     
    }
    public function setnbPartenaireItSolution($nb)
    {
        $this->nbPartenaireItSolution = $nb;
     
    }
}
