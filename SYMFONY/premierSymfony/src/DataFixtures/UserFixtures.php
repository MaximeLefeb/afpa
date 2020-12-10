<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture {
    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $em) {
        $faker = \Faker\Factory::create('fr_FR');
        
        for ($i=0; $i < 50; $i++) { 
            $user = new User();
            $user->setEmail($faker->email)
                    ->setPassword($this->passwordEncoder->encodePassword($user, $i.$i.$i.$i));

            $em->persist($user);
        }
        $em->flush();
    }
}
