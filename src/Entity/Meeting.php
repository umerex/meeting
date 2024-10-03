<?php

namespace App\Entity;

use App\Repository\MeetingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MeetingRepository::class)]
class Meeting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $startDateTime = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $endDateTime = null;

    #[ORM\Column(nullable: true)]
    private ?bool $recurring = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $recurrence_type = null;

    #[ORM\Column(nullable: true)]
    private ?array $daysOfWeek = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getStartDateTime(): ?\DateTimeInterface
    {
        return $this->startDateTime;
    }

    public function setStartDateTime(\DateTimeInterface $startDateTime): static
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    public function getEndDateTime(): ?\DateTimeInterface
    {
        return $this->endDateTime;
    }

    public function setEndDateTime(\DateTimeInterface $endDateTime): static
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    public function isRecurring(): ?bool
    {
        return $this->recurring;
    }

    public function setRecurring(?bool $recurring): static
    {
        $this->recurring = $recurring;

        return $this;
    }

    public function getRecurrenceType(): ?string
    {
        return $this->recurrence_type;
    }

    public function setRecurrenceType(?string $recurrence_type): static
    {
        $this->recurrence_type = $recurrence_type;

        return $this;
    }

    public function getDaysOfWeek(): ?array
    {
        return $this->daysOfWeek;
    }

    public function setDaysOfWeek(?array $daysOfWeek): static
    {
        $this->daysOfWeek = $daysOfWeek;

        return $this;
    }
}
