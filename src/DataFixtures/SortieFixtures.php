<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SortieFixtures extends Fixture implements DependentFixtureInterface {
    public function load(ObjectManager $manager){
        for ($i = 0; $i < 10; $i++) {
            $sortie = new Sortie();
            $sortie->setNom('Futuroscope');
            $sortie->setDuree('2');
            $dateLimiteInscription = new \DateTime('now');
            $sortie->setDateLimiteInscription($dateLimiteInscription);
            $sortie->setInfosSortie('info d\'une sortie');
            $sortie->setOrganisateur($participant);
            $sortie->setSites($site);
            $sortie->setLieux($lieu);
            $sortie->setEtats($etat);
            $setDateHeureDebut = new \DateTime('today');
            $sortie->setDateHeureDebut($setDateHeureDebut);
            $sortie->setNbInscriptionsMax('2');
            $manager->persist($sortie);

            $this->addReference('sortie'.$i, $sortie);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            ParticipantFixtures::class,
            SiteFixtures::class,
            LieuFixtures::class,
            EtatFIxtures::class
        ];
    }
}