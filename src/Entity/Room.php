<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $naam;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_personen;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aantal_bedden;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $baby_bed;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Book", mappedBy="room")
     */
    private $books;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Image", mappedBy="kamerid")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Extras", mappedBy="kamerid")
     */
    private $extras;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->extras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(?string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getMaxPersonen(): ?int
    {
        return $this->max_personen;
    }

    public function setMaxPersonen(?int $max_personen): self
    {
        $this->max_personen = $max_personen;

        return $this;
    }

    public function getAantalBedden(): ?int
    {
        return $this->aantal_bedden;
    }

    public function setAantalBedden(?int $aantal_bedden): self
    {
        $this->aantal_bedden = $aantal_bedden;

        return $this;
    }

    public function getBabyBed(): ?bool
    {
        return $this->baby_bed;
    }

    public function setBabyBed(?bool $baby_bed): self
    {
        $this->baby_bed = $baby_bed;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setRoom($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getRoom() === $this) {
                $book->setRoom(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return strval($this->getId());
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->addKamerid($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            $image->removeKamerid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Extras[]
     */
    public function getExtras(): Collection
    {
        return $this->extras;
    }

    public function addExtra(Extras $extra): self
    {
        if (!$this->extras->contains($extra)) {
            $this->extras[] = $extra;
            $extra->addKamerid($this);
        }

        return $this;
    }

    public function removeExtra(Extras $extra): self
    {
        if ($this->extras->contains($extra)) {
            $this->extras->removeElement($extra);
            $extra->removeKamerid($this);
        }

        return $this;
    }
}
