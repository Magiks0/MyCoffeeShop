<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  #[Route(path:'/', name:'home')]
  public function home(ProductRepository $productRepository){
    $products = $productRepository->findAll();
    $bestSellers = $productRepository->findBy(['bestSeller' => 1]);

    return $this->render('home/homepage.html.twig',[
      'products' => $products,
      'bestSellers' => $bestSellers
    ]);
  }



}