<?php 

// src/Twig/RandomNumberExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RandomNumberExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('randomNumber', [$this, 'getRandomNumber']),
        ];
    }

    public function getRandomNumber($max)
    {
        return mt_rand(0, $max);
    }
}

