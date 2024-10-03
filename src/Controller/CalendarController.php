<?php

// src/Controller/CalendarController.php

namespace App\Controller;

use App\Service\CalendarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTime;

class CalendarController extends AbstractController
{
    private $calendarService;

    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }

    /**
     * @Route("/calendar", name="calendar")
     */
    public function index(Request $request): Response
{
    $currentDate = $request->query->get('date') ? new DateTime($request->query->get('date')) : new DateTime();

    $weekDates = $this->calendarService->getWeekDates($currentDate);

    // Calculate previous and next week
    $prevWeek = (clone $currentDate)->modify('-1 week');
    $nextWeek = (clone $currentDate)->modify('+1 week');

    return $this->render('calendar/index.html.twig', [
        'weekDates' => $weekDates,
        'prevWeek' => $prevWeek,
        'nextWeek' => $nextWeek,
    ]);
}
}


// use App\Service\CalendarService;
// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;
// use DateTime;

// class CalendarController extends AbstractController
// {

//     /**
//      * @Route("/calendar", name="calendar")
//      */
//     public function index(): Response
// {

//     return $this->render('calendar/index.html.twig');
// }
// }
