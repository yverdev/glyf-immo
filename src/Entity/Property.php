<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;

/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 */
class Property
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rooms;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bedrooms;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $garage;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $parking;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $balcony;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $floor;

    /**
     * @ORM\Column(type="string", length=100, nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $rental;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sale;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $furnished;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $opposite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $caretaker;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $handicap_access;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $heater;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createAt;

    public function __construct()
    {
        $this->createAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function setRef(int $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): string
    {
        return (new Slugify())->slugify($this->title);
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getFormatedPrice(): string
    {
        return number_format($this->price, 0, '', ' ');
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getRooms(): ?int
    {
        return $this->rooms;
    }

    public function setRooms(?int $rooms): self
    {
        $this->rooms = $rooms;

        return $this;
    }

    public function getBedrooms(): ?int
    {
        return $this->bedrooms;
    }

    public function setBedrooms(?int $bedrooms): self
    {
        $this->bedrooms = $bedrooms;

        return $this;
    }

    public function getGarage(): ?string
    {
        return $this->garage;
    }

    public function setGarage(?string $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(?string $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getBalcony(): ?bool
    {
        return $this->balcony;
    }

    public function setBalcony(?bool $balcony): self
    {
        $this->balcony = $balcony;

        return $this;
    }

    public function getGarden(): ?bool
    {
        return $this->garden;
    }

    public function setGarden(?bool $garden): self
    {
        $this->garden = $garden;

        return $this;
    }

    public function getFloor(): ?string
    {
        return $this->floor;
    }

    public function setFloor(?string $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRental(): ?bool
    {
        return $this->rental;
    }

    public function setRental(?bool $rental): self
    {
        $this->rental = $rental;

        return $this;
    }

    public function getSale(): ?bool
    {
        return $this->sale;
    }

    public function setSale(?bool $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getFurnished(): ?bool
    {
        return $this->furnished;
    }

    public function setFurnished(?bool $furnished): self
    {
        $this->furnished = $furnished;

        return $this;
    }

    public function getOpposite(): ?bool
    {
        return $this->opposite;
    }

    public function setOpposite(?bool $opposite): self
    {
        $this->opposite = $opposite;

        return $this;
    }

    public function getCaretaker(): ?bool
    {
        return $this->caretaker;
    }

    public function setCaretaker(?bool $caretaker): self
    {
        $this->caretaker = $caretaker;

        return $this;
    }

    public function getHandicapAccess(): ?bool
    {
        return $this->handicap_access;
    }

    public function setHandicapAccess(?bool $handicap_access): self
    {
        $this->handicap_access = $handicap_access;

        return $this;
    }

    public function getHeater(): ?string
    {
        return $this->heater;
    }

    public function setHeater(?string $heater): self
    {
        $this->heater = $heater;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeInterface $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }


}
