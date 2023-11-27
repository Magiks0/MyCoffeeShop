<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Create 5 products
        for($i = 1; $i < 6; $i++){
            $product = new Product();
    
            // Set product properties
            $product
                    ->setId($i)
                    ->setName('Café'.$i)
                    ->setCountry('Country'.$i)
                    ->setFamily('Family'.$i)
                    ->setIdBrand($i)
                    ->setNote($i)
                    ->setIdCategory($i)
                    ->setPrice($i);

            // Persist the product to the database
            $manager->persist($product);
        }

        // Flush all persisted products to the database
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class
        ];
    }
}

