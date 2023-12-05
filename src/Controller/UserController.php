<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function save(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->request->all();

        $user = new User;
        $user->setName($data['name']);
        $user->setEmail($data['email']);

        $entityManager->persist($user);
        $entityManager->flush();

        if ($user->getId())
            return $this->render("user/success.html.twig", ["user_name" => $user->getName()]);
        else
            return $this->render("user/error.html.twig", ["user_name" => $user->getName()]);
    }
}
