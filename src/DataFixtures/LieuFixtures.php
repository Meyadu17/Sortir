<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $lieu = new Lieu();
            $lieu->setNom('Niort' . $i);
            $lieu->setrue($i . " allée des Cornouillers");
            $lieu->setLatitude($i . "00.0128845");
            $lieu->setLongitude($i . "00.9856758");
            $ville = $this->getReference('ville'.$i);
            $lieu->setVilles($ville);
            $manager->persist($lieu);
            $this->addReference('lieu'.$i, $lieu);}
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            VilleFixtures::class
        ];
    }
}