<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route("/api/v1", name: "api_v1_user_")]
class UserController
{
    #[Route("/list", methods: ["GET"], name: "list")]
    public function list(): JsonResponse
    {
        return new JsonResponse([
            "message" => "implements select on db"
        ], 404);
    }

    #[Route("/register", methods: ["POST"], name: "register")]
    public function save(): JsonResponse
    {
        return new JsonResponse([
            "message" => "implements insert into on db"
        ], 404);
    }
}
