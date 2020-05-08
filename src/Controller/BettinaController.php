<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BettinaController extends AbstractController
{

    public function getPersonalPage()
    {
        return $this->render("Bettina.html.twig");
    }
    public function getTest1Page()
    {
        return $this->render("test1.html.twig");
    }
    public function getTest2Page()
    {
        return $this->render("test2.html.twig");
    }
    public function getTest3Page()
    {
        return $this->render("test3.html.twig");
    }
    public function getTest4Page()
    {
        return $this->render("test4.html.twig");
    }
}
