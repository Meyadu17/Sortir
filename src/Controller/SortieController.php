<?php
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
     * @Route("/sortie{id}", name="sortie_detail", requirements={"id":"\d+"}, methods={"GET"})
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
     * @Route ("/ajouter", name="sortie_ajouter")
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
            return $this->redirectToRoute('sortie_detail', [
                'id'=>$sortie->getId()
            ]);
        }
        return $this->render('sortie/ajouter.html.twig', [
            "sortieForm"=>$sortieForm->createView()
        ]);
    }
}
