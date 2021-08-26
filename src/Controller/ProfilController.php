<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="mon_profil")
     */
    public function monProfil(EntityManagerInterface $em, Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        //Creation de l'instance utilisateur
        /** @var Participant $participant */
        $participant = $this->getUser();
        //On associe le formulaire du profil à l'instance du profile que l'on modifie
        $profilForm = $this->createForm(ProfilType::class, $participant);

        //Hydratation de l'instance de Profil avec les données qui proviennent de la requête
        //On utilise handleRequest et on y passe la requête en argument
        $profilForm->handleRequest($request);
        if($profilForm->isSubmitted() && $profilForm->isValid())
        {
            $participant->setMotDePasse($passwordHasher->hashPassword(
                $participant, $participant->getMotDePasse()
            ));
            $em->persist($participant);
            $em->flush();

            $this->addFlash('success', 'Le profil a bien été modifié');
            return $this->redirectToRoute('accueil', [
                'id'=>$participant->getId()
            ]);
        }
        return $this->render('profil/monProfil.html.twig', [
            'profilForm' => $profilForm->createView(),
            'participant' => $participant
        ]);
    }

    /**
     * @Route("/profil{id}", name="profil_detail",
     *     requirements={"id":"\d+"},
     *     methods={"GET"})
     */
    public function detail($id)
    {
        $participantRepo = $this->getDoctrine()->getRepository(Participant::class);
        $participant = $participantRepo->find($id);
        return $this->render('profil/AfficherProfil.html.twig', [
            "participant" => $participant
        ]);
    }
}