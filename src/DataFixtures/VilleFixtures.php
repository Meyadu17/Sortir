<?php
namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
class VilleFixtures extends Fixture{
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $ville = new Ville();
            $ville->setNom('Niort' . $i);
            $ville->setCodePostal('7900' . $i);
            $manager->persist($ville);
            $this->addReference('ville' . $i, $ville);}
        $manager->flush();
    }
}