<?php
namespace App\DataFixtures;
use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class EtatFixtures extends Fixture{
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