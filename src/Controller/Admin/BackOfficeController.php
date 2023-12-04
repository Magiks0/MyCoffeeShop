<?php

namespace App\Controller\Admin;

use App\Entity\Brand;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Slider;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ProductCrudController::class)->generateUrl();

       return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MyCoffeeShop admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Back-Office', 'fa fa-home');
        yield MenuItem::linkToCrud('Marques', 'fas fa-copyright', Brand::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-list', Product::class);
        yield MenuItem::linkToCrud('Contacts', 'fas fa-phone', Contact::class);
        yield MenuItem::linkToCrud('Slider', 'fas fa-image', Slider::class);
    }
}
