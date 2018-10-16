<?php

namespace App\Controller;

use App\Entity\Flight;
use App\Entity\User;
use App\Form\FlightType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FlightsController extends AbstractController
{
    /**
     * @Route("/flights", name="flights")
     */
    public function flights()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $currentUser = $repository->find($this->getUser()->getId());
        return $this->render('flights/flights.html.twig', [
            'controller_name' => 'My flights',
            'user' => $currentUser,
            'flights' => $currentUser->getFlights(),
        ]);
    }

    /**
     * @Route("/flight/{idFlight}", name="flight")
     */
    public function flight($idFlight)
    {
        $repository = $this->getDoctrine()->getRepository(Flight::class);
        $flight = $repository->find($idFlight);
        return $this->render('flights/flight.html.twig', [
            'controller_name' => 'FlightController',
            'flight' => $flight,
        ]);
    }

    /**
     * @Route("/all-flights", name="all-flights")
     */
    public function allFlights(Request $request, ObjectManager $entityManager)
    {
        $flight = new Flight();
        $form = $this->createForm(FlightType::class, $flight);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($flight);
            $entityManager->flush();
        }
        $repository = $this->getDoctrine()->getRepository(Flight::class);
        $flights = $repository->findAll();
        return $this->render('flights/flights.html.twig', [
            'controller_name' => 'Flights list',
            'flights' => $flights,
            'form' => $form->createView(),
        ]);
    }
}
