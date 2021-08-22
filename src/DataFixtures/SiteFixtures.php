<?php

namespace App\DataFixtures;

use App\Entity\Site;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SiteFixtures extends Fixture{
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $site = new Site();
            $site->setNom('Niort' . $i);
            $manager->persist($site);
            $sites[] = $site;
            $this->addReference('site' . $i, $site);}
        $manager->flush();
    }
}