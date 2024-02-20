<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BandRepository::class)]
class Band
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origin = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $startYear = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $separationYear = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $founders = null;
    #[ORM\Column(nullable: true)]
    private ?int $members = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $musicalStyle = null;
    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $introduction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin($origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStartYear(): ?string
    {
        return $this->startYear;
    }

    public function setStartYear($startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    public function getSeparationYear(): ?string
    {
        return $this->separationYear;
    }

    public function setSeparationYear($separationYear): self
    {
        $this->separationYear = $separationYear;

        return $this;
    }

    public function getFounders(): ?string
    {
        return $this->founders;
    }

    public function setFounders($founders): self
    {
        $this->founders = $founders;

        return $this;
    }

    public function getMembers(): ?int
    {
        return $this->members;
    }

    public function setMembers($members): self
    {
        $this->members = $members;

        return $this;
    }

    public function getMusicalStyle(): ?string
    {
        return $this->musicalStyle;
    }

    public function setMusicalStyle($musicalStyle): self
    {
        $this->musicalStyle = $musicalStyle;

        return $this;
    }

    public function getIntroduction(): ?string
    {
        return $this->introduction;
    }

    public function setIntroduction($introduction): self
    {
        $this->introduction = $introduction;

        return $this;
    }
}
