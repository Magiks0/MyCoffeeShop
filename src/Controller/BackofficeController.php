<?php

namespace App\Controller;

use App\DataFixtures\AppFixtures;
use App\DataFixtures\ProductFixtures;
use App\Entity\Product;
use App\Repository\BrandRepository;
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

class BackofficeController extends AbstractController
{
    #[Route(path: '/backoffice', name: 'backoffice')]
    public function backHome()
    {   
        return $this->render('backoffice/backoffice.html.twig');
    }

    #[Route(path: '/backoffice-brands', name: 'boBrands')]
    public function backBrands(BrandRepository $brandRepository)
    {
        $brands = $brandRepository->findAll();
        return $this->render('backoffice/backofficeBrands.html.twig', [
            'brands' => $brands,
        ]);
    }

    #[Route(path: '/backoffice-products', name: 'boProducts')]
    public function backProducts(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();
        return $this->render('backoffice/backofficeProducts.html.twig', [
            'products' => $products,
        ]);
    }
}
