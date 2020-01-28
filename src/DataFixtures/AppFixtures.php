<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
           $user = new User;
           $user-> setUsername( $faker->sentence($nbWords = 6, $variableNbWords = true));
           $user-> setPassword( $faker->sentence($nbWords = 6, $variableNbWords = true));
           $manager->persist($user);
        }

        $manager->flush();
    }
}
