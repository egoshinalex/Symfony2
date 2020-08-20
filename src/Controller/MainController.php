<?php

namespace App\Controller;


use App\services\TestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     * @param TestService $service
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(TestService $service)
    {
        $tmp = $service->convert(1000);
        return $this->render('main/index.html.twig'
        , ['key' => $tmp]);
    }
}
