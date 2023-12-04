<?php

namespace App\Controller\Api;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Serializable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api/v1", name: "api_v1_user_")]
class UserController extends AbstractController
{
    #[Route("/list", methods: ["GET"], name: "list")]
    public function list(EntityManagerInterface $entityManager): JsonResponse
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        //dump($users->findAll());

        return new JsonResponse($users, 200);
    }

    #[Route("/register", methods: ["POST"], name: "register")]
    public function save(): JsonResponse
    {
        return new JsonResponse([
            "message" => "implements insert into on db"
        ], 404);
    }
}
