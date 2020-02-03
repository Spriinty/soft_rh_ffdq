<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Emotion;
use App\Entity\Service;
use App\Repository\ServiceRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AppFixtures extends Fixture
{
    private $passwordEncoder;
    private $serviceRepository;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, ServiceRepository $serviceRepository)
     {
         $this->passwordEncoder = $passwordEncoder;
         $this->serviceRepository = $serviceRepository;
     }

     public function load(ObjectManager $manager){

        $this->service($manager);
        $this->emotion($manager);
        $this->user($manager); 
     }

    public function user(ObjectManager $manager)
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
           $service=$this->serviceRepository->find($faker->numberBetween($min = 2, $max = 5 ));
            $service->addUser($user);
            $manager->persist($service);
            
        }

        $admin = new User();
        $admin-> setUsername('admin'); 
        $admin-> setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            '4567'
        ));
        $manager->persist($admin);
        $service=$this->serviceRepository->find(1);
        $service->addUser($admin);
        $manager->persist($admin);

        $manager->flush();
    }

    public function emotion(ObjectManager $manager)
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

    public function service(ObjectManager $manager)
    {
       
           $service = new Service();
           $service->setNom('RH');
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

           $service = new Service();
           $service->setNom('Service5');
           $manager->persist($service);
        
        $manager->flush();
    }
}