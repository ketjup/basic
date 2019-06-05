<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExtrasRepository")
 */
class Extras
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $omschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $meerprijs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\room", inversedBy="extras")
     */
    private $kamerid;

    public function __construct()
    {
        $this->kamerid = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): self
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    public function getMeerprijs(): ?int
    {
        return $this->meerprijs;
    }

    public function setMeerprijs(int $meerprijs): self
    {
        $this->meerprijs = $meerprijs;

        return $this;
    }

    /**
     * @return Collection|room[]
     */
    public function getKamerid(): Collection
    {
        return $this->kamerid;
    }

    public function addKamerid(room $kamerid): self
    {
        if (!$this->kamerid->contains($kamerid)) {
            $this->kamerid[] = $kamerid;
        }

        return $this;
    }

    public function removeKamerid(room $kamerid): self
    {
        if ($this->kamerid->contains($kamerid)) {
            $this->kamerid->removeElement($kamerid);
        }

        return $this;
    }
}
