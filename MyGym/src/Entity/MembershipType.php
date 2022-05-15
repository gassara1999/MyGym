<?php

namespace App\Entity;

use App\Repository\MembershipTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipTypeRepository::class)]
class MembershipType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $Type;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'membershipType', targetEntity: Membership::class)]
    private $price;

    public function __construct()
    {
        $this->price = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Membership>
     */
    public function getPrice(): Collection
    {
        return $this->price;
    }

    public function addPrice(Membership $price): self
    {
        if (!$this->price->contains($price)) {
            $this->price[] = $price;
            $price->setMembershipType($this);
        }

        return $this;
    }

    public function removePrice(Membership $price): self
    {
        if ($this->price->removeElement($price)) {
            // set the owning side to null (unless already changed)
            if ($price->getMembershipType() === $this) {
                $price->setMembershipType(null);
            }
        }

        return $this;
    }
}
