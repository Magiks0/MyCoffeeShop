<?php 

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: ProductRepository::class )]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $name = null;

    #[ORM\Column]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column]
    private ?string $family = null;

    #[ORM\Column]
    private ?string $country = null;

    #[ORM\Column]
    private ?bool $bestSeller = false;

    #[ORM\ManyToOne(inversedBy: Product::class, targetEntity: Brand::class)]
    private Brand $brand;

    #[ORM\ManyToOne(inversedBy: Product::class, targetEntity: Category::class)]
    private Category $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function isBestSeller(): bool
    {
        return $this->bestSeller;
    }

    public function getBrand(): Brand
    {
        return $this->brand;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function getBestSeller() : bool
    {
        return $this->bestSeller;
    }

    // Setters

    public function setID(int $id){
        $this->id = $id;
    }

    public function setName(?string $name):void
    {
        $this->name = $name;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function setNote(?int $note): void
    {
        $this->note = $note;
    }

    public function setFamily(?string $family): void
    {
        $this->family = $family;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function setBestSeller(bool $bestSeller): void
    {
        $this->bestSeller = $bestSeller;
    }

    public function setBrand(Brand $brand): void
    {
        $this->brand = $brand;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

}
