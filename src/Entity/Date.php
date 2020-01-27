<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DateRepository")
 */
class Date
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $currentdate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrentdate(): ?\DateTimeInterface
    {
        return $this->currentdate;
    }

    public function setCurrentdate(\DateTimeInterface $currentdate): self
    {
        $this->currentdate = $currentdate;

        return $this;
    }
}
