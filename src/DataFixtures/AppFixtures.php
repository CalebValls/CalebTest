<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Task;
use App\Model\TaskStatusEnum;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // task1
        $task1 = new Task();
        $task1 -> setName('aprender doctrine');
        $task1 -> setTime('2 dias');
        $task1 -> setStatus(TaskStatusEnum:: EMPEZADA);
        $manager -> persist($task1);

        $task2 = new Task();
        $task2 -> setName('aprender bases');
        $task2 -> setTime('1 dia');
        $task2 -> setStatus(TaskStatusEnum:: TERMINADA);
        $manager -> persist($task2);

        $manager->flush();
    }
}
