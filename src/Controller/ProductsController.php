<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route(path:'/products', name:'products')]
    public function products(ProductRepository $productRepository){
      return $this->render('products/products.html.twig',[
        'products' => $productRepository->findAll()
  ]);  
  } 

  #[Route(path:'/product/{id}-{name}', name:'product')]
    public function product(int $id, string $name,ProductRepository $productRepository): Response
    {
      return $this->render('products/product.html.twig',[
        'id' => $id,
        'name' => $name
      ]);
  } 

}