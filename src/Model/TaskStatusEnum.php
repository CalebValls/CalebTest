<?php

namespace App\Model;

enum TaskStatusEnum: string 
{
    case EMPEZADA = 'empezada';
    case SIN_EMPEZAR  = 'sin empezar';
    case TERMINADA = 'terminada';

}