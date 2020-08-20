<?php

namespace App\Controller;


use App\services\TestService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     * @param TestService $service
     * @return Response
     */
    //public function index(LoggerInterface $logger)
    /**
     * @param TestService $service
     * @return Response
     */
    public function index(TestService $service)
    {
//      return new Response("<html><head></head><body>123</body></html>");

        //$logger->info('проба лог');
      //  $tmp = "test";
        $tmp = $service->convert(1000);
        return $this->render('main/index.html.twig'
        , ['key' => $tmp]);
    }
}
