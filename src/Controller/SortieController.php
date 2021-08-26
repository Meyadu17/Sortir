<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Entity\Lieu;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sortie{id}", name="sortie_detail",
     *     requirements={"id":"\d+"},
     *     methods={"GET"})
     */
    public function detail($id)
    {
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $lieuRepo = $this->getDoctrine()->getRepository(Lieu::class);
        $sortie = $sortieRepo->find($id);
        $lieu = $lieuRepo->find($id);
        return $this->render('sortie/afficher.html.twig', [
            "sortie" => $sortie,
            "lieu" => $lieu
        ]);
    }

    /**
     * @Route ("/ajouter", name="sortie_ajouter")
     */
    public function ajouter(EntityManagerInterface $em, Request $request)
    {
        $sortie = new sortie;

        $lieuRepo = $this->getDoctrine()->getRepository(Lieu::class);
        $lieux = $lieuRepo->findAll();

        $sortieForm = $this->createForm(SortieType::class, $sortie);
        # Hydratation de l'instance Sortie avec les données qui proviennent de la requête
        # On utilise handleRequest et on y passe la requête en argument
        $sortieForm->handleRequest($request);

        #Vérification des informations mises dans le formulaire
        if ($sortieForm->isSubmitted() && $sortieForm->isValid()) {
            try {
                $sortie->setOrganisateur($this->getOrganisateur());
                $sortie->setSites($this->getParticipants()->getSites());

                $em->persist($sortie);
                $em->flush();
                $this->addFlash('success', 'La sortie a bien été enregistée');
                return $this->redirectToRoute('sortie_detail', [
                    'id' => $sortie->getId()
                ]);
            } catch (Exception $e) {
                $this->addFlash("danger", $this);
            }
        }
        return $this->render('sortie/ajouter.html.twig', [
            "sortieForm" => $sortieForm->createView(),
        ]);
    }

    /**
     * @Route("/sortie{id}/annuler", name="sortie_annuler",
     *     requirements={"id":"\d+"},
     *     methods={"GET"})
     */
    public function annuler($id)
    {
        $sortieRepo = $this->getDoctrine()->getRepository(Sortie::class);
        $lieuRepo = $this->getDoctrine()->getRepository(Lieu::class);
        $sortie = $sortieRepo->find($id);
        $lieu = $lieuRepo->find($id);
        return $this->render('sortie/afficher.html.twig', [
            "sortie" => $sortie,
            "lieu" => $lieu
        ]);
    }

//    /**
//     * @Route("/sortie{id}/modifier", name="sortie_modifier",
//     *     requirements={"id":"\d+"},
//     *     methods={"GET"})
//     */
//    public function modifier($id)
//    {
//        $participantRepo = $this->getDoctrine()->getRepository(Participant::class);
//        $participant = $participantRepo->find($id);
//        return $this->render('profil/AfficherProfil.html.twig', [
//            "participant" => $participant
//        ]);
//    }
}
