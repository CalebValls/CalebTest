<?php

namespace App\Model;

class task
{
    //eraikitzailea
    public function __construct(
        private int $id,
        private string $name,
        private string $time,
        private TaskStatusEnum $status,
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
    public function getStatus(): TaskStatusEnum
    {
        return $this->status;
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

    public function setStatus(TaskStatusEnum $status): void
    {
        $this->status = $status;
    }
}
