<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoriesData = [
            ['name' => 'Arabica'],
            ['name' => 'Robusta'],
            ['name' => 'Espresso'],
            ['name' => 'Decafeine'],
            ['name' => 'Cold Brew'],
        ];

        foreach ($categoriesData as $data) {
            $category = new Category();
            $category
                ->setName($data['name']);

            $this->addReference('category_'.str_replace(' ', '_', $data['name']), $category);    

            $manager->persist($category);
        }

        $manager->flush();
    }
}
