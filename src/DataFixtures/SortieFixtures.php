<?php
namespace App\DataFixtures;
<<<<<<< HEAD
use App\Entity\Sortie;
=======

use App\Entity\Sortie;

>>>>>>> 21cb3a9fc5df7a5eb42c5bb8f9565ff08ca18754
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
            $participant = $this->getReference('participant'.$i);
            $sortie->setOrganisateur($participant);
            $site = $this->getReference('site'.$i);
            $sortie->setSites($site);
            $lieu = $this->getReference('lieu'.$i);
            $sortie->setLieux($lieu);
            $etat = $this->getReference('etat'.$i);
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
            EtatFixtures::class
        ];
    }
}