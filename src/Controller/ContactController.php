<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
#[Route(path:'/contact', name:'contact')]
  public function home(){
    return $this->render('contact/contact.html.twig');  
} 
}