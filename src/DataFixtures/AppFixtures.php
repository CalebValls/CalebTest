<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Task;
use App\Factory\TaskFactory;
use App\Model\TaskStatusEnum;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
TaskFactory::createOne( [
    'name' => 'aprender doctrine',
    'time' => '2 dias',
    'status' => TaskStatusEnum::EMPEZADA,
]);
TaskFactory::createMany(5);
}
}
