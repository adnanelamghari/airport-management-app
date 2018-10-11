<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FlightRepository")
 */
class Flight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="date")
     */
    private $arrivalDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrival;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departure;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pilote;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="passengerFlights")
     */
    private $passengers;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Airplane")
     * @ORM\JoinColumn(nullable=false)
     */
    private $airplane;

    public function __construct()
    {
        $this->passengers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getArrival(): ?string
    {
        return $this->arrival;
    }

    public function setArrival(string $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getDeparture(): ?string
    {
        return $this->departure;
    }

    public function setDeparture(string $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getPilote(): ?User
    {
        return $this->pilote;
    }

    public function setPilote(?User $pilote): self
    {
        $this->pilote = $pilote;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPassengers(): Collection
    {
        return $this->passengers;
    }

    public function addPassenger(User $passenger): self
    {
        if (!$this->passengers->contains($passenger)) {
            $this->passengers[] = $passenger;
        }

        return $this;
    }

    public function removePassenger(User $passenger): self
    {
        if ($this->passengers->contains($passenger)) {
            $this->passengers->removeElement($passenger);
        }

        return $this;
    }

    public function getAirplane(): ?Airplane
    {
        return $this->airplane;
    }

    public function setAirplane(?Airplane $airplane): self
    {
        $this->airplane = $airplane;

        return $this;
    }

}
