<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/hello', name: 'hello_page')]
    public function hello(): Response
    {
        return $this->render('default/hello.html.twig', [
            'message' => 'Hello, welcome to your first Symfony page!',
        ]);
    }
}
