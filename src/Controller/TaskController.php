<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route; // para definir la ruta
use App\Model\task;

class TaskController extends AbstractController
{
    #[Route('/mis-tareas')] // <-- URL
    public function TaskList(): Response
    {
        $tasks = [
            new Task(1, 'Limpieza', '2H'),
            new Task(2, 'Compra', '3H')
        ];
        // return $this->render('task/list.html.twig', [
        //     'mis_tareas' => $tasks
        // ]); //ESTO ES EL RESPONSE 
        return  $this->json($tasks);
    }
}
