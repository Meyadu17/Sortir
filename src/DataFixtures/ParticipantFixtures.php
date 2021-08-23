<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {

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
            $site = $this->getReference('site' . $i);
            $participant->setSites($site);
            $manager->persist($participant);
            $this->addReference('participant' . $i, $participant);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            SiteFixtures::class
        ];
    }
}