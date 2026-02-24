<?php

namespace App\Repository;

use App\Model\task;
use App\Model\TaskStatusEnum;

class TaskRepository
{
    public function findAll(): array
    {
        return [
            new Task(1, 'Limpieza', '2H',TaskStatusEnum::SIN_EMPEZAR),
            new Task(2, 'Compra', '3H', TaskStatusEnum::EMPEZADA)
        ];
    }

    public function find(int $id): ?Task // mira el id del task
    {
        foreach ($this->findAll() as $task) { // mira en todos
            if ($task->getId() === $id) { // pero solo coge el que es igual, usa getter del modelo
                return $task; // lo devuelve
            }
        }
        return null;
    }
}
