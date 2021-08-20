<?php
namespace App\DataFixtures;
<<<<<<< HEAD
use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class EtatFixtures extends Fixture{
=======

use App\Entity\Etat;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture{

>>>>>>> 21cb3a9fc5df7a5eb42c5bb8f9565ff08ca18754
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $etat = new Etat();
            $etat->setLibelle('Créée');
            $manager->persist($etat);
<<<<<<< HEAD
=======

>>>>>>> 21cb3a9fc5df7a5eb42c5bb8f9565ff08ca18754
            $this->addReference('etat' . $i, $etat);
        }
        $manager->flush();
    }
}