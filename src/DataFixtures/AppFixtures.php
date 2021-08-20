<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use App\Entity\Site;
use App\Entity\Etat;
use App\Entity\Sortie;
use App\Entity\Lieu;
use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $sites = [];
        for ($i = 0; $i < 10; $i++) {
            $ville = new Ville();
            $ville->setNom('Niort' . $i);
            $ville->setCodePostal('7900' . $i);
            $manager->persist($ville);
        }
        for ($i = 0; $i < 10; $i++) {
            $lieu = new Lieu();
            $lieu->setNom('Niort' . $i);
            $lieu->setrue($i . " allée des Cornouillers");
            $lieu->setLatitude($i . "00.0128845");
            $lieu->setLongitude($i . "00.9856758");
            $lieu->setVilles($ville);
            $manager->persist($lieu);
        }
        for ($i = 0; $i < 10; $i++) {
            $site = new Site();
            $site->setNom('Niort' . $i);
            $manager->persist($site);
            $sites[] = $site;
        }
        for ($i = 0; $i < 10; $i++) {
            $participant = new Participant();
            $participant->setnom('jolan' . $i);
            $participant->setprenom('VANDENBROUCQUE' . $i);
            $participant->settelephone('01 23 45 67 8' . $i);
            $participant->setmail($i . 'j.vandenbroucque@campus-eni.fr');
            $participant->setadministrateur(mt_rand(0, 1));
            $participant->setactif(mt_rand(0, 1));
            $participant->setpseudo('toto' . $i);
            $participant->setMotDePasse('tata' . $i);
            $participant->setSites($sites[$i]);
            $manager->persist($participant);
        }
        for ($i = 0; $i < 10; $i++) {
            $etat = new Etat();
            $etat->setLibelle('Créée');
            $manager->persist($etat);
        }
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
        }
        $manager->flush();
    }
}

