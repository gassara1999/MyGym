<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $ClientName;

    #[ORM\Column(type: 'string', length: 100)]
    private $mail;

    #[ORM\Column(type: 'integer')]
    private $phone;

    #[ORM\Column(type: 'date')]
    private $birthday;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Membership::class)]
    private $memberships;

    #[ORM\OneToMany(mappedBy: 'ClientName', targetEntity: PrivateCoaching::class)]
    private $PrivateCoaching;

    public function __construct()
    {
        $this->memberships = new ArrayCollection();
        $this->PrivateCoaching = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientName(): ?string
    {
        return $this->ClientName;
    }

    public function setClientName(string $ClientName): self
    {
        $this->ClientName = $ClientName;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return Collection<int, Membership>
     */
    public function getMemberships(): Collection
    {
        return $this->memberships;
    }

    public function addMembership(Membership $membership): self
    {
        if (!$this->memberships->contains($membership)) {
            $this->memberships[] = $membership;
            $membership->setClient($this);
        }

        return $this;
    }

    public function removeMembership(Membership $membership): self
    {
        if ($this->memberships->removeElement($membership)) {
            // set the owning side to null (unless already changed)
            if ($membership->getClient() === $this) {
                $membership->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PrivateCoaching>
     */
    public function getPrivateCoaching(): Collection
    {
        return $this->PrivateCoaching;
    }

    public function addPrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if (!$this->PrivateCoaching->contains($privateCoaching)) {
            $this->PrivateCoaching[] = $privateCoaching;
            $privateCoaching->setClientName($this);
        }

        return $this;
    }

    public function removePrivateCoaching(PrivateCoaching $privateCoaching): self
    {
        if ($this->PrivateCoaching->removeElement($privateCoaching)) {
            // set the owning side to null (unless already changed)
            if ($privateCoaching->getClientName() === $this) {
                $privateCoaching->setClientName(null);
            }
        }

        return $this;
    }
}
