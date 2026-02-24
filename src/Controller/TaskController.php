<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TaskRepository; // no es necesario importar el modelo, pues el repository ya hace ese trabajo

class TaskController extends AbstractController
{ //
    #[Route('/mis-tareas', name: 'app_task_list', methods: ['GET'])]

    public function TaskList(TaskRepository $repository): Response // inyección de dependencias 
    {
        $tasks = $repository->findAll();
        return $this->render('task/list.html.twig', [
            'mis_tareas' => $tasks
        ]); //ESTO ES EL RESPONSE 
    }

    #[Route('/mis-tareas/{id}', name: 'app_task_show', methods: ['GET'])]
    public function get($id, TaskRepository $repository): Response
    {
        $task = $repository->find($id);
        if (!$task) {
            throw $this->createNotFoundException('La tarea no existe');
        }
        return $this->render('task/show.html.twig', [
            'tarea' => $task
        ]);
    }

}
