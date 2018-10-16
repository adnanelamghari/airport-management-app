<?php

namespace App\Controller;

use App\Entity\Airplane;
use App\Form\AirplaneType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AirplanesController extends AbstractController
{
    /**
     * @Route("/airplanes", name="airplanes")
     */
    public function airplanes(Request $request, ObjectManager $entityManager)
    {
        $airplane = new Airplane();
        $form = $this->createForm(AirplaneType::class, $airplane);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($airplane);
            $entityManager->flush();
        }
        $repository = $this->getDoctrine()->getRepository(Airplane::class);
        $airplanes = $repository->findAll();
        return $this->render('airplanes/airplanes.html.twig', [
            'controller_name' => 'AirplanesController',
            'airplanes' => $airplanes,
            'form' => $form->createView(),
        ]);
    }
}
