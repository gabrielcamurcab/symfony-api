<?php

namespace App\Controller\Api;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Exception;
use Serializable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route("/api/v1", name: "api_v1_user_")]
class UserController extends AbstractController
{
    #[Route("/list", methods: ["GET"], name: "list")]
    public function list(EntityManagerInterface $entityManager)
    {
        $users = $entityManager->getRepository(User::class);

        return new JsonResponse($users->getAllUsers(), 200);
    }

    #[Route("/register", methods: ["POST"], name: "register")]
    public function save(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $content = $request->getContent();
        $data = json_decode($content, true);

        if ($data === null)
            return new JsonResponse([
                "message" => "Erro ao processar dados JSON"
            ], 400);

        try {
            $user = new User;
            $user->setName($data['name']);
            $user->setEmail($data['email']);
    
            $entityManager->persist($user);
            $entityManager->flush();

            return new JsonResponse([
                "message" => "Usuário cadastrado com sucesso"
            ], 200);
        } catch (Exception $err) {
            return new JsonResponse([
                "message" => "Não foi possível cadastrar o usuário"
            ], 401);
        }

    }
}
