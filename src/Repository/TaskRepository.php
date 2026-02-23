<?php

namespace App\Repository;

use App\Model\task;

class TaskRepository
{
    public function findAll(): array
    {
        return [
            new Task(1, 'Limpieza', '2H'),
            new Task(2, 'Compra', '3H')
        ];
    }

public function find(int $id): ?Task // mira el id del task
    {
        foreach ($this->findAll() as $task) {// mira en todos
            if ($task->getId() === $id) { // pero solo coge el que es igual
                return $task;// lo devuelve
            }
        }
        return null;
    }
}
