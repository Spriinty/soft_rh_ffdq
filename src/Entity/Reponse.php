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
     * @ORM\ManyToOne(targetEntity="App\Entity\Emotion", inversedBy="reponses")
     */
    private $emotion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="reponses")
     */
    private $service;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="date" , nullable=true)
     */
    private $newdate;



    public function __construct()
    {
    
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNewdate(): ?\DateTimeInterface
    {
        return $this->newdate;
    }

    public function setNewdate(\DateTimeInterface $newdate): self
    {
        $this->newdate = $newdate;

        return $this;
    }
}
