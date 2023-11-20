<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\SliderRepository;
use DOMDocument;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  #[Route(path:'/', name:'homepage')]
  public function homepage(SliderRepository $sliderRepository){
    return $this->render('home/homepage.html.twig',[
      'products' => $sliderRepository->findAll()
]);  
}
  
  #[Route(path:'/product', name:'produits')]
  public function products(ProductRepository $productRepository){
    return $this->render('products/products.html.twig',[
      'products' => $productRepository->findAll()
]);  
} 

#[Route(path:'/contact', name:'contact')]
  public function home(){
    return $this->render('contact/contact.html.twig');  
} 
}