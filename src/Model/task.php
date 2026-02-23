<?php

namespace App\Model;

class task
{
    //eraikitzailea
    public function __construct(
        private int $id,
        private string $name,
        private string $time,
    ) {}
    // GETTERS
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTime(): string
    {
        return $this->time;
    }
    //SETTERS
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setTime(string $time): void
    {
        $this->time = $time;
    }
}
