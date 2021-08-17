<?php
namespace App\Controller;

namespace App\Controller;

use App\Entity\Site;
use App\Entity\Sortie;
use App\Form\SortieType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
<<<<<<< HEAD
     * @Route("/sortie{id}", name="sortie_detail",
     *     requirements={"id":"\d+"}
     *     method={"GET"})
=======
     * @Route("/sortie{id}", name="sortie_detail", requirements={"id":"\d+"}, methods={"GET"})
>>>>>>> e6c0f035bcb9c9c3a3cc6e35e4127df5ed741389
     */
    public function detail ($id)
    {
        $sortieRepo = $this->getDoctrine()->getRepository(site::class);
        $sortie = $sortieRepo->find($id);
        return $this->render('sortie/detail.html.twig', [
            "sortie"=>$sortie
        ]);
    }
    /**
     * @Route ("/sortie/ajouter", name="sortie_ajouter")
     */
    public function ajouter (EntityManagerInterface $em, Request $request)
    {
        $sortie = new sortie;
        $sortieForm = $this->createForm(SortieType::class, $sortie);
        # Hydratation de l'instance Sortie avec les données qui proviennent de la requête
        # On utilise handleRequest et on y passe la requête en argument
        $sortieForm->handleRequest($request);
        if($sortieForm->isSubmitted() && $sortieForm->isValid())
        {
            $em->persist($sortie);
            $em->flush();
            $this->addFlash('success', 'La sortie a bien été enregistée');
            return $this->render('sortie/ajouter.html.twig', [
                "sortieForm"=>$sortieForm->createView()
            ]);
        }
    }
}
