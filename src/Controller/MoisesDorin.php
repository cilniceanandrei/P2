<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MoisesDorin extends AbstractController{

    public function number() {
        return $this->render('dorin_moises.html.twig');
    }

}
