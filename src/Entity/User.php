<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
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
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Service", inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $service;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HasVoted", mappedBy="users", orphanRemoval=true)
     */
    private $hasVoteds;

    public function __construct()
    {
        $this->hasVoteds = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
    * @see UserInterface
    */
    public function getSalt()
    {

    }

    /**
    * @see UserInterface
    */
    public function eraseCredentials()
    {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
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

    /**
     * @return Collection|HasVoted[]
     */
    public function getHasVoteds(): Collection
    {
        return $this->hasVoteds;
    }

    public function addHasVoted(HasVoted $hasVoted): self
    {
        if (!$this->hasVoteds->contains($hasVoted)) {
            $this->hasVoteds[] = $hasVoted;
            $hasVoted->setUsers($this);
        }

        return $this;
    }

    public function removeHasVoted(HasVoted $hasVoted): self
    {
        if ($this->hasVoteds->contains($hasVoted)) {
            $this->hasVoteds->removeElement($hasVoted);
            // set the owning side to null (unless already changed)
            if ($hasVoted->getUsers() === $this) {
                $hasVoted->setUsers(null);
            }
        }

        return $this;
    }

}
