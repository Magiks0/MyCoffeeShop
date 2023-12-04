<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $categories =
            [
                [
                    'name' => $this->getReference('category_Arabica')
                ],
                [
                    'name' => $this->getReference('category_Robusta')
                ],
                [
                    'name' => $this->getReference('category_Espresso')
                ],
                [
                    'name' => $this->getReference('category_Decafeine')
                ],
                [
                    'name' => $this->getReference('category_Cold_Brew')
                ],
            ];

        $brands =
            [
                [
                    'name' => $this->getReference('brand_Lavazza')
                ],
                [
                    'name' => $this->getReference('brand_Nespresso')
                ],
                [
                    'name' => $this->getReference('brand_Grand-Mere')
                ],
                [
                    'name' => $this->getReference('brand_Senseo')
                ],
                [
                    'name' => $this->getReference('brand_Carte_Noire')
                ],
            ];

        $productData = [
            ['name' => 'Arabica Coffee', 'description' => 'Premium Arabica coffee beans', 'price' => 20, 'note' => 5, 'family' => 'Single Origin', 'country' => 'Ethiopia', 'best_seller' => true],
            ['name' => 'Espresso Blend', 'description' => 'Dark roasted espresso blend', 'price' => 15, 'note' => 4, 'family' => 'Blend', 'country' => 'Italy', 'best_seller' => false],
            ['name' => 'Decaf Variety', 'description' => 'Assorted decaffeinated coffee', 'price' => 18, 'note' => 3, 'family' => 'Decaf', 'country' => 'Various', 'best_seller' => false],
            ['name' => 'Robusta Strong', 'description' => 'Bold and strong Robusta coffee', 'price' => 25, 'note' => 4, 'family' => 'Single Origin', 'country' => 'Vietnam', 'best_seller' => true],
            ['name' => 'Caramel Infused', 'description' => 'Coffee with caramel flavor', 'price' => 22, 'note' => 4, 'family' => 'Flavored', 'country' => 'Various', 'best_seller' => false],
            ['name' => 'Chocolate Delight', 'description' => 'Coffee with chocolate undertones', 'price' => 19, 'note' => 4, 'family' => 'Flavored', 'country' => 'Various', 'best_seller' => false],
            ['name' => 'Organic Fair Trade', 'description' => 'Certified organic and fair trade coffee', 'price' => 30, 'note' => 5, 'family' => 'Single Origin', 'country' => 'Various', 'best_seller' => true],
            ['name' => 'Hazelnut Bliss', 'description' => 'Coffee with hazelnut flavor', 'price' => 23, 'note' => 3, 'family' => 'Flavored', 'country' => 'Various', 'best_seller' => false],
            ['name' => 'Mocha Madness', 'description' => 'Mocha-flavored coffee blend', 'price' => 28, 'note' => 4, 'family' => 'Blend', 'country' => 'Various', 'best_seller' => true],
            ['name' => 'Colombian Excellence', 'description' => 'High-quality Colombian coffee', 'price' => 26, 'note' => 5, 'family' => 'Single Origin', 'country' => 'Colombia', 'best_seller' => true],
            ['name' => 'Vanilla Dream', 'description' => 'Coffee with vanilla flavor', 'price' => 24, 'note' => 4, 'family' => 'Flavored', 'country' => 'Various', 'best_seller' => false],
        ];

        foreach ($productData as $data) {
            $product = new Product();
            $product->setName($data['name']);
            $product->setDescription($data['description']);
            $product->setPrice($data['price']);
            $product->setNote($data['note']);
            $product->setFamily($data['family']);
            $product->setCountry($data['country']);
            $product->setBestSeller($data['best_seller']);
            $product->setBrand($brands[rand(0, count($brands) - 1)]['name']);
            $product->setCategory($categories[rand(0, count($categories) - 1)]['name']);

            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class,
            BrandFixtures::class,
        ];
    }
}
