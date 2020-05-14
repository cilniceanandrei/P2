<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PadureanuDenis extends AbstractController{

    public function number() {
        return $this->render('denis_padureanu.html.twig');
    }

}
