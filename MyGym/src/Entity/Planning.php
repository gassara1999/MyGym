<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $RoomNb;

    #[ORM\Column(type: 'string', length: 100)]
    private $beginHour;

    #[ORM\Column(type: 'string', length: 100)]
    private $endHour;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Activity::class, inversedBy: 'plan')]
    private $activity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNb(): ?int
    {
        return $this->RoomNb;
    }

    public function setRoomNb(int $RoomNb): self
    {
        $this->RoomNb = $RoomNb;

        return $this;
    }

    public function getBeginHour(): ?string
    {
        return $this->beginHour;
    }

    public function setBeginHour(string $beginHour): self
    {
        $this->beginHour = $beginHour;

        return $this;
    }

    public function getEndHour(): ?string
    {
        return $this->endHour;
    }

    public function setEndHour(string $endHour): self
    {
        $this->endHour = $endHour;

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

    public function getActivity(): ?Activity
    {
        return $this->activity;
    }

    public function setActivity(?Activity $activity): self
    {
        $this->activity = $activity;

        return $this;
    }
}
