<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'brand')]
    private Collection $products;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    // Getters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getProducts(): Collection
    {
        return $this->products;
    }

    // Setters

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    // Note: Pour setId, vous pouvez choisir de le laisser tel quel ou de le supprimer, car Doctrine s'occupera généralement de la gestion de l'ID.

    // Méthodes pour la gestion de la relation avec Product

    public function addProduct(Product $product): void
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setBrand($this);
        }
    }

    public function removeProduct(Product $product): void
    {
        if ($this->products->removeElement($product)) {
            // Si la relation bidirectionnelle est gérée correctement, on définirait également le côté inversé à null ici.
            // $product->setBrand(null);
        }
    }
}
