<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\Sortie;
use App\Entity\Lieu;
use App\Form\SortieType;
use App\Form\LieuType;

use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;

use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Manage Location
 * Class LocationController
 * @package App\Controller
 */
class LieuController extends AbstractController
{

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @Route("/location/add", name="location_add", methods={"POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function add(Request $request, EntityManagerInterface $em)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $response = array("ok" => true, "response" => $this);

        try {
            $lieu = new lieu();
            $lieuForm = $this->createForm(LieuType::class, $lieu);
            $lieuForm->handleRequest($request);

            if ($lieuForm->isSubmitted() && $lieuForm->isValid()) {
                $em->persist($lieu);
                $em->flush();

                $response["location"] = array($lieu->getId(), $lieu->getName());
            } else {
                throw new InvalidCsrfTokenException($this);
            }
        } catch (Exception $e) {
            $response["ok"] = false;
            $response["response"] = $e->getMessage();
        }

        return new JsonResponse($response);
    }
}