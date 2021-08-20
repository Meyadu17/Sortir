<?php
namespace App\DataFixtures;
<<<<<<< HEAD
=======

use App\Entity\Etat;
>>>>>>> 8b83fe78e8434dfc377ea8c16f0429e11035665d
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
<<<<<<< HEAD
class EtatFixtures extends Fixture implements DependentFixtureInterface {
=======

class EtatFixtures extends Fixture{
>>>>>>> 8b83fe78e8434dfc377ea8c16f0429e11035665d
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $etat = new Etat();
            $etat->setLibelle('Créée');
            $manager->persist($etat);
<<<<<<< HEAD
            $this->addReference('etat' . $i, $etat);
        }
        $manager->flush();
=======
            $this->addReference('etat' . $i, $etat);}
        $manager->flush();
    }

    public function getDependencies()
    {
        return [

        ];
>>>>>>> 8b83fe78e8434dfc377ea8c16f0429e11035665d
    }
    public function getDependencies()
    {
        return [
        ];
    }
}