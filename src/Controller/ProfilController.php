<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="mon_profil")
     */
    public function monProfil(EntityManagerInterface $em, Request $request)
    {
        #Creation de l'instance utilisateur
        $participant = $this->getUser();
        #
        $profilForm = $this->createForm(ProfilType::class, $participant);

        #Hydratation de l'instance de Profil avec les données qui proviennent de la requête
        #On utilise handleRequest et on y passe la requête en argument
        $profilForm->handleRequest($request);
        if($profilForm->isSubmitted() && $profilForm->isValid())
        {
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
     * @Route("/profil.php?ID={id}", name="profil_detail", requirements={"id":"\d+"}, methods={"GET"})
     */
    public function afficherProfil()
    {
        return $this->render("profil/profil.html.twig");
    }
}