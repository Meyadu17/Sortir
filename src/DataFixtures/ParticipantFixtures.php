<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EatFixtures extends Fixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $etat = new Etat();
            $etat->setLibelle('Créée');
            $manager->persist($etat);

            $this->addReference('etat' . $i, $etat);
        }

        $manager->flush();
    }
}