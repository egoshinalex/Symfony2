<?php

namespace App\Controller;


use App\Entity\Page;
use App\services\TestService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        $tmp = $service->convert(10000);
        return $this->render('main/index.html.twig'
        , ['key' => $tmp]);
    }
    /**
     * @Route("/add-page", name="addPage")
     */
    public function addPage(EntityManagerInterface $em)
    {
       $page = new Page();
       $page->setContent('Это контент2');
       $page->setTitle('Это заголовок2');
       $page->setPublish('true');

       $em->persist($page);
       $em->flush();

       return new Response('<html><body>Объект добавлен</body></html>');


    }
    /**
     * @Route("/show-page/{id}", name="showPage")
     */
    //public function showPage($id, EntityManagerInterface $em)
    public function showPage(Page $page)
    {
//        $repository = $em->getRepository(Page::class);
//        $page = $repository->findOneBy(['id'=>$id]);
//        if(!$page){
//            throw $this->createNotFoundException(sprintf('Такой страницы не найдено с id = "%s"', $id));
//
//        }
        return $this->render('page.html.twig'
            , ['page' => $page]);
       //dd($page);

      //  return new Response('<html><body>Объект добавлен</body></html>');

    }
    /**
     * @Route("/edit-page/{id}", name="editPage")
     */
    public function editPage(Page $page, EntityManagerInterface $em)
    {
          $page->setTitle('Обновленный заголовок');
          $page->setPublish(false);
          $em->flush();

        return new Response('<html><body>Объект обновлен</body></html>');
    }

    /**
     * @Route("/delete-page/{id}", name="deletePage")
     */
    public function deletePage(Page $page, EntityManagerInterface $em)
    {
        $em->remove($page);
        $em->flush();

        return new Response('<html><body>Объект удален</body></html>');
    }
    /**
     * @Route("/index-page", name="indexPage")
     */
    public function indexPage(EntityManagerInterface $em)
    {
       // $pages = $em->getRepository(Page::class)->findBy([]);
        $pages = $em->getRepository(Page::class)->findBy(['id' => '10']);
        dd($pages);

    }



}
