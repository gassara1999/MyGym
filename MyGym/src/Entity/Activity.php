<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $ActivityName;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: Planning::class)]
    private $plan;

    public function __construct()
    {
        $this->plan = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivityName(): ?string
    {
        return $this->ActivityName;
    }

    public function setActivityName(string $ActivityName): self
    {
        $this->ActivityName = $ActivityName;

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
     * @return Collection<int, Planning>
     */
    public function getPlan(): Collection
    {
        return $this->plan;
    }

    public function addPlan(Planning $plan): self
    {
        if (!$this->plan->contains($plan)) {
            $this->plan[] = $plan;
            $plan->setActivity($this);
        }

        return $this;
    }

    public function removePlan(Planning $plan): self
    {
        if ($this->plan->removeElement($plan)) {
            // set the owning side to null (unless already changed)
            if ($plan->getActivity() === $this) {
                $plan->setActivity(null);
            }
        }

        return $this;
    }
}
