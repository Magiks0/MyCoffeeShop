<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brandsData = [
            ['name' => 'Lavazza'],
            ['name' => 'Nespresso'],
            ['name' => 'Grand-Mere'],
            ['name' => 'Senseo'],
            ['name' => 'Carte Noire'],
        ];

        foreach ($brandsData as $data) {
            $brand = new Brand();
            $brand
                ->setName($data['name']);
            $this->addReference('brand_'.str_replace(' ','_', $data['name']), $brand);
            $manager->persist($brand);
        }

        $manager->flush();
    }
}
