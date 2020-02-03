<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Emotion;


class EmotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       
           $emotion = new Emotion();
           $emotion->setName('Heureux');
           $emotion->setImagesrc('Lorem');
           $manager->persist($emotion);

           $emotion = new Emotion();
           $emotion->setName('Triste');
           $emotion->setImagesrc('Lorem');
           $manager->persist($emotion);

           $emotion = new Emotion();
           $emotion->setName('Stressé');
           $emotion->setImagesrc('Lorem');
           $manager->persist($emotion);
        
        $manager->flush();
    }
}
