<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Service;


class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
           $service = new Service();
           $service->setNom('Service1');
           $manager->persist($service);

           $service = new Service();
           $service->setNom('Service2');
           $manager->persist($service);

           $service = new Service();
           $service->setNom('Service3');
           $manager->persist($service);

           $service = new Service();
           $service->setNom('Service4');
           $manager->persist($service);
        
        $manager->flush();
    }
}
