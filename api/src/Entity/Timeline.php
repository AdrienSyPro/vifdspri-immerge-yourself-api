<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity]
class Timeline
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    private ?int $id = null;

    #[ORM\Column(type: 'datetime')]
    private DateTime $startDate;

    #[ORM\Column(type: 'datetime')]
    private DateTime $endDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    public function setStartDate(DateTime $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDate(DateTime $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDurationInMonths(): float
    {
        $diff = $this->startDate->diff($this->endDate);

        return (($diff->y * 12) + $diff->m);
    }
}
