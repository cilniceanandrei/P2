<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CilniceanAndrei extends AbstractController
{

    public function homepage()
    {
        return $this->render('cilnicean_andrei.html.twig');
    }
}