<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $comedy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $action;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $fantastic;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComedy(): ?bool
    {
        return $this->comedy;
    }

    public function setComedy(?bool $comedy): self
    {
        $this->comedy = $comedy;

        return $this;
    }

    public function getAction(): ?bool
    {
        return $this->action;
    }

    public function setAction(?bool $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getFantastic(): ?bool
    {
        return $this->fantastic;
    }

    public function setFantastic(?bool $fantastic): self
    {
        $this->fantastic = $fantastic;

        return $this;
    }
}
