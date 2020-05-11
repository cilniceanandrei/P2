<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BunulescuStefan extends AbstractController{


    public function index(){
    
	 return $this->render('bunulescu_stefan.html.twig');
    }
}