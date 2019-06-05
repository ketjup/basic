<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BetaalRepository")
 */
class betaal
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
    private $soort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rekening;

    /**
     * @ORM\Column(type="datetime")
     */
    private $betaaldate;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Book", mappedBy="betaalid", cascade={"persist", "remove"})
     */
    private $userid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getRekening(): ?string
    {
        return $this->rekening;
    }

    public function setRekening(string $rekening): self
    {
        $this->rekening = $rekening;

        return $this;
    }

    public function getBetaaldate(): ?\DateTimeInterface
    {
        return $this->betaaldate;
    }

    public function setBetaaldate(\DateTimeInterface $betaaldate): self
    {
        $this->betaaldate = $betaaldate;

        return $this;
    }

    public function getUserid(): ?Book
    {
        return $this->userid;
    }

    public function setUserid(Book $userid): self
    {
        $this->userid = $userid;

        // set the owning side of the relation if necessary
        if ($this !== $userid->getBetaalid()) {
            $userid->setBetaalid($this);
        }

        return $this;
    }
}
