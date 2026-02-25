<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\TaskRepository; // no es necesario importar el modelo, pues el repository ya hace ese trabajo

class TaskController extends AbstractController
{ //
    #[Route('/mis-tareas', name: 'app_task_list', methods: ['GET'])]

    public function TaskList(TaskRepository $repository): Response // inyección de dependencias 
    {
        $tasks = $repository->findIncomplete(); //llama a la función del repositorio
        return $this->render('task/list.html.twig', [
            'mis_tareas' => $tasks
        ]); //ESTO ES EL RESPONSE 
    }
    #[Route('/mis-tareas/{id}', name: 'app_task_show', methods: ['GET'])]
    public function get( $id, TaskRepository $repository): Response
    {
        $task = $repository->findById($id); //buscas id en entidad
        if (!$task) {
            throw $this->createNotFoundException('La tarea no existe');
        }
        return $this->render('task/show.html.twig', [
            'tarea' => $task
        ]);
    }
}
