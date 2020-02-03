<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
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
    private $namereponse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Emotion", mappedBy="reponse")
     */
    private $emotion;

    public function __construct()
    {
        $this->emotions = new ArrayCollection();
        $this->emotion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNamereponse(): ?string
    {
        return $this->namereponse;
    }

    public function setNamereponse(?string $namereponse): self
    {
        $this->namereponse = $namereponse;

        return $this;
    }

}
