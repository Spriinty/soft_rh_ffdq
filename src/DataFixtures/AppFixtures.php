<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
           $user = new User;
           $user-> setUsername( $faker->word);
           $user-> setRoles(['ROLE_USER']);
           $user->setPassword($this->passwordEncoder->encodePassword(
               $user,
               '1234'
           ));
           $manager->persist($user);
        }

        $admin = new User();
        $admin-> setUsername('admin'); 
        $admin-> setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            '4567'
        ));
        $manager->persist($admin);

        $manager->flush();
    }
}