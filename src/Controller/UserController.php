<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/", name: "web_user_")]
class UserController extends AbstractController
{
    #[Route("/", methods: ["GET"], name: "index")]
    public function index(): Response
    {
        return $this->render("user/form.html.twig");
    }


    #[Route("/save", methods: ["POST"], name: "save")]
    public function save(): Response
    {
        return new Response("Implements save function");
    }
}
