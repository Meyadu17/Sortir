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

        #Instanciation de l'objet "profil"
        $profil = new Participant();


        #La date de creation doit être remplis automatiquement
        #$profil->setDateCreated(new  \DateTime());

        $profilForm = $this->createForm(ProfilType::class, $profil);


        #Hydratation de l'instance de Profil avec les données qui proviennent de la requête
        #On utilise handleRequest et on y passe la requête en argument
        $profilForm->handleRequest($request);
        if($profilForm->isSubmitted() && $profilForm->isValid())
        {
            $em->persist($profil);
            $em->flush();

            $this->addFlash('success', 'Le profil a bien été modifié');
            return $this->redirectToRoute('accueil', [
                'id'=>$profil->getId()
            ]);
        }
        return $this->render('profil/monProfil.html.twig', [
            "profilForm" => $profilForm->createView()
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