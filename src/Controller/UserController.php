<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/", name: "web_user_")]
class UserController
{
    #[Route("/", methods: ["GET"], name: "index")]
    public function index(): Response
    {
        return new Response("Implements register form");
    }


    #[Route("/save", methods: ["POST"], name: "save")]
    public function save(): Response
    {
        return new Response("Implements save function");
    }
}
