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

    public function TaskList(EntityManagerInterface $em,TaskRepository $repository): Response // inyección de dependencias 
    {
    // $tasks = $repository->findAll();
    $tasks = $em->createQueryBuilder() // consutla sql
            ->select('t') // alias de la tabla
            ->from(Task::class, 't') // de qué entidad
            ->getQuery() //transform php to sql
            ->getResult(); //envía la consulta

        return $this->render('task/list.html.twig', [
            'mis_tareas' => $tasks
        ]); //ESTO ES EL RESPONSE 
    }
    #[Route('/mis-tareas/{id}', name: 'app_task_show', methods: ['GET'])]
    public function get(EntityManagerInterface $em,$id, TaskRepository $repository): Response
    {
        // $task = $repository->find($id);
        $task = $em->find(Task::class, $id); //buscas id en entidad
        if (!$task) {
            throw $this->createNotFoundException('La tarea no existe');
        }
        return $this->render('task/show.html.twig', [
            'tarea' => $task
        ]);
    }

}
