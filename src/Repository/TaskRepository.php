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
}
