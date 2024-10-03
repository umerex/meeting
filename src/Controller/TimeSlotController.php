<?php

// src/Controller/TimeSlotController.php
namespace App\Controller;

#use App\Entity\TimeSlot;
use App\Form\TimeSlotType;
use App\Repository\TimeSlotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimeSlotController extends AbstractController
{
    /**
     * @Route("/timeslot/new", name="time_slot_new")
     */
    // public function new(Request $request): Response
    // {
    //     #$timeSlot = new TimeSlot();
    //     $form = $this->createForm(TimeSlotType::class, $timeSlot);

    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($timeSlot);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('time_slot_list');
    //     }

    //     return $this->render('timeslot/new.html.twig', [
    //         'form' => $form->createView(),
    //     ]);
    // }

    /**
     * @Route("/timeslots", name="time_slot_list")
     */

    // public function list(TimeSlotRepository $timeSlotRepository): Response
    // {
    //     $timeSlots = $timeSlotRepository->findAll();

    //     return $this->render('timeslot/list.html.twig', [
    //         'timeSlots' => $timeSlots,
    //     ]);
    // }
}

