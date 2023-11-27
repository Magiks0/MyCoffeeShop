<?php

namespace App\Controller;

use App\DataFixtures\AppFixtures;
use App\Repository\ProductRepository;
use App\Repository\SliderRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DOMDocument;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  #[Route(path:'/', name:'redir')]
  public function redir(){
    return $this->redirectToRoute('home');  
  }

  #[Route(path:'/Accueil', name:'home')]
  public function homepage(ProductRepository $fixtureRespository){

    $product = $fixtureRespository->findAll();

    return $this->render('home/homepage.html.twig',[
      'products' => $product
]);  
}


}