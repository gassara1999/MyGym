<?php

namespace App\Entity;

use App\Repository\PrivateCoachingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrivateCoachingRepository::class)]
class PrivateCoaching
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $DateSession;

    #[ORM\Column(type: 'string', length: 100)]
    private $beginHour;

    #[ORM\Column(type: 'string', length: 100)]
    private $EndHour;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'PrivateCoaching')]
    private $Client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSession(): ?\DateTimeInterface
    {
        return $this->DateSession;
    }

    public function setDateSession(\DateTimeInterface $DateSession): self
    {
        $this->DateSession = $DateSession;

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
        return $this->EndHour;
    }

    public function setEndHour(string $EndHour): self
    {
        $this->EndHour = $EndHour;

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

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): self
    {
        $this->Client = $Client;

        return $this;
    }
}
