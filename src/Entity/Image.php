<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
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
    private $imagefile;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\room", inversedBy="images")
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

    public function getImagefile(): ?string
    {
        return $this->imagefile;
    }

    public function setImagefile(string $imagefile): self
    {
        $this->imagefile = $imagefile;

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
