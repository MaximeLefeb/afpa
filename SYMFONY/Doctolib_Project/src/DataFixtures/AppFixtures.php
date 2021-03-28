<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Rdv;
use App\Entity\Patient;
use App\Entity\Praticien;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture {
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager) {
        $faker = Faker\Factory::create('fr_FR');

        $specialite = [
            "Allergologue",
            "Immunologue",
            "Anesthésiologue",
            "Andrologue",
            "Cardiologue",
            "Chirurgien",
            "Chirurgien cardiaque",
            "Chirurgien esthétique, plastique et reconstructive",
            "Chirurgien générale",
            "Chirurgien maxillo-faciale",
            "Chirurgien pédiatrique",
            "Chirurgien thoracique",
            "Chirurgien vasculaire",
            "Neurochirurgien",
            "Dermatologue",
            "Endocrinologue",
            "Gastro-entérologue",
            "Gériatre",
            "Gynécologue",
            "Hématologue",
            "Hépatologue",
            "Infectiologue",
            "Néonatologue",
            "Néphrologue",
            "Neurologue",
            "Odontologue",
            "Oncologue",
            "Obstétrique",
            "Ophtalmologue",
            "Orthopédiste",
            "Oto-rhino-laryngologue",
            "Pédiatre",
            "Pneumologue",
            "Psychiatre",
            "Radiologue",
            "Radiothérapeute",
            "Rhumatologue",
            "Urologue",
        ];

        //* CREATE PATIENTS
        for($i=0; $i <= 100; $i++) {
            $patient = new Patient();

            $patient
                ->setNom(
                    $faker->lastname(null)
                )
                ->setPrenom(
                    $faker->firstName()
                )
                ->setRoles(
                    ["ROLE_USER"]
                )
                ->setAge(
                    random_int(11, 90)
                )
                ->setEmail(
                    $faker->unique()->email
                )
                ->setPassword(
                    $this->encoder->encodePassword($patient, "Patient-$i")
                )
            ;
            $manager->persist($patient);
        }

        //* CREATE PRATICIENS
        for($i=0; $i <= 50; $i++) {
            $praticien = new Praticien();

            $praticien
                ->setNom(
                    $faker->lastname(null)
                )
                ->setPrenom(
                    $faker->firstName()
                )
                ->setRoles(
                    ["ROLE_USER"]
                )
                ->setSpecialite(
                    $faker->randomElement($specialite),
                )
                ->setEmail(
                    $faker->unique()->email
                )
                ->setPassword(
                    $this->encoder->encodePassword($praticien, "Praticien-$i")
                )
            ;
            $manager->persist($praticien);
        }

        //* CREATE USER WITH RDV
        for ($i=0; $i <= 9 ; $i++) { 
            $rdv              = new Rdv();
            $patientWithRdv   = new Patient();
            $praticienWithRdv = new Praticien();

            $patientWithRdv
                ->setNom(
                    $faker->lastname(null)
                )
                ->setPrenom(
                    $faker->firstName()
                )
                ->setRoles(
                    ["ROLE_USER"]
                )
                ->setAge(
                    random_int(11, 90)
                )
                ->setEmail(
                    $faker->unique()->email
                )
                ->setPassword(
                    $this->encoder->encodePassword($patientWithRdv, "pRdv1!")
                )
            ;

            $praticienWithRdv
                ->setNom(
                    $faker->lastname(null)
                )
                ->setPrenom(
                    $faker->firstName()
                )
                ->setRoles(
                    ["ROLE_USER"]
                )
                ->setSpecialite(
                    $faker->randomElement($specialite),
                )
                ->setEmail(
                    $faker->unique()->email
                )
                ->setPassword(
                    $this->encoder->encodePassword($praticienWithRdv, "prRdv1!")
                )
            ;

            $rdv
                ->setDateRdv(
                    $faker->dateTime($max = 'now', $timezone = null)
                )
                ->setAdresse(
                    $faker->address()
                )
                ->setPatient(
                    $patientWithRdv
                )
                ->setPraticien(
                    $praticienWithRdv
                )
            ;

            $manager->persist($patientWithRdv);
            $manager->persist($praticienWithRdv);
            $manager->persist($rdv);
        }

        //* CREATE AN ADMIN
        for ($i=0; $i <= 0 ; $i++) { 
            $admin = new Praticien();

            $admin
                ->setNom(
                    "Lefebvre"
                )
                ->setPrenom(
                    "Maxime"
                )
                ->setRoles(
                    ["ROLE_ADMIN"]
                )
                ->setSpecialite(
                    "Administrateur",
                )
                ->setEmail(
                    "lefebvremaximee@gmail.com"
                )
                ->setPassword(
                    $this->encoder->encodePassword($admin, "Internet1!")
                )
            ;
            $manager->persist($admin);
        }

        $manager->flush();
    }
}
