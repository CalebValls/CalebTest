<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\TaskRepository; // no es necesario importar el modelo, pues el repository ya hace ese trabajo

#[Route('/mis-tareas/api')]
class TaskApiController extends AbstractController
{

    //dena ikusteko
    #[Route('', name: 'app_task_api', methods: ['GET'])]
    public function TaskList(TaskRepository $repository): Response // inyección de dependencias 
    {
        $tasks = $repository->findAll();
        // return $this->render('task/list.html.twig', [
        //     'mis_tareas' => $tasks
        // ]); //ESTO ES EL RESPONSE 
        return  $this->json($tasks);
    }
    //soilik bat ikusteko
    #[Route('/{id<\d+>}', name: 'app_task_api_id', methods: ['GET'])] // no acepta strings 
    public function get (int $id, TaskRepository $repository) : Response
    {
        $task = $repository->find($id);
        if (!$task){
            throw $this->createNotFoundException("ERROR 404 = no tienes tareas con ese id");
        }
        return $this->json($task);
    }
    // public function myTask($id, TaskRepository $repository): Response
    // {
    //     $task = $repository->find($id);
    //     if (!$task) {
    //         throw $this->createNotFoundException('La tarea no existe');
    //     }
    //     return $this->json($task);
    // }
}
