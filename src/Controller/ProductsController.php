<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route(path:'/products', name:'products')]
    public function products(ProductRepository $productRepository, PaginatorInterface $pagination, Request $request){
      $allProducts = $productRepository->findAll();
      $products = $pagination->paginate(
        $allProducts, //Les données a passer
        $request->query->getInt('page', 1), //Numero de la page en cours( 1 par défaut )
        10, //Combien d'élements par page
        /*TODO Gerer les pages superieures*/
      );
      $randomNumber = mt_rand(0, 4);
      return $this->render('products/products.html.twig',[
        'products' => $products,
        'randomNumber' => $randomNumber,
  ]);  
  } 

  #[Route(path:'/product/{name}', name:'product')]
    public function product(string $name): Response
    {
      return $this->render('products/product.html.twig',[
        'name' => $name
      ]);
  } 

}