<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class DefaultController
{

    #[Route('/')]
    public function index(Request $request): Response
    {
        // Forma 1: return new Response("Deu certo!", 200);

        // Forma 2:
        $res = new Response(null, 200, ['Content-type' => 'application/json']);
        $res->setContent(json_encode(
            [
                "received" => $request->get('nome'),
                "ip" => $request->getClientIp()
            ]
        ));
        $res->setStatusCode(200);

        return $res;
    }
}