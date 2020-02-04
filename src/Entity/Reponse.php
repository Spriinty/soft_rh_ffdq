<?php

namespace App\Entity;

use App\Entity\Service;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Emotion", inversedBy="reponses")
     */
    private $emotion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="reponses")
     */
    private $service;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;



    public function __construct()
    {
    
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

    public function getEmotion(): ?Emotion
    {
        return $this->emotion;
    }

    public function setEmotion(?Emotion $emotion): self
    {
        $this->emotion = $emotion;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

   
}
