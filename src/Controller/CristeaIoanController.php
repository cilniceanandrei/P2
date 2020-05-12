<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CristeaIoanController extends AbstractController
{
    /**
     * @Route("/cristea/ioan", name="cristea_ioan")
     */
    public function index() {
        return $this->render('cristea_ioan.html.twig');
    }
}
