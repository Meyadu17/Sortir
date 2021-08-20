<?php

namespace App\DataFixtures;

use App\Entity\;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 20; $i++) {
            $lieu = new Lieu();
            $lieu->setNom('Nom ' . $i);
            $lieu->setrue($i . " allée des Cornouillers");
            $lieu->setLatitude($i . "00.0128845");
            $lieu->setLongitude($i . "00.9856758");

            $manager->persist($lieu);
        }
        $manager->flush();
    }
}
